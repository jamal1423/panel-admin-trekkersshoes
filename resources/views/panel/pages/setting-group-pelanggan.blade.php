@extends('panel.layouts.main')

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
                    <h3 class="card-label mb-0 font-weight-bold text-body">Group Pelanggan 
                    </h3>
                  </div>
                    <div class="icons d-flex">
                    {{-- <button class="btn ml-2 p-0" id="kt_notes_panel_toggle" data-toggle="modal" data-target="#modalForm" title="" data-placement="right" data-original-title="Check out more demos">
                      <span class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">
                        <svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-plus white" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                        </svg>
                      </span>
                    </button> --}}
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

          <!--Login form Modal -->
          <div class="modal fade text-left" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel33">Group Pelanggan </h4>
                  <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                  </button>
                </div>
              
                <div class="modal-body">
                  <form id="myform">
                    <div class="form-group">
                      <label for="jenisPelanggan">Group Pelanggan</label>
                      <input type="text" name="jns_pelanggan" class="form-control" id="jenisPelanggan" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                      <label for="kuponRegister">Kode Member</label>
                      <input type="text" name="kupon_register" class="form-control" id="kuponRegister">
                    </div>
                    <div class="form-group form-check">
                      <label style="margin-left: -15px;">Potongan (% / Rp.)</label><br>
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Potongan <small class="text-danger"> *centang jika potongan %</small></label>
                      <input type="text" name="disc_val" class="form-control" style="margin-left: -15px;margin-top:10px;">
                    </div>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambahkan</button>
                  </form>
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
                      <div id="groupPelanggan_wrapper" class="dataTables_wrapper no-footer">
                      <table id="groupPelanggan" class="display dataTable no-footer" role="grid" aria-describedby="groupPelanggan_info">
                        <thead class="text-body">
                          <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="groupPelanggan" rowspan="1" colspan="1" aria-sort="ascending" style="width: 30.3906px;">No.</th>
                            <th class="sorting" tabindex="0" aria-controls="groupPelanggan" rowspan="1" colspan="1" style="width: 150.047px;">Group Pelanggan</th>
                            <th class="sorting" tabindex="0" aria-controls="groupPelanggan" rowspan="1" colspan="1" style="width: 70.656px;">Kode Member</th>
                            <th class="sorting" tabindex="0" aria-controls="groupPelanggan" rowspan="1" colspan="1" style="width: 100.656px;">Potongan</th>
                            {{-- <th class="sorting" tabindex="0" aria-controls="groupPelanggan" rowspan="1" colspan="1" style="width: 50.656px;"></th> --}}
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          @foreach($dataGroupPelanggan as $groupPelanggan)
                          <tr class="kt-table-row kt-table-row-level-0 odd" role="row">
                            <td class="sorting_1">{{ $loop->iteration }}</td>
                            <td>
                              <div class="d-flex align-items-center">
                                <span>{{ $groupPelanggan->jns_pelanggan }}</span>
                              </div>
                            </td>
                            
                            <td>{{ $groupPelanggan->kupon_register }}</td>
                            <td>
                              @if($groupPelanggan->fee_persen > 0)
                                {{ $groupPelanggan->fee_persen."(%)" }}
                              @else
                                @if($groupPelanggan->disc_val < 1)
                                  {{ $groupPelanggan->disc_val }}
                                @else
                                  {{ "Rp. ".$groupPelanggan->disc_val }}
                                @endif
                              @endif
                            </td>
                            {{-- <td>
                              <div class="card-toolbar text-right">
                                <button class="btn p-0 shadow-none" type="button" id="dropdowneditButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="svg-icon">
                                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-three-dots text-body" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
                                    </svg>
                                  </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdowneditButton">
                                  <a class="dropdown-item" href="add-product.html">Edit</a>
                                  <a class="dropdown-item confirm-delete" title="Delete" href="#">Hapus</a>
                                </div>
                                </div>
                            </td>
                          </tr> --}}
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
@endsection

@push('script')
<script>
  jQuery(document).ready( function () {
    jQuery('#groupPelanggan').dataTable( {
      "pagingType": "simple_numbers",
    
      "columnDefs": [ {
        "targets"  : 'no-sort',
        "orderable": false,
      }]
    });
  });
</script>
@endpush