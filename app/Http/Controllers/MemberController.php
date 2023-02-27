<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Mailer\MailController;
use App\Models\MasterPelanggan;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private $mailControl;

    public function __construct(MailController $mailController)
    {
        $this->mailControl = $mailController;
    }

    public function member_trekkers()
    {
        $dataMember = Member::where('userStatus','=','Y')
        ->orderBy('tgl_daftar','DESC')
        ->get();
        $masterPelanggan = MasterPelanggan::orderBy('jns_pelanggan','DESC')->get();
        return view('panel.pages.member-trekkers', [
            'dataMember' => $dataMember,
            'masterPelanggan' => $masterPelanggan
        ]);
    }
    
    public function member_trekkers_verifikasi()
    {
        $dataMemberVerifikasi = Member::where('userStatus','=','N')
        ->orderBy('tgl_daftar','DESC')
        ->get();
        return view('panel.pages.member-trekkers-verifikasi', [
            'dataMemberVerifikasi' => $dataMemberVerifikasi
        ]);
    }

    public function get_data_member($id_member){
        $getID = base64_decode($id_member);
        $dataMember = Member::where('id_member',$getID)->first();
        $masterPelanggan = MasterPelanggan::orderBy('jns_pelanggan','DESC')->get();
        return response()->json([
            'dataMember'=> $dataMember,
            'masterPelanggan' => $masterPelanggan
        ]);
    }
    
    public function get_data_member_verifikasi($id_member){
        $getID = base64_decode($id_member);
        $dataMember = Member::where('id_member',$getID)
        ->where('userStatus','=','N')
        ->orderBy('tgl_daftar','DESC')
        ->first();
        return response()->json([
            'dataMember'=> $dataMember
        ]);
    }

    public function member_trekkers_edit(Request $request){
        try {
            $validatedData = $request->validate([
                'nama_depan' => '',
                'nama_belakang' => '',
                'username' => '',
                'no_tlp' => '',
                'alamat' => '',
                'poin' => '',
                'wallet' => '',
                'jns_member' => ''
            ]);

            $validatedData['jns_member'] = implode (",", $request->jns_member);

            // dd($validatedData);
            Member::where('id_member', $request->idEdit)
                ->update($validatedData);
            return redirect('/member-trekkers')->with('member-edit', 'Sukses, Data berhasil diupdate!'); 
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/member-trekkers')->with('member-error', 'Error, Ulangi proses!');
        }
    }
    
    public function member_trekkers_approve_verifikasi(Request $request){
        try {
            $plusWallet = env('SESI_REWARD_REGISTER');
            $current_timestamp = Carbon::now()->timestamp;
            $token	= strtoupper(md5($request->username) . md5($current_timestamp));

            Member::where('id_member', '=' ,$request->id_member)
            ->where('username', '=', $request->username)
            ->update([
                'userStatus' => 'Y',
                'tokenCode' => $token,
                'wallet' => $plusWallet
            ]);

            $data = [
                'poinReward' => '0',
                'cashReward' => $plusWallet,
                'email' => $request->username,
                'resi' => '',
                'invoice' => '',
                'nama_pelanggan' => $request->nama_pelanggan,
                'mode' => 'manual_verifikasi'
            ];

            $this->mailControl->sendMail($data);

            return redirect('/member-verifikasi')->with('member-verifikasi', 'Sukses, Member telah diverifikasi!'); 
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/member-verifikasi')->with('member-error', 'Error, Ulangi proses!');
        }
    }

    public function get_data_member_baru(){
        try {
            $countMemberBaru = Member::where('user_baru','=','Y')
            ->count('id_member');

            $dataMemberBaru = Member::where('user_baru','=','Y')->get();

            return response()->json([
                'countMemberBaru' => $countMemberBaru,
                'dataMemberBaru' => $dataMemberBaru
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'code' => 401,
                'message' => 'Terjadi kesalahan, proses tidak dapat dilanjutkan.'
            ]);
        }
    }
}
