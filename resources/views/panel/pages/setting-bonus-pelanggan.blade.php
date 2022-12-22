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
                    <h3 class="card-label mb-0 font-weight-bold text-body">Bonus Pelanggan (Koordinator) 
                    </h3>
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
                      <div id="bonusPelanggan_wrapper" class="dataTables_wrapper no-footer">
                        <table id="bonusPelanggan" class="display dataTable no-footer" role="grid" aria-describedby="bonusPelanggan_info">
                          <thead class="text-body">
                            <tr role="row">
                              <th class="sorting_asc" tabindex="0" aria-controls="bonusPelanggan" rowspan="1" colspan="1" aria-sort="ascending" style="width: 30.3906px;">No.</th>
                              <th class="sorting" tabindex="0" aria-controls="bonusPelanggan" rowspan="1" colspan="1" style="width: 100.047px;">Level</th>
                              <th class="sorting" tabindex="0" aria-controls="bonusPelanggan" rowspan="1" colspan="1" style="width: 100.656px;">Total Penjualan (Ps)</th>
                              <th class="sorting" tabindex="0" aria-controls="bonusPelanggan" rowspan="1" colspan="1" style="width: 100.656px;">Jumlah Bonus</th>
                              <th class="sorting" tabindex="0" aria-controls="bonusPelanggan" rowspan="1" colspan="1" style="width: 50.656px;"></th>
                            </tr>
                          </thead>
                          <tbody class="kt-table-tbody text-dark">
                            @foreach($bonusKoordinator as $koordinator)
                            <tr class="kt-table-row kt-table-row-level-0 odd" role="row">
                              <td class="sorting_1">{{ $loop->iteration }}</td>
                              <td>{{ $koordinator->lvl_bonus }}</td>
                              <td>{{ number_format($koordinator->jumlah_pasang) }}</td>
                              <td>{{ "Rp. ".number_format($koordinator->jumlah_bonus) }}</td>
                              <td>
                                <div class="card-toolbar text-right">
                                  <div class="card-toolbar text-right">
                                    <a href="#" class="btn btn-link d-flex justify-content-center align-items-center flex-column" id="koordinator-edit-{{ base64_encode($koordinator->ID) }}" onClick="koordinatorEdit(this)" data-id="{{ base64_encode($koordinator->ID) }}">
                                      {{-- <a href="#" class="btn btn-link d-flex justify-content-center align-items-center flex-column" data-toggle="modal" data-target="#modalKoordinator"> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                      </a>
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

          <div class="row">
            <div class="col-lg-12 col-xl-12">
              <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                <div class="card-header align-items-center  border-bottom-dark px-0">
                  <div class="card-title mb-0">
                    <h3 class="card-label mb-0 font-weight-bold text-body">Bonus Pelanggan (Reseller) 
                    </h3>
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
                      <div id="bonusReseller_wrapper" class="dataTables_wrapper no-footer">
                      <table id="bonusReseller" class="display dataTable no-footer" role="grid" aria-describedby="bonusReseller_info">
                        <thead class="text-body">
                          <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="bonusReseller" rowspan="1" colspan="1" aria-sort="ascending" style="width: 30.3906px;">No.</th>
                            <th class="sorting" tabindex="0" aria-controls="bonusReseller" rowspan="1" colspan="1" style="width: 100.047px;">Level</th>
                            <th class="sorting" tabindex="0" aria-controls="bonusReseller" rowspan="1" colspan="1" style="width: 100.656px;">Total Penjualan (Ps)</th>
                            <th class="sorting" tabindex="0" aria-controls="bonusReseller" rowspan="1" colspan="1" style="width: 100.656px;">Jumlah Bonus</th>
                            <th class="sorting" tabindex="0" aria-controls="bonusReseller" rowspan="1" colspan="1" style="width: 50.656px;"></th>
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          @foreach($bonusReseller as $reseller)
                          <tr class="kt-table-row kt-table-row-level-0 odd" role="row">
                            <td class="sorting_1">{{ $loop->iteration }}</td>
                            <td>{{ $reseller->lvl_bonus }}</td>
                            <td>{{ number_format($reseller->jumlah_pasang) }}</td>
                            <td>{{ "Rp. ".number_format($reseller->jumlah_bonus) }}</td>
                            <td>
                              <div class="card-toolbar text-right">
                                <a href="#" class="btn btn-link d-flex justify-content-center align-items-center flex-column" id="reseller-edit-{{ base64_encode($reseller->ID) }}" onClick="resellerEdit(this)" data-id="{{ base64_encode($reseller->ID) }}">
                                  {{-- <a href="#" class="btn btn-link d-flex justify-content-center align-items-center flex-column" data-toggle="modal" data-target="#modalReseller"> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                  </a>
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

<!--form Modal -->
<div class="modal fade text-left" id="modalKoordinator" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Bonus Koordinator </h4>
        <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
          <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
          </svg>
        </button>
      </div>
    
      <div class="modal-body">
        <form id="myform" action="{{ url('/bonus-koordinator/update') }}" method="post">
          @csrf
          @method('patch')
          <div class="form-group">
            <label for="lvl_bonus">Level</label>
            <input type="hidden" name="id_edit" id="id-edit">
            <input type="text" name="lvl_bonus" class="form-control" id="lvl_bonus">
          </div>
          <div class="form-group">
            <label for="jumlah_pasang">Jumlah Pasang (Ps)</label>
            <input type="number" name="jumlah_pasang" class="form-control" id="jumlah_pasang">
          </div>
          <div class="form-group">
            <label for="jumlah_bonus">Jumlah Bonus (Ps)</label>
            <input type="number" name="jumlah_bonus" class="form-control" id="jumlah_bonus">
          </div>
          <button type="submit" class="btn btn-primary"> <i class="fa fa-upload"></i> Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--form Modal -->
<div class="modal fade text-left" id="modalReseller" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Bonus Reseller </h4>
        <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
          <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
          </svg>
        </button>
      </div>
    
      <div class="modal-body">
        <form id="myform" action="{{ url('/bonus-reseller/update') }}" method="post">
          @csrf
          @method('patch')
          <div class="form-group">
            <label for="lvl_bonus">Level</label>
            <input type="hidden" name="id_edit" id="id-edit-res">
            <input type="text" name="lvl_bonus" class="form-control" id="lvl_bonus_res">
          </div>
          <div class="form-group">
            <label for="jumlah_pasang">Jumlah Pasang (Ps)</label>
            <input type="number" name="jumlah_pasang" class="form-control" id="jumlah_pasang_res">
          </div>
          <div class="form-group">
            <label for="jumlah_bonus">Jumlah Bonus (Ps)</label>
            <input type="number" name="jumlah_bonus" class="form-control" id="jumlah_bonus_res">
          </div>
          <button type="submit" class="btn btn-primary"> <i class="fa fa-upload"></i> Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
  <script>
    jQuery(document).ready( function () {
      jQuery('#bonusPelanggan').dataTable( {
        "pagingType": "simple_numbers",
      
        "columnDefs": [ {
          "targets"  : 'no-sort',
          "orderable": false,
        }]
      });
      
      jQuery('#bonusReseller').dataTable( {
        "pagingType": "simple_numbers",
      
        "columnDefs": [ {
          "targets"  : 'no-sort',
          "orderable": false,
        }]
      });
    });
  </script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="{{ asset('panel/assets/js/sweetalert.js') }}"></script>
  <script src="{{ asset('panel/assets/js/sweetalert1.js') }}"></script>

  @if(Session::has('bonus-pelanggan-edit'))
  <script>
    $(document).ready(function() {
      Swal.fire({ 
          title: "Sukses!", 
          text: "Bonus pelanggan berhasil diupdate!",
          type: "success", 
          confirmButtonClass: "btn btn-primary", 
          buttonsStyling: !1 
      }) 
    });
  </script>
  @endif

  @if(Session::has('bonus-pelanggan-error'))
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
    function koordinatorEdit(element) {
      var id = $(element).attr('data-id');
      $.ajax({
        url: "/get-bonus-koordinator/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('#id-edit').val(data.ID);
          $('#lvl_bonus').val(data.lvl_bonus);
          $('#jumlah_pasang').val(data.jumlah_pasang);
          $('#jumlah_bonus').val(data.jumlah_bonus);
          
          $('#modalKoordinator').modal('show');
        }
      });
    }
    
    function resellerEdit(element) {
      var id = $(element).attr('data-id');
      $.ajax({
        url: "/get-bonus-reseller/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          console.log(data)
          $('#id-edit-res').val(data.ID);
          $('#lvl_bonus_res').val(data.lvl_bonus);
          $('#jumlah_pasang_res').val(data.jumlah_pasang);
          $('#jumlah_bonus_res').val(data.jumlah_bonus);
          
          $('#modalReseller').modal('show');
        }
      });
    }
  </script>
@endpush