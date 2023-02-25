@extends('panel.layouts.main')

@push('style')
  <style>
    @media print {
        #hidePrint{
          display:none;
          font-size: 16px;
        }
    }
  </style>
@endpush

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Transaksi Detail</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end::Subheader-->

  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-lg-12 col-xl-12">
              <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                <div class="card-header align-items-center   border-bottom-dark px-0">
                  @php
                   $totBAYAR = 0;   
                  @endphp
                  @foreach($detailTransaksi as $detail1)
                    @php
                      $tmpVal = $detail1->qty * $detail1->harga;
                      $totBAYAR += $tmpVal;
                    @endphp
                  @endforeach

                  @foreach($dataPoin as $poin)
                  @endforeach
                  <div class="card-title mb-0">
                    <h3 class="card-label mb-0 font-weight-bold text-body">Invoice <span class="text-black-50">#{{ $detail1->id_order }}</span>
                    </h3>
                  </div>
                  <div class="icons d-flex">
                    <a href="javascript:;" id="printButton" onclick="printDivArea('printArea')" class="ml-2">
                      <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"></path>
                          <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"></path>
                          <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                          </svg>
                      </span>
                    </a>
                    <a href="#" class="ml-2" id="transaksi-delete-{{ base64_encode($detail1->id_order) }}" onClick="transaksiDel(this)" data-id="{{ base64_encode($detail1->id_order) }}">
                      <span class="icon  h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"></path>
                        </svg>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="printArea">
            <div class="col-12 col-lg-12 col-xl-12">
              <!-- <div class="tab-content">
                <div class="tab-pane fade active show" id="detail" role="tabpanel" aria-labelledby="detail-tab"> -->
                  <div class="card card-custom gutter-b bg-white border-0">
                    <div class="card-header border-bottom align-items-center">
                      
                      <div class="col-xl-4 col-12" id="hidePrint">
                        <div class="card-title mb-2">
                          <h3 class="card-label mb-0 font-weight-bold text-body">Detail Pesanan</h3>
                        </div>
                      </div>
                      
                      <div id="third" class="col-xl-6 col-12">
                        <div class=" text-black-50 text-right"> 
                          <h3 class="card-label mb-0 font-weight-bold text-body">Nomer Pesanan : <span>{{ $detail1->id_order }}</span></h3>
                        </div>
                      </div>
                    </div>
                  
                    <div class="card-body pt-0">
                      <div class="row gutter-pb gutter-pt border-bottom  order-payment justify-content-center">
                        <div class="col-12 col-lg-6 col-xl-4 payment-detail">
                          <h4 class="card-label mb-2 font-weight-bold font-size-h4 text-body">
                            Pembayaran
                          </h4>
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                            Tgl. Transaksi : <span class="text-dark font-size-base">{{ date('d-m-Y H:i:s', strtotime($detail1->tgl_order)) }}</span>
                          </h5>
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                            Metode Pembayaran : <span class="text-dark font-size-base">{{ strtoupper($detail1->metode_bayar) }}</span>
                          </h5>
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                            Bukti Pembayaran : <span class="text-dark font-size-base">
                              @if($detail1->bukti_bayar != "")
                              <a href="{{ $baseUrlImage.$detail1->bukti_bayar }}" class="text-info" onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">
                                Lihat Bukti Bayar
                              </a>
                              @endif
                            </span>
                          </h5>
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                            Status : 
                            @if($detail1->status == 'Menunggu Pembayaran')
                              <span class="badge badge-pill badge-danger text-light font-size-base">{{ $detail1->status }}</span>
                            @elseif($detail1->status == 'Menunggu Verifikasi')
                              <span class="badge badge-pill badge-warning text-light font-size-base">{{ $detail1->status }}</span>
                            @else
                              <span class="badge badge-pill badge-info text-light font-size-base">{{ $detail1->status }}</span>
                            @endif
                          </h5>
                          @if($detail1->status != "Selesai" && $detail1->status != "VOID" && $detail1->status !== "TMP")
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                            Ubah Status : 
                            @if($detail1->metode_bayar == "bca")
                              @if($detail1->status == 'Menunggu Verifikasi')
                                <div class="form-group row mt-2 justify-content-center mb-0">
                                  <div class="col-md-12">
                                    <form action="{{ url('/transaksi-update') }}" method="post">
                                      @csrf
                                      @method('patch')
                                      <fieldset class="form-group d-flex">
                                        <button type="submit" class="btn-primary btn white pt-1 pb-1 d-flex align-items-center justify-content-center">Update</button>
                                        <select name="status" class="multiple-select w-100">
                                          <option value="Proses">Proses</option>
                                        </select>
                                        <input type="hidden" name="mode" value="transaksi_proses">
                                        <input type="hidden" name="email" value="{{ $detail1->userlog }}">
                                        <input type="hidden" name="resi" value="{{ $detail1->resi }}">
                                        <input type="hidden" name="nama_pelanggan" value="{{ ucwords($detail1->nama_pelanggan) }}">
                                        <input type="hidden" name="invoice" value="{{ $detail1->id_order }}">
                                      </fieldset>
                                    </form>
                                  </div>
                                </div>
                              @endif
                              
                              @if($detail1->status == 'Proses')
                              <div class="form-group row mt-2 justify-content-center mb-0">
                                <div class="col-md-12">
                                  <form action="{{ url('/transaksi-update') }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <fieldset class="form-group d-flex">
                                      <button type="submit" class="btn-primary btn white pt-1 pb-1 d-flex align-items-center justify-content-center">Update</button>
                                      <select name="status" class="multiple-select w-100">
                                        <option value="dikirim">Dikirim</option>
                                      </select>
                                      <input type="hidden" name="mode" value="transaksi_dikirim">
                                      <input type="hidden" name="email" value="{{ $detail1->userlog }}">
                                      <input type="hidden" name="resi" value="{{ $detail1->resi }}">
                                      <input type="hidden" name="nama_pelanggan" value="{{ ucwords($detail1->nama_pelanggan) }}">
                                      <input type="hidden" name="invoice" value="{{ $detail1->id_order }}">
                                    </fieldset>
                                    <input type="text" name="resi" class="form-control" placeholder="inputkan resi">
                                  </form>
                                </div>
                              </div>
                              @endif
                              
                              @if($detail1->status == 'dikirim')
                              <div class="form-group row mt-2 justify-content-center mb-0">
                                <div class="col-md-12">
                                  <form action="{{ url('/transaksi-selesai') }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <fieldset class="form-group d-flex">
                                      <button type="submit" class="btn-primary btn white pt-1 pb-1 d-flex align-items-center justify-content-center">Update</button>
                                      <select name="status" class="multiple-select w-100">
                                        <option value="Selesai">Selesai</option>
                                      </select>
                                      <input type="hidden" name="mode" value="transaksi_selesai">
                                      <input type="hidden" name="email" value="{{ $detail1->userlog }}">
                                      <input type="hidden" name="poinReward" value="">
                                      <input type="hidden" name="cashReward" value="">
                                      <input type="hidden" name="resi" value="{{ $detail1->resi }}">
                                      <input type="hidden" name="nama_pelanggan" value="{{ ucwords($detail1->nama_pelanggan) }}">
                                      <input type="hidden" name="invoice" value="{{ $detail1->id_order }}">
                                      <input type="hidden" name="user_log" value="{{ $detail1->userlog }}">
                                      <input type="hidden" name="nomer_transaksi" value="{{ $detail1->id_order }}">
                                      @if($countID > 1)
                                        @foreach($detailTransaksi as $detail3)
                                        <input type="hidden" name="id_produk[]" value="{{ $detail3->id_barang }}">
                                        <input type="hidden" name="status_ulasan[]" value="belum">
                                        <input type="hidden" name="foto_produk[]" value="{{ $detail3->foto_produk }}">
                                        <input type="hidden" name="wip_kode[]" value="{{ $detail3->wip_kode }}">
                                        <input type="hidden" name="wip_stok_khusus[]" value="{{ $detail3->wip_stok_khusus }}">
                                        <input type="hidden" name="wip_kategori_stok[]" value="{{ $detail3->wip_kategori_stok }}">
                                        <input type="hidden" name="wip_warna[]" value="{{ $detail3->warna }}">
                                        <input type="hidden" name="wip_size[]" value="{{ $detail3->ukuran }}">
                                        @endforeach
                                      @else
                                        <input type="hidden" name="id_produk2" value="{{ $detail1->id_barang }}">
                                        <input type="hidden" name="status_ulasan2" value="belum">
                                        <input type="hidden" name="foto_produk2" value="{{ $detail1->foto_produk }}">
                                        <input type="hidden" name="wip_kode2" value="{{ $detail1->wip_kode }}">
                                        <input type="hidden" name="wip_stok_khusus2" value="{{ $detail1->wip_stok_khusus }}">
                                        <input type="hidden" name="wip_kategori_stok2" value="{{ $detail1->wip_kategori_stok }}">
                                        <input type="hidden" name="wip_warna2" value="{{ $detail1->warna }}">
                                        <input type="hidden" name="wip_size2" value="{{ $detail1->ukuran }}">
                                      @endif
                                      <input type="hidden" name="rating" value="">
                                      <input type="hidden" name="ulasan" value="">
                                      <input type="hidden" name="plus_poin" value="{{ floor($totBAYAR / $poin->poin_rp) }}" />
                                    </fieldset>
                                  </form>
                                </div>
                              </div>
                              @endif
                            @else
                            @endif
                          </h5>
                          @endif
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 payment-detail">
                          <h4 class="card-label mb-2 font-weight-bold font-size-h4 text-body">
                            Metode Pengiriman
                          </h4>
                          @if($detail1->dipabrik == "Y")
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                            Kurir Pengiriman : <span class="badge badge-pill badge-success text-light font-size-base">Ambil Di Pabrik</span>
                          </h5>
                          @else
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                            Kurir Pengiriman : <span class="text-dark font-size-base">{{ strtoupper($detail1->expedisi).' '.ucwords($detail1->expedisi_paket) }}</span>
                          </h5>
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                            No. Resi : <span class="text-dark font-size-base">{{ $detail1->resi }}</span>
                          </h5>
                          @endif
                        </div>
                      </div>
                      <div class="row gutter-pb gutter-pt justify-content-center border-bottom">
                        <div class="col-12 col-lg-6 col-xl-4  payment-detail">
                          <h4 class="card-label mb-2 font-weight-bold font-size-h4 text-body">
                            Informasi Pelanggan
                          </h4>
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                            Nama Lengkap : <span class="text-dark">{{ ucwords($detail1->nama_pelanggan) }}</span>
                          </h5>
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                              Email : <span class="text-dark font-size-base">{{ $detail1->userlog }}</span>
                          </h5>
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                              No. HP : <span class="text-dark font-size-base">{{ $detail1->no_tlp }}</span>
                          </h5>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4  payment-detail">
                          <h4 class="card-label mb-2 font-weight-bold font-size-h4 text-body">
                            Alamat
                          </h4>
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                            <span class="text-dark font-size-base">{!! $detail1->alamat !!}</span>
                          </h5>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 gutter-pt table-padding" style="padding:35px;">
                          <table class="table table-striped text-body">
                            <thead>
                              <tr class="row"> 
                              <th class="border-0 col-lg-4 col-4 header-heading" scope="col">Artikel</th>
                              <th class="border-0 col-lg-2 col-2 text-center header-heading" scope="col">Ukuran</th>
                              <th class="border-0 col-lg-2 col-3 text-center header-heading" scope="col">Qty</th>
                              <th class="border-0 col-lg-2 col-3 text-right header-heading" scope="col">Harga</th>
                              <th class="border-0 col-lg-2 col-3 text-right header-heading" scope="col">Sub Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $grandTOTAL = 0; $subTOTAL=0;?>
                              @foreach($detailTransaksi as $detail2)
                              <tr class="row">
                                <td class="col-lg-4 col-4">{{ $detail2->wip_kode.' '.$detail2->warna }}</td>
                                <td class="col-lg-2 col-2 text-center">{{ $detail2->ukuran }}</td>
                                <td class="col-lg-2 col-3 text-center">{{ $detail2->qty }}</td>
                                <td class="col-lg-2 col-3 text-right">{{ "Rp. ".number_format($detail2->harga) }}</td>
                                <td class="col-lg-2 col-3 text-right">{{ "Rp. ".number_format($detail2->harga * $detail2->qty) }}</td>
                              </tr>
                              <?php
                                $r_poin=$detail2->r_poin;
                                $r_wallet=$detail2->r_wallet;
                                $konversi=$r_poin*$poin->tkr_poin_rp;
                                $tmp_value_sub = $detail2->qty * $detail2->harga;
                                $subTOTAL += $tmp_value_sub;
                                $tmp_value = ($detail2->qty * $detail2->harga)-$konversi-$r_wallet;
                                $grandTOTAL += $tmp_value;
                              ?>
                              @endforeach
                            </tbody>
                          </table>
                          <div class="row justify-content-end" style="margin-right: -31px;">
                            <div class="col-6 col-md-4 justify-content-end">
                              <div>
                                <table class="table right-table">
                                  <tbody>
                                    <tr class="d-flex align-items-center justify-content-between">
                                      <th class="border-0 font-size-h5 mb-0 font-size-bold text-dark">
                                          TOTAL
                                      </th>
                                      <td class="border-0 justify-content-end d-flex text-dark font-size-base text-right font-size-bold">{{ "Rp. ".number_format($subTOTAL) }}</td>
                                    </tr>
                                    <tr class="d-flex align-items-center justify-content-between">
                                      <th class="border-0 font-size-h5 mb-0 font-size-bold text-dark">
                                          ONGKIR
                                      </th>
                                      <td class="border-0 justify-content-end d-flex text-success font-size-bold font-size-base text-right">{{ "(+) Rp. ".number_format($detail2->ongkir) }}</td>
                                    </tr>
                                    @if($r_poin > 0)
                                      <tr class="d-flex align-items-center justify-content-between">
                                        <th class="border-0 font-size-h5 mb-0 font-size-bold text-dark">
                                            PAKAI POIN ({{ $r_poin }})
                                        </th>
                                        <td class="border-0 justify-content-end d-flex text-danger font-size-bold font-size-base text-right">{{ "(-) Rp. ".number_format($konversi) }}</td>
                                      </tr>
                                    @endif
                                    @if($r_wallet > 0)
                                      <tr class="d-flex align-items-center justify-content-between">
                                        <th class="border-0 font-size-h5 mb-0 font-size-bold text-dark">
                                            PAKAI SALDO
                                        </th>
                                        <td class="border-0 justify-content-end d-flex text-danger font-size-bold font-size-base text-right">{{ "(-) Rp. ".number_format($r_wallet) }}</td>
                                      </tr>
                                    @endif
                                    <tr class="d-flex align-items-center justify-content-between item-price">
                                      <th class="border-0 font-size-h5 mb-0 font-size-bold text-dark">
                                          TOTAL BAYAR
                                      </th>
                                      <td class="border-0 justify-content-end d-flex text-dark font-size-base text-right font-size-bold">{{ "Rp. ".number_format($grandTOTAL + $detail2->ongkir) }}</td>
                                    </tr>
                                    <tr class="d-flex align-items-center" style="background-color:rgb(162, 215, 247);">
                                      <td class="border-0 text-center text-dark font-size-base d-flex">Transaksi ini berpotensi mendapatkan poin {{ floor($grandTOTAL / $poin->poin_rp) }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-12 col-lg-12 col-xl-12  payment-detail">
                          <h4 class="card-label mb-2 font-weight-bold font-size-h4 text-body">
                            Catatan
                          </h4>
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                            <span class="text-dark font-size-base">{!! $detail1->catatan !!}</span>
                          </h5>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                <!-- </div>
              </div> -->
            </div>
          </div>			
        </div>
      </div>
    </div>
  </div>

  {{-- MODAL DELETE --}}
  <div class="modal fade text-left" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title white">Batal Transaksi</h5>
          <button type="button" class="white close rounded-pill btn btn-sm btn-icon btn-danger  m-0" data-dismiss="modal" aria-label="Close">
          <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
          </svg>	
          </button>
        </div>
        <form action="{{ url('/transaksi-delete') }}" method="post">
          @csrf
          @method('delete')
          <div class="modal-body">
            Yakin akan membatalkan transaksi ini <label class="font-weight-bold" id="label-del"></label>?
            <input type="hidden" id="invDel" name="invoice">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">
              <span class="">Batal</span>
            </button>
            <button type="submit" class="btn btn-danger ml-1">
              <span class="">Ya</span>
            </button>
          </div> 			
        </form>
      </div>
    </div>
  </div>
@endsection

@push('script')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
  function printDivArea(printArea) {
    var printContents = document.getElementById(printArea).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>

<script>
  jQuery(document).ready( function () {
    jQuery('#productTable').dataTable( {
      "pagingType": "simple_numbers",
    
      "columnDefs": [ {
        "targets"  : 'no-sort',
        "orderable": false,
      }]
    });
  });

  function transaksiDel(element) {
    var id = $(element).attr('data-id');
    $.ajax({
      url: "/get-data-transaksi/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        var xData = JSON.parse(JSON.stringify(data));   
        $('#label-del').text(xData.result.id_order);
        $('#invDel').val(xData.result.id_order);
        $('#modalHapus').modal('show');
      }
    });
  }
</script>
@endpush