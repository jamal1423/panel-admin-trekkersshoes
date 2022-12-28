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
                    <h3 class="card-label mb-0 font-weight-bold text-body">Voucher 
                    </h3>
                  </div>
                    <div class="icons d-flex">
                    <button class="btn ml-2 p-0" id="kt_notes_panel_toggle" data-toggle="modal" data-target="#modalForm" title="" data-placement="right" data-original-title="Check out more demos">
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

          <div class="row">
            <div class="col-12 ">
              <div class="card card-custom gutter-b bg-white border-0">
                <div class="card-body">
                  <div>
                    <div class=" table-responsive" id="printableTable">
                      <div id="voucherPelanggan_wrapper" class="dataTables_wrapper no-footer">
                      <table id="voucherPelanggan" class="display dataTable no-footer" role="grid" aria-describedby="voucherPelanggan_info">
                        <thead class="text-body">
                          <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="voucherPelanggan" rowspan="1" colspan="1" aria-sort="ascending" style="width: 30.3906px;">No.</th>
                            <th class="sorting" tabindex="0" aria-controls="voucherPelanggan" rowspan="1" colspan="1" style="width: 150.047px;">Kode Voucher</th>
                            <th class="sorting" tabindex="0" aria-controls="voucherPelanggan" rowspan="1" colspan="1" style="width: 70.656px;">Nominal</th>
                            <th class="sorting" tabindex="0" aria-controls="voucherPelanggan" rowspan="1" colspan="1" style="width: 100.656px;">Jenis Pelanggan</th>
                            <th class="sorting" tabindex="0" aria-controls="voucherPelanggan" rowspan="1" colspan="1" style="width: 100px;">Status</th>
                            <th class="sorting" tabindex="0" aria-controls="voucherPelanggan" rowspan="1" colspan="1" style="width: 100px;">Batas Pakai</th>
                            <th class="sorting" tabindex="0" aria-controls="voucherPelanggan" rowspan="1" colspan="1" style="width: 50.656px;"></th>
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          @foreach($dataVoucher as $voucher)
                          <tr class="kt-table-row kt-table-row-level-0 odd" role="row">
                            <td class="sorting_1">{{ $loop->iteration }}</td>
                            <td>
                              <div class="d-flex align-items-center">
                                <span>{{ $voucher->kd_voucher }}</span>
                              </div>
                            </td>
                            <td>
                              @if($voucher->voucher_persen_rp == "Y")
                                {{ $voucher->voucher_val."(%)" }}
                              @else
                                @if($voucher->voucher_val < 1)
                                  {{ $voucher->voucher_val }}
                                @else
                                  {{ "Rp. ".number_format($voucher->voucher_val) }}
                                @endif
                              @endif
                            </td>
                            <td>{{ ucwords($voucher->jenis_pelanggan) }}</td>
                            <td>{{ ucwords($voucher->status_voucher) }}</td>
                            <td>{{ $voucher->batas_pakai }}</td>
                            <td>
                              <div class="card-toolbar text-right">
                                <button class="btn p-0 shadow-none" type="button" id="dropdowneditButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="svg-icon">
                                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-three-dots text-body" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
                                    </svg>
                                  </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdowneditButton">
                                  <a class="dropdown-item" id="admin-edit-{{ base64_encode($voucher->id_voucher) }}" onClick="voucherEdit(this)" data-id="{{ base64_encode($voucher->id_voucher) }}" href="#">Edit</a>
                                  <a class="dropdown-item" title="Delete" href="#" id="voucher-delete-{{ base64_encode($voucher->id_voucher) }}" onClick="voucherDelete(this)" data-id="{{ base64_encode($voucher->id_voucher) }}">Hapus</a>
                                </div>
                                </div>
                            </td>
                          </tr>
                          @endforeach
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

