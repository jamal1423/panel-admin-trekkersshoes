<?php

namespace App\Http\Controllers\Mailer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailController extends Controller
{
    /*
    ******************************************************
    * SEND EMAIL
    ******************************************************
    */

    public function templateMail($data)
    {
        $mode = $data['mode'];
        $invoice = $data['invoice'];
        $noResi = $data['resi'];
        $namaPelanggan = $data['nama_pelanggan'];
        $poin = $data['poinReward'];
        $cashback = $data['cashReward'];
        $content = '';
        if ($mode == "user_verif") {
            $content = "<div style='width: 94%;background-color: cornsilk;border-radius: 10px;padding: 7px 7px;margin-bottom: 18px;'>            
                <p style='Margin:0;Margin-bottom:10px;color:#757575;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:28px;margin:0;margin-bottom:10px;padding:0;text-align:left'>
                Mohon verifikasi alamat email Anda dengan cara menekan tombol di bawah. Email yang telah diverifikasi akan mempermudah kami untuk menghubungi Anda jika nomor telepon yang terdaftar tidak dapat dihubungi.
                </p>
                <table style='Margin:0 0 16px 0;border-collapse:collapse;border-spacing:0;margin:40px auto;padding:0;text-align:center;vertical-align:top;width:auto'>
                <tbody>
                    <tr style='padding:0;text-align:left;vertical-align:top'>
                        <td style='Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word'>
                            <table style='border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%'>
                                <tbody>
                                    <tr style='padding:0;text-align:left;vertical-align:top'>
                                        <td style='Margin:0;background:0 0;border:none;border-collapse:collapse!important;color:#fefefe;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word'>
                                            <a href='" . $data['url'] . "' style='Margin:0;background-color:#8cc63f;border:2px solid #74ad29;border-radius:4px;color:#fefefe;display:inline-block;font-size:16px;font-weight:700;letter-spacing:1px;line-height:1.3;margin:0;padding:8px 16px 8px 16px;text-align:left;text-decoration:none;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;' target='_blank'>
                                                Verifikasi Email Saya
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
                </table>

                <p style='Margin:0;Margin-bottom:10px;color:#757575;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:28px;margin:0;margin-bottom:10px;padding:0;text-align:left'>
                Jika tombol diatas tidak berfungsi, mohon salin link dibawah ini ke browser Anda atau tekan langsung link dibawah:
                </p>
                <p style='Margin:0;Margin-bottom:10px;color:#757575;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:28px;margin:0;margin-bottom:10px;padding:0;text-align:left'>
                <a href='" . $data['url'] . "' style='Margin:0;color:#2199e8;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;text-decoration:none' target='_blank'>
                    " . $data['url'] . "
                </a>
                </p>
            </div>";
        }

        if ($mode == "forget-password") {
            $content = "<div style='width: 94%;background-color: cornsilk;border-radius: 10px;padding: 7px 7px;margin-bottom: 18px;'>            
                <p style='Margin:0;Margin-bottom:10px;color:#757575;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:28px;margin:0;margin-bottom:10px;padding:0;text-align:left'>
                Mohon Klik link Dibawah ini untuk mengganti password.
                </p>
                <table style='Margin:0 0 16px 0;border-collapse:collapse;border-spacing:0;margin:40px auto;padding:0;text-align:center;vertical-align:top;width:auto'>
                <tbody>
                    <tr style='padding:0;text-align:left;vertical-align:top'>
                        <td style='Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word'>
                            <table style='border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%'>
                                <tbody>
                                    <tr style='padding:0;text-align:left;vertical-align:top'>
                                        <td style='Margin:0;background:0 0;border:none;border-collapse:collapse!important;color:#fefefe;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word'>
                                            <a href='" . $data['url'] . "' style='Margin:0;background-color:#8cc63f;border:2px solid #74ad29;border-radius:4px;color:#fefefe;display:inline-block;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:700;letter-spacing:1px;line-height:1.3;margin:0;padding:8px 16px 8px 16px;text-align:left;text-decoration:none' target='_blank'>
                                                Change Password
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
                </table>

                <p style='Margin:0;Margin-bottom:10px;color:#757575;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:28px;margin:0;margin-bottom:10px;padding:0;text-align:left'>
                Jika tombol diatas tidak berfungsi, mohon salin link dibawah ini ke browser Anda atau tekan langsung link dibawah:
                </p>
                <p style='Margin:0;Margin-bottom:10px;color:#757575;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:28px;margin:0;margin-bottom:10px;padding:0;text-align:left'>
                <a href='" . $data['url'] . "' style='Margin:0;color:#2199e8;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;text-decoration:none' target='_blank'>
                    " . $data['url'] . "
                </a>
                </p>
            </div>";
        }

        if ($mode == "test_send_email") {
            $content = "<div style='width: 94%;background-color: cornsilk;border-radius: 10px;padding: 7px 7px;margin-bottom: 18px;'>
                Hallo!! <br><br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius eveniet cum ipsa sed explicabo atque, facere temporibus porro voluptatem aut!
                <br><br>
                <i>Email ini dikirimkan secara otomatis oleh sistem. Mohon tidak membalas ke email ini.</i><br>
                <span style='color:red;'>INFO : Pesanan akan batal otomatis selama 1x24 jam. Harap segera lakukan pembayaran.</span>
            </div>";
        }
        
        if ($mode == "manual_verifikasi") {
            $content = "<div style='width: 94%;background-color: cornsilk;border-radius: 10px;padding: 7px 7px;margin-bottom: 18px;'>
                Selamat Bergabung! <br><br>
                Akun kamu sudah berhasil diverifikasi. Selamat berbelanja di www.trekkersshoes.com<br><br>
            </div>";
        }

        if ($mode == "checkout") {
            $content = "<div style='width: 94%;background-color: cornsilk;border-radius: 10px;padding: 7px 7px;margin-bottom: 18px;'>
                Terima Kasih <br><br>
                Pesanan Kamu telah dibuat dengan nomer invoice " . $data['invoice'] . ". Terima kasih telah belanja di www.trekkersshoes.com.
                <br><br>
                <i>Email ini dikirimkan secara otomatis oleh sistem. Mohon tidak membalas ke email ini.</i><br>
                <span style='color:red;'>INFO : Pesanan akan batal otomatis selama 1x24 jam. Harap segera lakukan pembayaran.</span>
            </div>";
        }

        if ($mode == "paid") {
            $content = "<div style='width: 94%;background-color: cornsilk;border-radius: 10px;padding: 7px 7px;margin-bottom: 18px;'>
                Terima Kasih <br><br>
                Pembayaran Kamu dengan invoice ".$data['invoice'] ." sudah diterima. Mohon untuk menunggu, kami sedang melakukan proses verifikasi. 
                Terima kasih telah belanja di www.trekkersshoes.com.
                <br><br>
                <i>Email ini dikirimkan secara otomatis oleh sistem. Mohon tidak membalas ke email ini.</i><br>
                <span style='color:red;'>INFO : Pesanan akan batal otomatis selama 1x24 jam. Harap segera lakukan pembayaran.</span>
            </div>";
        }

        if ($mode == "transaksi_proses") {
            $content = "<div style='width: 94%;background-color: cornsilk;border-radius: 10px;padding: 7px 7px;margin-bottom: 18px;'>
                Terima Kasih <br><br>
                Pembayaran telah kami terima, pesanan Kamu dengan nomer invoice " . $data['invoice'] . " segera di Proses. Terima kasih telah belanja di www.trekkersshoes.com.
                <br><br>
                <i>Email ini dikirimkan secara otomatis oleh sistem. Mohon tidak membalas ke email ini.</i><br>
            </div>";
        }

        if ($mode == "transaksi_dikirim") {
            $content = "<div style='width: 94%;background-color: cornsilk;border-radius: 10px;padding: 7px 7px;margin-bottom: 18px;'>
                Terima Kasih <br><br>
                Pesanan Kamu dengan nomer invoice " . $data['invoice'] . " akan segera dikirim. Berikut nomer resi pengirimannya (" . $data['resi'] . "). Terima kasih telah belanja di www.trekkersshoes.com.
                <br><br>
                <i>Email ini dikirimkan secara otomatis oleh sistem. Mohon tidak membalas ke email ini.</i><br>
            </div>";
        }

        if ($mode == "transaksi_selesai") {
            $content = "<div style='width: 94%;background-color: cornsilk;border-radius: 10px;padding: 7px 7px;margin-bottom: 18px;'>
                Terima Kasih <br><br>
                Pesanan Kamu dengan nomer invoice " . $data['invoice'] . " telah selesai. Terima kasih telah belanja di www.trekkersshoes.com.
                <br><br>
                <i>Email ini dikirimkan secara otomatis oleh sistem. Mohon tidak membalas ke email ini.</i><br>
            </div>";
        }
        
        if ($mode == "transaksi_reward") {
            $content = "<div style='width: 94%;background-color: cornsilk;border-radius: 10px;padding: 7px 7px;margin-bottom: 18px;'>
                Terima Kasih <br><br>
                Kamu mendapatkan reward poin " . $data['poinReward'] . ", dan cashback Rp. ". number_format($data['cashReward']).". Terima kasih telah belanja di www.trekkersshoes.com.
                <br><br>
                <i>Email ini dikirimkan secara otomatis oleh sistem. Mohon tidak membalas ke email ini.</i><br>
            </div>";
        }
        
        if ($mode == "transaksi_void") {
            $content = "<div style='width: 94%;background-color: cornsilk;border-radius: 10px;padding: 7px 7px;margin-bottom: 18px;'>
                Terima Kasih <br><br>
                Pesanan Kamu dengan nomer invoice " . $data['invoice'] . " telah dibatalkan. Terima kasih telah belanja di www.trekkersshoes.com.
                <br><br>
                <i>Email ini dikirimkan secara otomatis oleh sistem. Mohon tidak membalas ke email ini.</i><br>
            </div>";
        }

        return "<body style='display: block; margin: 0px;'>
        <span style='color:#f3f3f3;display:none!important;font-size:1px;line-height:1px;max-height:0;max-width:0;opacity:0;overflow:hidden'>
            Trekkers Shoes
        </span>
        <table align='center' border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' style='margin:0; padding:0; background-color:#DEE0E2; border-collapse:collapse!important; height:100%!important; width:100%!important'>
            <tbody>
                <tr style='padding:0;text-align:left;vertical-align:top'>
                    <td align='center' style='Margin:0;border-collapse:collapse!important;color:#0a0a0a;direction:ltr;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word'>
                        <table align='center' style='Margin:0 auto;background:#fefefe;border-collapse:collapse;border-spacing:0;border-top:6px solid #4e7ac8;margin:30px auto!important;max-width:600px;min-width:auto;padding:0;text-align:inherit;vertical-align:top;width:100%!important'>
                            <tbody>
                                <tr style='padding:0;text-align:left;vertical-align:top'>
                                    <td style='Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word'>
                                        <table style='border-collapse:collapse;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%'>
                                            <tbody>
                                                <tr style='padding:0;text-align:left;vertical-align:top'>
                                                    <th style='Margin:0 auto;color:#0a0a0a;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:16px;padding-left:30px;padding-right:30px;padding-top:25px;text-align:left;width:570px'>
                                                        <table style='border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%'>
                                                            <tbody>
                                                                <tr style='padding:0;text-align:left;vertical-align:top'>
                                                                    <th style='Margin:0;color:#0a0a0a;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left'></th>
                                                                    <td style='Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;width:100%;word-wrap:break-word'>
                                                                        <div style='width: 94%;border-radius: 10px;padding: 7px 7px;margin-bottom: -14px;'>
                                                                            <div style='float: left;width: 50%;'>
                                                                                <img src='https://www.trekkersshoes.com/assets/img/logo.png' style='width: 80%;margin-top: 15px;'>
                                                                            </div>
                                                                            <div style='float: right;width: 50%;text-align: end;'>
                                                                                Trekkers Shoes<br>
                                                                                support@trekkersshoes.com<br>
                                                                                +62821-3231-2488<br>
                                                                                Jl. Industri Bringinbendo No. 8, Taman - Sidoarjo
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </th>
                                                    <th style='Margin:0;color:#0a0a0a;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0'></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                        <table style='border-top:1px dashed #c3c3c3;border-collapse:collapse;border-spacing:0;display:table;margin-top:30px;padding:0;text-align:left;vertical-align:top;width:100%'>
                                            <tbody>
                                                <tr style='padding:0;text-align:left;vertical-align:top'>
                                                    <th style='Margin:0 auto;color:#0a0a0a;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:16px;padding-left:30px;padding-right:30px;text-align:left;width:570px'>
                                                        <table style='margin-right:12px;margin-left:12px;border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%'>
                                                            <tbody>
                                                                <tr style=margin-left:20px;text-align:left;vertical-align:top'>
                                                                    <th style='Margin:0;color:#0a0a0a;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left'>
                                                                        <p style='Margin:0;Margin-bottom:10px;color:#757575;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:28px;margin:0;margin-bottom:10px;padding:0;text-align:left'>
                                                                            Halo <strong style='color:#222'>$namaPelanggan</strong>,
                                                                        </p>
                                                                        " . $content . "
                                                                    </th>
                                                                    <th style='Margin:0;color:#0a0a0a;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0'></th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>

                                        
                                        <table style='border-collapse:collapse;border-spacing:0;border-top:1px dashed #c3c3c3;display:table;padding:0;text-align:left;vertical-align:top;width:100%'>
                                            <tbody>
                                                <tr style='padding:0;text-align:left;vertical-align:top'>
                                                    <th style='Margin:0 auto;color:#0a0a0a;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:30px;padding-bottom:16px;padding-left:30px;padding-right:30px;text-align:center;width:570px'>
                                                        <table style='border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%'>
                                                            <tbody>
                                                                <tr style='padding:0;text-align:left;vertical-align:top'>
                                                                    <th style='Margin:0;color:#0a0a0a;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left'>
                                                                        <h3 style='padding-bottom:15px; color:#808080; font-family:Helvetica; font-size:12px; line-height:150%; padding-top:20px; padding-right:20px; padding-left:20px; text-align:center'>Ikuti kami</h3>
                                                                        <div style='margin-bottom:15px;text-align:center'>
                                                                            <a href='#' style='Margin:0;background:url(https://d1o6t6wdv45461.cloudfront.net/s4/emails/twitter.png) no-repeat center center;background-color:#bdbdbd!important;border-radius:50%;color:#2199e8;display:inline-block;font-family:HelveticaNeue-Light,Helvetica,Arial,sans-serif;font-weight:400;height:32.28px;line-height:1.3;margin:0 2px;padding:0;text-align:left;text-decoration:none;width:32.28px' target='_blank'></a>
                                                                            <a href='#' style='Margin:0;background:url(https://d1o6t6wdv45461.cloudfront.net/s4/emails/facebook.png) no-repeat center center;background-color:#bdbdbd!important;border-radius:50%;color:#3b5998;display:inline-block;font-family:HelveticaNeue-Light,Helvetica,Arial,sans-serif;font-weight:700;height:32.28px;line-height:1.3;margin:0 2px;padding:0;text-align:left;text-decoration:none;width:32.28px' target='_blank'></a>
                                                                            <a href='#' style='Margin:0;background:url(https://d1o6t6wdv45461.cloudfront.net/s4/emails/linkedin.png) no-repeat center center;background-color:#bdbdbd!important;border-radius:50%;color:#2199e8;display:inline-block;font-family:HelveticaNeue-Light,Helvetica,Arial,sans-serif;font-weight:400;height:32.28px;line-height:1.3;margin:0 2px;padding:0;text-align:left;text-decoration:none;width:32.28px' target='_blank'></a>
                                                                            <a href='#' style='Margin:0;background:url(https://d1o6t6wdv45461.cloudfront.net/s4/emails/insta.png) no-repeat center center;background-color:#bdbdbd!important;border-radius:50%;color:#2199e8;display:inline-block;font-family:HelveticaNeue-Light,Helvetica,Arial,sans-serif;font-weight:400;height:32.28px;line-height:1.3;margin:0 2px;padding:0;text-align:left;text-decoration:none;width:32.28px' target='_blank'></a>
                                                                            <a href='#' style='Margin:0;background:url(https://d1o6t6wdv45461.cloudfront.net/s4/emails/youtube.png) no-repeat center center;background-color:#bdbdbd!important;border-radius:50%;color:#2199e8;display:inline-block;font-family:HelveticaNeue-Light,Helvetica,Arial,sans-serif;font-weight:400;height:32.28px;line-height:1.3;margin:0 2px;padding:0;text-align:left;text-decoration:none;width:32.28px' target='_blank'></a>
                                                                        </div>
                                                                        <p style='padding-bottom:15px; color:#808080; font-family:Helvetica; font-size:12px; line-height:150%; padding-top:20px; padding-right:20px; padding-left:20px; text-align:center'>
                                                                            Ada pertanyaan? Hubungi Kami di
                                                                            <a href='mailto:info@sisgo.co.id' style='Margin:0;color:#757575;font-family:HelveticaNeue-Light,Helvetica,Arial,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;text-decoration:none' target='_blank'>
                                                                                <strong style='display:inline-block'>support@trekkersshoes.com</strong>
                                                                            </a>
                                                                        </p>
                                                                    </th>
                                                                    <th style='Margin:0;color:#0a0a0a;font-family:HelveticaNeue-Light,'Helvetica Neue Light',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0'></th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>";
    }

    public function sendMail($data)
    {
        $subject = "Informasi Pelanggan";
        $invoice = $data['invoice'];
        $namaPelanggan = $data['nama_pelanggan'];
        $emailAddress = $data['email'];
        
        $mail = new PHPMailer(true);
        try {
            // Pengaturan Server
            // $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'trekkersshoes.com';               
            $mail->SMTPAuth = true;
            // $mail->Username = 'no-reply@trekkersshoes.com';
            // $mail->Password = 'Indonesi4n_@1945';
            $mail->Username = env('MAIL_SERVER');
            $mail->Password = env('MAIL_PASS');
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            // Siapa yang mengirim email
            $mail->setFrom(env('MAIL_SERVER'), env('MAIL_NAME'));

            // Siapa yang akan menerima email
            $mail->addAddress($emailAddress);       // Name is optional

            // ke siapa akan kita balas emailnya
            $mail->addReplyTo($emailAddress, $namaPelanggan);
            // $mail->addCC('jamal.aku@gmail.com');

            //Content
            //$mail->Body    = $message;
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->MsgHtml($this->templateMail($data));
            // $mail->AltBody = $message;
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        }
    }
}
