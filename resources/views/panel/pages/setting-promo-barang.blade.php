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
  <link href="{{ asset('panel/assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('panel/assets/api/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('panel/assets/api/daterange-picker/daterangepicker.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Master</li>
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
                <div class="card-header align-items-center  border-bottom-dark px-0">
                  <div class="card-title mb-0">
                    <h3 class="card-label mb-0 font-weight-bold text-body">Promo Barang 
                    </h3>
                  </div>
                    <div class="icons d-flex">
                    <button class="btn ml-2 p-0" id="btnAddPromo" data-toggle="modal" data-target="#modalAddPromo" title="" data-placement="right" data-original-title="Check out more demos">
                      <span class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">
                        <svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-plus white" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                        </svg>
                      </span>
                    </button>
                    <a href="#" onclick="printDiv()" class="ml-2">
                      <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"></path>
                          <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"></path>
                          <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                          </svg>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          @foreach($dataPromo as $promo)
          <div class="row" id="printArea">
            <div class="col-12 col-lg-12 col-xl-12">
              <div class="card card-custom gutter-b bg-white border-0">
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12 gutter-pt table-padding" style="padding:35px;">
                      <table class="table text-body">
                        <tbody>
                          <tr class="row">
                            <td class="col-lg-3 col-3">No.</td>
                            <td class="col-lg-9 col-9">{{ $loop->iteration }}</td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">Nama Promo</td>
                            <td class="col-lg-9 col-9">{{ $promo->nama_promo }}</td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">Harga Promo</td>
                            <td class="col-lg-9 col-9">{{ "Rp. ".number_format($promo->harga_promo) }}</td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">Master Barang</td>
                            <td class="col-lg-9 col-9">{{ $promo->master_barang }}</td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">Group Pelanggan</td>
                            <td class="col-lg-9 col-9">{{ $promo->group_pelanggan }}</td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">Pot (%)</td>
                            <td class="col-lg-9 col-9">
                              @if($promo->disc_label == "Y")
                                {{ $promo->disc_value }}
                              @endif
                            </td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">Pot (Rp.)</td>
                            <td class="col-lg-9 col-9">
                              @if($promo->disc_label == "")
                                {{ $promo->disc_value }}
                              @endif
                            </td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">Cashback</td>
                            <td class="col-lg-9 col-9">{{ $promo->cashback }}</td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">Min. Transaksi</td>
                            <td class="col-lg-9 col-9">{{ $promo->min_transaksi }}</td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">Mulai</td>
                            <td class="col-lg-9 col-9">{{ $promo->stdate }}</td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">Selesai</td>
                            <td class="col-lg-9 col-9">{{ $promo->nddate }}</td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">
                              <button class="btn btn-primary" id="promo-edit-{{ base64_encode($promo->id) }}" onClick="promoEdit(this)" data-id="{{ base64_encode($promo->id) }}"> 
                                <i class="fa fa-edit"></i> Edit
                              </button>
                            </td>
                            <td class="col-lg-9 col-9"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>	
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<!--form Modal Add -->
<div class="modal fade text-left" id="modalAddPromo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Promo Barang </h4>
        <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
          <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
          </svg>
        </button>
      </div>
    
      <div class="modal-body">
        <form id="myform" action="{{ url('/setting-promo-barang/tambah') }}" method="post">
          @csrf
          @method('post')
          <div class="row">
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Nama Promo</label>
                <input type="text" name="nama_promo" class="form-control @error('nama_promo') is-invalid @enderror" value="{{ old('nama_promo') }}">
                @error('nama_promo')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Harga Promo</label>
                <input type="text" name="harga_promo" class="form-control @error('harga_promo')is-invalid @enderror" value="{{ old('harga_promo','0') }}">
                @error('harga_promo')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Master Barang</label>
                <select class="js-example-basic-multiple js-states form-control @error('master_barang')is-invalid @enderror" value="{{ old('master_barang') }}" name="master_barang[]" multiple="multiple">
                  @foreach($dataProduk as $produk)
                    <option value="{{ $produk->wip_kode }}">{{ $produk->wip_kode }}</option>
                  @endforeach
                </select>
                @error('master_barang')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Group Pelanggan</label>
                <select class="js-example-basic-multiple js-states form-control @error('group_pelanggan') is-invalid @enderror" value="{{ old('group_pelanggan') }}" name="group_pelanggan[]" multiple="multiple">
                  @foreach($masterPelanggan as $pelanggan)
                    <option value="{{ $pelanggan->jns_pelanggan }}">{{ $pelanggan->jns_pelanggan }}</option>
                  @endforeach
                </select>
                @error('group_pelanggan')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-12">
              <div class="form-group form-check">
                <label style="margin-left: -15px;">Disc (% / Rp.)</label><br>
                <input type="checkbox" class="form-check-input" name="disc_label" value="Y">
                <label class="form-check-label">Potongan <small class="text-danger"> *centang jika potongan %</small></label>
                <input type="text" name="disc_value" value="{{ old('disc_value','0') }}" class="form-control @error('disc_value') is-invalid @enderror" style="margin-left: -15px;margin-top:10px;">
                @error('disc_value')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Cashback</label>
                <input type="number" name="cashback" value="0" class="form-control @error('cashback') is-invalid @enderror">
                @error('cashback')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Min. Transaksi</label>
                <input type="number" name="min_transaksi" value="1" class="form-control @error('min_transaksi') is-invalid @enderror" value="{{ old('min_transaksi') }}">
                @error('min_transaksi')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Tgl. Mulai</label>
                <input type="date" name="stdate" class="form-control datepicker mb-3 @error('stdate') is-invalid @enderror" value="{{ old('stdate') }}">
                @error('stdate')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Tgl. Selesai</label>
                <input type="date" name="nddate" class="form-control datepicker mb-3 @error('nddate') is-invalid @enderror" value="{{ old('nddate') }}">
                @error('nddate')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambahkan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--form Modal Edit -->
