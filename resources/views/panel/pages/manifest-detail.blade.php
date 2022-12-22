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

  <link href="{{ asset('panel/assets/api/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('panel/assets/api/multiple-select/multiple-select.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Manifest Detail</li>
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
                  @foreach($detailTransaksi as $detail1)
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
                    <a href="#" class="ml-2" id="manifest-delete-{{ base64_encode($detail1->id_order) }}" onClick="manifestDel(this)" data-id="{{ base64_encode($detail1->id_order) }}">
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
                            Nomer SJT : <br><span class="text-dark font-size-base">
                              @foreach($getSJT as $sjt)
                              <span class="badge badge-pill badge-primary text-light font-size-base mt-2">{{ $sjt->wip_sjt_nomer }}</span>
                              @endforeach
                            </span>
                          </h5>
                          <h5 class="font-size-h5 mt-3 mb-0 font-size-bold text-body">
                            Status : 
                            @if($detail1->status_approval == "N")
                              <span class="badge badge-pill badge-warning">{{ $detail1->status }}</span> <span class="badge badge-pill badge-danger">Un-Approved</span>
                            @elseif($detail1->status_approval == "Y")
                              <span class="badge badge-pill badge-info">{{ $detail1->status }}</span> <span class="badge badge-pill badge-success">Approved</span>
                            @else
                              @if($detail1->status == 'Verifikasi Manifest')
                                <span class="badge badge-pill badge-danger">{{ $detail1->status }}</span>
                              @elseif($detail1->status == 'Proses')
                                <span class="badge badge-pill badge-info">{{ $detail1->status }}</span>
                              @elseif($detail1->status == 'Verifikasi Nota')
                                <span class="badge badge-pill badge-warning">{{ $detail1->status }}</span>
                              @else
                                <span class="badge badge-pill badge-success">{{ $detail1->status }}</span>
                              @endif
                            @endif
                          </h5>
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
                        <div class="col-12 gutter-pt table-padding table-responsive" style="padding:35px;">
                          <table class="table table-striped text-body">
                            <thead>
                              <tr class="row"> 
                                <th class="border-0 col-lg-2 col-3 header-heading" scope="col">Artikel</th>
                                <th class="border-0 col-lg-2 col-3 text-center header-heading" scope="col">Qty</th>
                                <th class="border-0 col-lg-2 col-3 text-center header-heading text-success" scope="col">Qty Nota</th>
                                <th class="border-0 col-lg-2 col-3 text-center header-heading text-danger" scope="col">Retur</th>
                                <th class="border-0 col-lg-2 col-3 text-right header-heading" scope="col">Harga</th>
                                <th class="border-0 col-lg-2 col-3 text-right header-heading" scope="col">Sub Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $grandTOTAL = 0; 
                                $totQTY = 0;
                                $totQTY_NOTA = 0;
                                $totQTY_RETUR = 0;
                                $totFEE = 0;
                              ?>
                              @foreach($detailTransaksi as $detail2)
                              <tr class="row">
                                <td class="col-lg-2 col-3">{{ $detail2->wip_kode.' '.$detail2->warna.' #'.$detail2->ukuran }}</td>
                                <td class="col-lg-2 col-3 text-center">{{ $detail2->qty }}</td>
                                <td class="col-lg-2 col-3 text-center text-success">{{ $detail2->qty_nota }}</td>
                                <td class="col-lg-2 col-3 text-center text-danger">{{ $detail2->qty - $detail2->qty_nota }}</td>
                                <td class="col-lg-2 col-3 text-right">{{ "Rp. ".number_format($detail2->harga) }}</td>
                                <td class="col-lg-2 col-3 text-right">
                                  @if($detail2->status == "Verifikasi Nota" || $detail2->status == "Selesai")
                                    {{ "Rp. ".number_format($detail2->harga * $detail2->qty_nota) }}
                                  @else
                                    {{ "Rp. ".number_format($detail2->harga * $detail2->qty) }}
                                  @endif
                                </td>
                              </tr>
                              <?php
                                $tmp_qty = $detail2->qty;
                                $tmp_qty_nota = $detail2->qty_nota;
                                $tmp_qty_retur = $detail2->qty - $detail2->qty_nota;
                                
                                if($detail2->status == "Verifikasi Nota" || $detail2->status == "Selesai")
                                {
                                  $tmp_value = $detail2->qty_nota * $detail2->harga;
                                  $grandTOTAL += $tmp_value;
                                  
                                  $tmp_fee = $detail2->qty_nota * $detail2->fee;
                                  $totFEE += $tmp_fee;
                                }
                                else 
                                {
                                  $tmp_value = $detail2->qty * $detail2->harga;
                                  $grandTOTAL += $tmp_value;
                                  
                                  $tmp_fee = $detail2->qty * $detail2->fee;
                                  $totFEE += $tmp_fee;
                                }

                                $totQTY += $tmp_qty;
                                $totQTY_NOTA += $tmp_qty_nota;
                                $totQTY_RETUR += $tmp_qty_retur;
                              ?>
                              @endforeach
                              <tr class="row">
                                <td class="col-lg-2 col-3 text-right">Total Qty</td>
                                <td class="col-lg-2 col-3 text-center">{{ $totQTY }}</td>
                                <td class="col-lg-2 col-3 text-center text-success">{{ $totQTY_NOTA }}</td>
                                <td class="col-lg-2 col-3 text-center text-danger">{{ $totQTY_RETUR }}</td>
                                <td class="col-lg-2 col-3 text-right"></td>
                                <td class="col-lg-2 col-3 text-right"></td>
                              </tr>
                            </tbody>
                          </table>
                          @if($detail1->status_approval == "N")
                          <div class="col-12 mt-5">
                            <div class="card card-custom gutter-b bg-white border-0">
                              <div class="card-body">
                                <form action="/proses-approve-manifest" method="post">
                                  @csrf
                                  @method('patch')
                                  <div class="form-group row justify-content-center mb-0">
                                    <div class="col-md-12">
                                      <label class="text-dark">Approve/Reject Manifest</label>
                                      <fieldset class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" name="customCheck" id="customCheck2">
                                          <label class="custom-control-label" for="customCheck2">Approve</label><br>
                                          <i>- Un-Check untuk approve all/semua </i><br>
                                          <i>- Check untuk approve custom </i><br>
                                        </div>
                                      </fieldset>
                                      <fieldset class="form-group mb-3 d-flex">
                                        <input type="hidden" name="id_order" value="{{ $detail1->id_order }}">
                                        <select name="id_order_items[]" multiple="multiple" class="multiple-select w-100" required>
                                          @foreach($detailTransaksi as $getArtikel)
                                            <option value="{{ $getArtikel->id_order_items }}">{{ $getArtikel->wip_kode.' '.$getArtikel->warna.' #'.$getArtikel->ukuran }}</option>
                                          @endforeach
                                        </select>
                                        <button type="submit" class="btn-success btn ml-2 white pt-1 pb-1 d-flex align-items-center justify-content-center">Approve</button>
                                      </fieldset>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          @endif
                          <div class="row justify-content-end">
                            <div class="col-12 col-md-3">
                              <div>
                                <table class="table right-table">
                                  <tbody>
                                    <tr class="d-flex align-items-center justify-content-between">
                                      <th class="border-0 font-size-h5 mb-0 font-size-bold text-dark">
                                          TOTAL
                                      </th>
                                      <td class="border-0 justify-content-end d-flex text-dark font-size-base text-right font-size-bold">{{ "Rp. ".number_format($grandTOTAL) }}</td>
                                    </tr>
                                    <tr class="d-flex align-items-center justify-content-between">
                                      <th class="border-0 font-size-h5 mb-0 font-size-bold text-dark text-danger">
                                          FEE
                                      </th>
                                      <td class="border-0 justify-content-end d-flex text-danger font-size-bold font-size-base text-right">{{ "(-) Rp. ".number_format($totFEE) }}</td>
                                    </tr>
                                    <tr class="d-flex align-items-center justify-content-between item-price">
                                      <th class="border-0 font-size-h5 mb-0 font-size-bold text-dark">
                                          TOTAL BAYAR
                                      </th>
                                      <td class="border-0 justify-content-end d-flex text-dark font-size-base text-right font-size-bold">{{ "Rp. ".number_format($grandTOTAL - $totFEE) }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
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
          <h5 class="modal-title white">Batal Manifest</h5>
          <button type="button" class="white close rounded-pill btn btn-sm btn-icon btn-danger  m-0" data-dismiss="modal" aria-label="Close">
          <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
          </svg>	
          </button>
        </div>
        <form action="{{ url('/manifest-delete') }}" method="post">
          @csrf
          @method('delete')
          <div class="modal-body">
            Yakin akan membatalkan manifest ini <label class="font-weight-bold" id="label-del"></label>?
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
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="{{ asset('panel/assets/api/select2/select2.min.js') }}"></script>
<script src="{{ asset('panel/assets/api/multiple-select/multiple-select.min.js') }}"></script>

<script>
  jQuery(document).ready(function() {
    jQuery('.js-example-basic-single').select2();
  });
  jQuery(document).ready(function() {
    jQuery('.js-example-basic-multiple').select2();
  });
  jQuery(function() {
    jQuery('.multiple-select').multipleSelect()
  });
  jQuery(function() {
    jQuery('.single-select').multipleSelect({
      filter: true,
      filterAcceptOnEnter: true
    })
  })

  function manifestDel(element) {
    var id = $(element).attr('data-id');
    $.ajax({
      url: "/get-data-manifest/" + id,
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