<!--form Modal Add -->
<div class="modal fade text-left" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Voucher </h4>
        <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
          <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
          </svg>
        </button>
      </div>
    
      <div class="modal-body">
        <form id="modal-form" action="{{ url('/setting-voucher/tambah') }}" method="post">
          @csrf
          @method('post')
          <div class="row">
            <div class="col-md-12 col-12">
              <div class="form-group">
                <label>Kode Voucher</label>
                <input type="hidden" name="id_voucher" id="id_voucher">
                <input type="text" name="kd_voucher" id="kd_voucher" class="form-control @error('kd_voucher') is-invalid @enderror" value="{{ old('kd_voucher') }}">
                @error('kd_voucher')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-12">
              <div class="form-group form-check">
                <label style="margin-left: -15px;">Disc (% / Rp.)</label><br>
                <input type="checkbox" class="form-check-input" name="voucher_persen_rp" id="voucher_persen_rp" value="Y">
                <label class="form-check-label">Potongan <small class="text-danger"> *centang jika potongan %</small></label>
                <input type="number" name="voucher_val" id="voucher_val" value="{{ old('voucher_val','0') }}" class="form-control @error('voucher_val') is-invalid @enderror" style="margin-left: -15px;margin-top:10px;">
                @error('voucher_val')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Jenis Pelanggan</label>
                <select class="js-example-basic-single js-states form-control" name="jenis_pelanggan" id="jenis_pelanggan">
                  @foreach($masterPelanggan as $pelanggan)
                    <option value="{{ $pelanggan->jns_pelanggan }}">{{ $pelanggan->jns_pelanggan }}</option>
                  @endforeach
                </select>
                @error('jenis_pelanggan')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="form-group">
                <label>Status</label>
                <select class="js-example-basic-single js-states form-control" name="status_voucher" id="status_voucher">
                  <option value="aktif">Aktif</option>
                  <option value="non-aktif">Non-Aktif</option>
                </select>
                @error('status_voucher')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-12">
              <div class="form-group">
                <label>Batas Pakai</label>
                <input type="number" name="batas_pakai" id="batas_pakai" class="form-control datepicker mb-3 @error('batas_pakai') is-invalid @enderror" value="{{ old('batas_pakai') }}">
                @error('batas_pakai')
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <button type="submit" id="btn-submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambahkan</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- MODAL DELETE --}}
<div class="modal fade text-left" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title white">Hapus Voucher</h5>
        <button type="button" class="white close rounded-pill btn btn-sm btn-icon btn-danger  m-0" data-dismiss="modal" aria-label="Close">
        <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
        </svg>	
        </button>
      </div>
      <form action="{{ url('/setting-voucher/delete') }}" method="post">
        @csrf
        @method('delete')
        <div class="modal-body">
          Yakin akan menghapus voucher <label class="font-weight-bold" id="label-del"></label>?
          <input type="hidden" name="id_voucher" id="id_voucher_del">
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
<script src="{{ asset('panel/assets/js/sweetalert.js') }}"></script>
<script src="{{ asset('panel/assets/js/sweetalert1.js') }}"></script>
<script src="{{ asset('panel/assets/api/select2/select2.min.js') }}"></script>

@if (count($errors) > 0)
  <script type="text/javascript">
      $(document).ready(function() {
        $('#modalForm').modal('show');
      });
  </script>
@endif

<script>
  jQuery(document).ready(function() {
    jQuery('.js-example-basic-single').select2({
      tags:true,
      dropdownParent:$('#modalForm'),
    });
  });
</script>

@if(Session::has('voucher-tambah'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Voucher berhasil ditambahkan!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif

@if(Session::has('voucher-edit'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Voucher berhasil diupdate!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif

@if(Session::has('voucher-delete'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Voucher berhasil dihapus!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif

@if(Session::has('voucher-error'))
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
  jQuery(document).ready( function () {
    jQuery('#voucherPelanggan').dataTable( {
      "pagingType": "simple_numbers",
      "columnDefs": [ {
        "targets"  : 'no-sort',
        "orderable": false,
      }]
    });
  });
</script>

<script>
  function voucherEdit(element) {
    var id = $(element).attr('data-id');
    $.ajax({
      url: "/get-data-voucher/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        // console.log(data)
        let {
          dataVoucher,
          masterPelanggan
        } = data
        $('#modal-form').attr('action','{{ url("/setting-voucher/edit") }}');
        $('#id_voucher').val(dataVoucher.id_voucher);
        $('#kd_voucher').val(dataVoucher.kd_voucher);
        $('#batas_pakai').val(dataVoucher.batas_pakai);
        $('#voucher_val').val(dataVoucher.voucher_val);

        var checkElement = $('#voucher_persen_rp');
        checkElement.empty();
        if(dataVoucher.voucher_persen_rp == "Y"){
          $('#voucher_persen_rp').attr('checked', true);
        }else{
          $('#voucher_persen_rp').attr('checked', false);
        }

        var selectElement = $('#jenis_pelanggan');
        selectElement.empty();
        for(jnsPel of masterPelanggan){
          selectElement.append(`
              <option value="${jnsPel.jns_pelanggan}">${jnsPel.jns_pelanggan}</option>
            `)
          if (jnsPel.jns_pelanggan == dataVoucher.jenis_pelanggan) {
            $("#jenis_pelanggan option[value='" + jnsPel.jns_pelanggan + "']").attr("selected", "selected");
          }
        }
        
        var selectElement2 = $('#status_voucher');
        selectElement2.empty();
        selectElement2.append(`
          <option value="aktif">Aktif</option>
          <option value="non-aktif">Non-Aktif</option>
        `)
        $("#status_voucher option[value='" + dataVoucher.status_voucher + "']").attr("selected", "selected");

        $('#modalForm').modal('show');
      }
    });
  }

  function voucherDelete(element) {
    var id = $(element).attr('data-id');
    $.ajax({
      url: "/get-data-voucher/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        console.log(data)
        let {dataVoucher} = data
        $('#id_voucher_del').val(dataVoucher.id_voucher);
        $('#label-del').text(dataVoucher.kd_voucher);
        $('#modalHapus').modal('show');
      }
    });
  }
</script>
@endpush