<div class="modal fade text-left" id="modalEditPromo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Promo Barang </h4>
        <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
          <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
          </svg>
        </button>
      </div>
    
      <div class="modal-body">
        <form id="myform" action="{{ url('/setting-promo-barang/update') }}" method="post">
          @csrf
          @method('patch')
          <div class="row">
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Nama Promo</label>
                <input type="hidden" name="id_edit" id="id-edit">
                <input type="text" name="nama_promo" class="form-control" id="nama_promo">
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Harga Promo</label>
                <input type="text" name="harga_promo" class="form-control" id="harga_promo">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Master Barang</label>
                <select class="js-example-basic-multiple js-states form-control select2" name="master_barang[]" id="master_barang" multiple="multiple">
                </select>
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Group Pelanggan</label>
                <select class="js-example-basic-multiple js-states form-control" name="group_pelanggan[]" id="group_pelanggan" multiple="multiple">
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-12">
              <div class="form-group form-check">
                <label style="margin-left: -15px;">Disc (% / Rp.)</label><br>
                <input type="checkbox" class="form-check-input" name="disc_label" value="Y" id="disc_label">
                <label class="form-check-label">Potongan <small class="text-danger"> *centang jika potongan %</small></label>
                <input type="number" name="disc_value" id="disc_value" class="form-control" style="margin-left: -15px;margin-top:10px;">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Cashback</label>
                <input type="number" name="cashback" value="0" class="form-control" id="cashback">
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Min. Transaksi</label>
                <input type="number" name="min_transaksi" value="1" class="form-control" id="min_transaksi">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Tgl. Mulai</label>
                <input type="date" name="stdate" id="stdate" class="form-control datepicker mb-3" required>
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Tgl. Selesai</label>
                <input type="date" name="nddate" id="nddate" class="form-control datepicker mb-3" required>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary"> <i class="fa fa-upload"></i> Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="{{ asset('panel/assets/js/sweetalert.js') }}"></script>
