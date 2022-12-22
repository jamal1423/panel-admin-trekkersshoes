@extends('panel.layouts.main')

@push('style')
  <link href="{{ asset('panel/assets/api/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('panel/assets/api/daterange-picker/daterangepicker.css') }}" rel="stylesheet" type="text/css"/>
  <style>
    @media print {
        #hidePrint{
          display:none;
          font-size: 16px;
        }
    }
  </style>

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js" data-modules="effect effect-bounce effect-blind effect-bounce effect-clip effect-drop effect-fold effect-slide"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
@endpush

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Lap. Penjualan Trekkers Link</li>
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
                  <div class="card-title mb-0">
                    <h3 class="card-label mb-0 font-weight-bold text-body">Detail <span class="text-black-50"></span>
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
                    <a href="#" class="ml-2">
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

            <div class="col-12" id="hidePrint">
              <div class="card card-custom gutter-b bg-white border-0">
                <div class="card-body">
                  <form action="/laporan-penjualan-trekkers-link" method="get">
                    <div class="form-group row justify-content-center mb-0">
                      <div class="col-md-3">
                        <label class="text-dark">Tgl. Awal</label>
                        <input type="date" name="tglAwal" id="tglAwal" class="form-control datepicker mb-3" required>
                      </div>
                      <div class="col-md-3">
                        <label class="text-dark">Tgl. Akhir</label>
                        <input type="date" name="tglAkhir" id="tglAkhir" class="form-control datepicker mb-3" required>
                      </div>
                      <div class="col-md-4">
                        <label class="text-dark">Pelanggan</label>
                        <fieldset class="form-group mb-3 d-flex">
                          <select class="js-example-basic-single js-states form-control bg-transparent select2-hidden-accessible" name="jnsPelanggan" tabindex="-1" aria-hidden="true">
                            <option value="all" data-select2-id="select2-data-3-nsh2">ALL</option>
                            @foreach($dataJenisMember as $jenisMember)
                              <option value="{{ $jenisMember->jns_pelanggan }}">{{ $jenisMember->jns_pelanggan }}</option>
                            @endforeach
                          </select>
                          <button type="submit" class="btn-primary btn ml-2 white pt-1 pb-1 d-flex align-items-center justify-content-center">Cari</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-12 col-xl-12">
              <div class="card card-custom gutter-b bg-white border-0">
                <div class="card-header align-items-center border-0">
                  <div class="card-title">
                      <h3 class="card-label font-weight-bold text-body text-center">Laporan Penjualan Trekkers Link</h3>
                      <label>
                        Periode : 
                        @if($tglAwal == "" && $tglAkhir == "")
                          -
                        @else
                          {{ date('d-m-Y', strtotime($tglAwal)).' - '.date('d-m-Y', strtotime($tglAkhir)) }}
                        @endif
                      </label><br>
                      <label>
                        Member : 
                        @if($jnsPelanggan != "")
                          {{ $jnsPelanggan }}
                        @else
                          All
                        @endif
                      </label>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12 gutter-pt table-padding" style="padding:35px;">
                      <table class="table text-body">
                        <thead>
                          <tr class="row"> 
                            <th class="border-0 col-lg-2 col-3 header-heading" scope="col">Invoice</th>
                            <th class="border-0 col-lg-4 col-4 header-heading" scope="col">Artikel</th>
                            <th class="border-0 col-lg-2 col-2 text-center header-heading" scope="col">Qty</th>
                            <th class="border-0 col-lg-2 col-3 text-right header-heading" scope="col">Harga</th>
                            <th class="border-0 col-lg-2 col-3 text-right header-heading" scope="col">Sub Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $totalQty = 0;
                            $grandTOTAL= 0;
                          @endphp
                          @foreach($getInvoice as $invoice)
                          <tr class="row">
                            <td class="col-lg-12 col-12 font-size-bold" colspan="5" style="background-color:#c5f3f0;">{{ $invoice->idOrder }}</td>
                          </tr>
                            @foreach($getItems as $items)
                              @if($invoice->idOrder == $items->id_order)
                                @php
                                  // $subTotal = 0;
                                  // $subTotal = $subTotal + ($items->harga * $items->qty);
                                  $grandTOTAL += ($items->harga * $items->qty);
                                @endphp
                              <tr class="row">
                                <td class="col-lg-2 col-3"></td>
                                <td class="col-lg-4 col-4">{{ $items->wip_kode.' / '.$items->warna.' / '.$items->ukuran }}</td>
                                <td class="col-lg-2 col-3 text-center">{{ $items->qty }}</td>
                                <td class="col-lg-2 col-3 text-right">{{ "Rp. ".number_format($items->harga) }}</td>
                                <td class="col-lg-2 col-3 text-right">{{ "Rp. ".number_format($items->qty * $items->harga) }}</td>
                              </tr>
                              @endif
                            @endforeach
                            
                            @php
                              $subTotal = 0;
                            @endphp

                            @foreach($getItems as $items2)
                              @if($invoice->idOrder == $items2->id_order)
                                @php
                                  $subTotal += $items2->harga * $items2->qty;
                                @endphp
                              @endif
                            @endforeach
                            <tr class="row">
                              <td class="col-lg-2 col-3"></td>
                              <td class="col-lg-4 col-4"></td>
                              <td class="col-lg-2 col-3 text-center"></td>
                              <td class="col-lg-2 col-3 text-right font-size-bold">Sub Total</td>
                              <td class="col-lg-2 col-3 text-right font-size-bold">{{ "Rp. ".number_format($subTotal) }}</td>
                            </tr>
                            <tr class="row">
                              <td class="col-lg-3 col-3 font-size-bold">Nama Pelanggan : </td>
                              <td class="col-lg-3 col-3">{{ ucwords($invoice->nama_pelanggan) }}</td>
                              <td class="col-lg-3 col-3 font-size-bold">Member : </td>
                              <td class="col-lg-3 col-3">{{ ucwords($invoice->jns_member) }}</td>
                            </tr>
                            <tr class="row">
                              <td class="col-lg-3 col-3 font-size-bold">Alamat : </td>
                              <td class="col-lg-3 col-3">
                                @if($invoice->alamat_lain != '')
                                  {!! $invoice->alamat_lain !!}
                                @else
                                  {!! $invoice->alamat !!}
                                @endif
                              </td>
                              <td class="col-lg-3 col-3 font-size-bold">Jarak : </td>
                              <td class="col-lg-3 col-3">{{ number_format($invoice->jarak_tempuh,1)." Km" }}</td>
                            </tr>
                            <tr class="row">
                              <td class="col-lg-3 col-3 font-size-bold">Subsidi Ongkir : </td>
                              <td class="col-lg-3 col-3">{{ "Rp. ".number_format($invoice->subsidi_ongkir) }}</td>
                              <td class="col-lg-3 col-3 font-size-bold">Rate Expedisi</td>
                              <td class="col-lg-3 col-3">{{ strtoupper($invoice->expedisi)." | ".$invoice->ongkir_tmp }}</td>
                            </tr>
                            <tr class="row">
                              <td class="col-lg-3 col-3 font-size-bold">Expedisi : </td>
                              <td class="col-lg-3 col-3">{{ $invoice->expedisi_paket }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="row justify-content-end" style="margin-right: -30px;">
                        <div class="col-12 col-md-4">
                          <div>
                            <table class="table right-table">
                              <tbody>
                                <tr class="d-flex align-items-center justify-content-between" style="background-color:#c5f3f0;">
                                  <th class="border-0 font-size-h5 mb-0 font-size-bold text-dark">
                                      GRAND TOTAL
                                  </th>
                                  <td class="border-0 justify-content-end d-flex text-dark font-size-base text-right font-size-bold">{{ "Rp. ".number_format($grandTOTAL) }}</td>
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
            </div>
          </div>			
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script src="{{ asset('panel/assets/api/select2/select2.min.js') }}"></script>
<script>
  jQuery(document).ready(function() {
    jQuery('.js-example-basic-single').select2();

    $("#tglAwal" ).datepicker({
        dateFormat: 'YYYY-MM-DD',
        changeMonth: true,
        changeYear: true
    });

    // $('#tglAkhir').daterangepicker({
    //   singleDatePicker: true,
    //   locale: {
    //     format: 'YYYY-MM-DD'
    //   }
    // });
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

</script>

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
@endpush