<script src="{{ asset('panel/assets/js/sweetalert1.js') }}"></script>
<script src="{{ asset('panel/assets/api/select2/select2.min.js') }}"></script>
<script  src="{{ asset('panel/assets/api/daterange-picker/moment.min.js') }}"></script>
<script  src="{{ asset('assets/api/daterange-picker/daterangepicker.min.js') }}"></script>

{{-- @if ($errors->has('nama_promo') || $errors->has('master_barang') || $errors->has('group_pelanggan') || $errors->has('harga_promo') || $errors->has('disc_label') || $errors->has('disc_value') || $errors->has('cashback') || $errors->has('min_transaksi') || $errors->has('stdate') || $errors->has('nddate'))
  <script type="text/javascript">
      $('#btnAddPromo').trigger('click');
  </script>
@endif --}}

@if (count($errors) > 0)
  <script type="text/javascript">
      $(document).ready(function() {
        $('#modalAddPromo').modal('show');
      });
  </script>
@endif

@if(Session::has('promo-tambah'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Promo berhasil ditambahkan!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif

@if(Session::has('promo-edit'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Promo berhasil diupdate!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif

@if(Session::has('promo-error'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Error!", 
        text: "Error, Silahkan ulangi proses!",
        type: "error", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif

<script>
  jQuery(document).ready(function() {
    jQuery('.js-example-basic-single').select2({});
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
  // jQuery(document).ready(function() {
  //   $("#tglAwal" ).datepicker({
  //       dateFormat: 'YYYY-MM-DD',
  //       changeMonth: true,
  //       changeYear: true
  //   });
  // });
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
    $('.js-example-basic-multiple').select2({
      tags:true,
      dropdownParent:$('#modalEditPromo'),
    });
  });
  function promoEdit(element) {
      var id = $(element).attr('data-id');
      $.ajax({
        url: "/get-promo-barang/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          // console.log(data)
          let {
            dataPromo,
            dataProduk,
            masterPelanggan
          } = data
          $('#id-edit').val(dataPromo.id);
          $('#nama_promo').val(dataPromo.nama_promo);
          $('#harga_promo').val(dataPromo.harga_promo);
          $('#master_barang').val(dataPromo.master_barang);
          $('#group_pelanggan').val(dataPromo.group_pelanggan);
          $('#cashback').val(dataPromo.cashback);
          $('#min_transaksi').val(dataPromo.min_transaksi);
          $('#stdate').val(dataPromo.stdate);
          $('#nddate').val(dataPromo.nddate);
          $('#disc_value').val(dataPromo.disc_value);

          var checkElement = $('#disc_label');
          checkElement.empty();
          if(dataPromo.disc_label == "Y"){
            $('#disc_label').attr('checked', true);
          }else{
            $('#disc_label').attr('checked', false);
          }
         
          a = dataPromo.master_barang;
          b = a.split(",")
          var selectElement = $('#master_barang');
          selectElement.empty();
          for(produk of dataProduk){
            selectElement.append(`
              <option value="${produk.wip_kode}">${produk.wip_kode}</option>
            `)
            for(promo of b){
              if (produk.wip_kode == promo) {
                $("#master_barang option[value='" + produk.wip_kode + "']").attr("selected", "selected");
              }
            }
          }
          
          c = dataPromo.group_pelanggan;
          d = c.split(",")
          var selectElement2 = $('#group_pelanggan');
          selectElement2.empty();
          for(jnsPelanggan of masterPelanggan){
            selectElement2.append(`
              <option value="${jnsPelanggan.jns_pelanggan}">${jnsPelanggan.jns_pelanggan}</option>
            `)
            for(pelanggan of d){
              if (jnsPelanggan.jns_pelanggan == pelanggan) {
                $("#group_pelanggan option[value='" + jnsPelanggan.jns_pelanggan + "']").attr("selected", "selected");
              }
            }
          }
          $('#modalEditPromo').modal('show');
        }
      });
    }
</script>
@endpush