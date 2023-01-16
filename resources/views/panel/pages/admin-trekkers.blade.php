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
  <link href="{{ asset('panel/assets/api/multiple-select/multiple-select.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Admin Trekkers</li>
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
                    <h3 class="card-label mb-0 font-weight-bold text-body">Data Admin 
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

          <!--Add form Modal -->
          <div class="modal fade text-left" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel33">Tambah Admin </h4>
                  <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="myform" action="{{ url('/admin-trekkers/tambah') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control @error('username') is-invalid  @enderror" value="{{ old('username') }}">
                      @error('username')
                        <div class="form-text text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}">
                      @error('nama')
                        <div class="form-text text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" autocomplete="off">
                      @error('password')
                        <div class="form-text text-danger">{{ $message }} Password wajib mengandung huruf, huruf kapaital, angka, dan simbol karakter. Contoh format password (Wip123456!@)</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Hak Akses</label>
                      <select class="js-example-basic-single js-states form-control bg-transparent select2-hidden-accessible @error('hak_akses') is-invalid @enderror" name="hak_akses" tabindex="-1" aria-hidden="true">
                        <option value="Administrator">Administrator</option>
                        <option value="WebAdmin">Admin Webstore</option>
                        <option value="GudangJadi">Gudang Jadi</option>
                        <option value="KoordinatorReseller">Koordinator-Corp</option>
                      </select>
                      @error('hak_akses')
                        <div class="form-text text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Adm Mitra</label>
                      <select class="js-example-basic-single js-states form-control bg-transparent select2-hidden-accessible @error('adm_mitra') is-invalid @enderror" name="adm_mitra" tabindex="-1" aria-hidden="true">
                        <option></option>
                        @foreach($dataGroupPelanggan as $groupPelanggan)
                          <option value="{{ $groupPelanggan->jns_pelanggan }}">{{ $groupPelanggan->jns_pelanggan }}</option>
                        @endforeach
                      </select>
                      @error('adm_mitra')
                        <div class="form-text text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambahkan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          
          <!--Edit form Modal -->
          <div class="modal fade text-left" id="modalFormEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel33">Edit Admin </h4>
                  <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="myform" action="{{ url('/admin-trekkers/edit') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                      <label>Username</label>
                      <input type="hidden" name="idEdit" class="form-control @error('idEdit') is-invalid  @enderror" value="{{ old('idEdit') }}" id="idEdit" readonly>
                      <input type="text" name="username" class="form-control @error('username') is-invalid  @enderror" value="{{ old('username') }}" id="username_edit" readonly>
                      @error('username')
                        <div class="form-text text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama_edit" value="{{ old('nama') }}">
                      @error('nama')
                        <div class="form-text text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Hak Akses</label>
                      <select class="js-example-basic-singleEdit js-states form-control bg-transparent @error('hak_akses') is-invalid @enderror" name="hak_akses" id="hak_akses_edit">
                      </select>
                      @error('hak_akses')
                        <div class="form-text text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Adm Mitra</label>
                      <select class="js-example-basic-singleEdit js-states form-control bg-transparent @error('adm_mitra') is-invalid @enderror" name="adm_mitra" id="adm_mitra_edit">
                      </select>
                      @error('adm_mitra')
                        <div class="form-text text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-upload"></i> Update Data</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          
          <!--Reset password -->
          <div class="modal fade text-left" id="modalFormResetPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header bg-warning">
                  <h4 class="modal-title" id="myModalLabel33">Reset Password </h4>
                  <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="myform" action="{{ url('/admin-trekkers/reset-pass') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" name="password" class="form-control @error('password') is-invalid  @enderror" value="{{ old('password') }}" id="password_reset">
                      @error('password')
                      <div class="form-text text-danger">{{ $message }} Password wajib mengandung huruf, huruf kapaital, angka, dan simbol karakter. Contoh format password (Wip123456!@)</div>
                      @enderror
                      <input type="hidden" name="idReset" class="form-control @error('idReset') is-invalid  @enderror" value="{{ old('idReset') }}" id="idReset">
                    </div>
                    <button type="submit" class="btn btn-warning"> <i class="fa fa-undo-alt"></i> Reset Password</button>
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
                  <h5 class="modal-title white">Hapus User</h5>
                  <button type="button" class="white close rounded-pill btn btn-sm btn-icon btn-danger  m-0" data-dismiss="modal" aria-label="Close">
                  <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                  </svg>	
                  </button>
                </div>
                <form action="{{ url('/admin-trekkers/delete') }}" method="post">
                  @csrf
                  @method('delete')
                  <div class="modal-body">
                    Yakin akan menghapus user <label class="font-weight-bold" id="label-del"></label>?
                    <input type="hidden" id="idDel" name="id">
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

          <div class="row">
            <div class="col-12 ">
              <div class="card card-custom gutter-b bg-white border-0">
                <div class="card-body">
                  <div>
                    <div class=" table-responsive" id="printableTable">
                      <div id="productTable_wrapper" class="dataTables_wrapper no-footer">
                      <table id="productTable" class="display dataTable no-footer" role="grid" aria-describedby="productTable_info">
                        <thead class="text-body">
                          <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 30.3906px;">No.</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 70px;">Username</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 70.656px;">Nama</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 100.656px;">Level Login</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 150.656px;">Koordinator Corp.</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 50.656px;"></th>
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          @foreach($dataAdmin as $admin)
                          <tr class="kt-table-row kt-table-row-level-0 odd" role="row">
                            <td class="sorting_1">{{ $loop->iteration }}</td>
                            <td>
                              <div class="d-flex align-items-center">
                                <span>{{ $admin->username }}</span>
                              </div>
                            </td>
                            <td>{{ $admin->nama }}</td>
                            <td>{{ $admin->hak_akses }}</td>
                            <td>{{ $admin->adm_mitra }}</td>
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
                                  <a class="dropdown-item" id="admin-edit-{{ base64_encode($admin->user_id) }}" onClick="adminEdit(this)" data-id="{{ base64_encode($admin->user_id) }}" href="#">Edit</a>
                                  <a class="dropdown-item" id="admin-reset-pass-{{ base64_encode($admin->user_id) }}" onClick="adminResetPass(this)" data-id="{{ base64_encode($admin->user_id) }}" href="#">Reset Password</a>
                                  <a class="dropdown-item" title="Delete" id="admin-delete-{{ base64_encode($admin->user_id) }}" onClick="adminDelete(this)" data-id="{{ base64_encode($admin->user_id) }}" href="#">Hapus</a>
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
@endsection

@push('script')
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
<script src="{{ asset('panel/assets/js/sweetalert.js') }}"></script>
<script src="{{ asset('panel/assets/js/sweetalert1.js') }}"></script>
<script src="{{ asset('panel/assets/api/select2/select2.min.js') }}"></script>
<script src="{{ asset('panel/assets/api/multiple-select/multiple-select.min.js') }}"></script>
<script>
  jQuery(document).ready(function() {
    jQuery('.js-example-basic-single').select2({
      tags:true,
      dropdownParent:$('#modalForm'),
    });
    
    jQuery('.js-example-basic-singleEdit').select2({
      tags:true,
      dropdownParent:$('#modalFormEdit'),
    });
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

  function adminEdit(element) {
    var id = $(element).attr('data-id');
    $.ajax({
      url: "/get-admin-trekkers/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        // console.log(data)
        let {
          masterPelanggan,
          dataAdmin
        } = data

        // var xData = JSON.parse(JSON.stringify(data));   
        // $('#username_edit').val(xData.result.username);
        // $('#nama_edit').val(xData.result.nama);
        $('#idEdit').val(dataAdmin.user_id);
        $('#username_edit').val(dataAdmin.username);
        $('#nama_edit').val(dataAdmin.nama);

        var selectElement = $('#hak_akses_edit')   
        var selectElement2 = $('#adm_mitra_edit')   
        
        selectElement.empty();
        selectElement.append(`
        <option value="Administrator">Administrator</option>
        <option value="WebAdmin">Admin Webstore</option>
        <option value="GudangJadi">Gudang Jadi</option>
        <option value="KoordinatorReseller">Koordinator-Corp</option>
        `)
        $("#hak_akses_edit option[value='" + dataAdmin.hak_akses + "']").attr("selected", "selected");

        selectElement2.empty();
        selectElement2.append(`
          <option></option>
        `)
        for (master of masterPelanggan) {
          if (master.jns_pelanggan == dataAdmin.adm_mitra) {
            selectElement2.append(`
              <option value="${master.jns_pelanggan}">${master.jns_pelanggan}</option>
            `)
            if (master.jns_pelanggan == dataAdmin.adm_mitra) {
            $("#adm_mitra_edit option[value='" + master.jns_pelanggan + "']").attr("selected", "selected");
            }
          } else {
            selectElement2.append(`
              <option value="${master.jns_pelanggan}">${master.jns_pelanggan}</option>
            `)
          }
        }
        $('#modalFormEdit').modal('show');
      }
    });
  }
  
  function adminResetPass(element) {
    var id = $(element).attr('data-id');
    $.ajax({
      url: "/get-admin-trekkers/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        let {
          dataAdmin
        } = data

        $('#idReset').val(dataAdmin.user_id);
        $('#modalFormResetPass').modal('show');
      }
    });
  }
  
  function adminDelete(element) {
    var id = $(element).attr('data-id');
    $.ajax({
      url: "/get-admin-trekkers/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        let {
          dataAdmin
        } = data
        
        $('#label-del').text(dataAdmin.nama);
        $('#idDel').val(dataAdmin.user_id);
        $('#modalHapus').modal('show');
      }
    });
  }
</script>

@if(Session::has('admin-exist'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Warning!", 
        text: " Username sudah terpakai, gunakan username lain!",
        type: "warning", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif
@if(Session::has('admin-tambah'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Data berhasil ditambahkan!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    })  
  });
</script>
@endif
@if(Session::has('admin-edit'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Data berhasil diupdate!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif
@if(Session::has('admin-reset-pass'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Password berhasil direset!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif
@if(Session::has('admin-delete'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Data berhasil dihapus!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif
@if(Session::has('admin-error'))
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
@error('password')
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Error!", 
        text: "Error, Format password salah!. Password wajib mengandung huruf, huruf kapaital, angka, dan simbol karakter. Contoh format password (Wip123456!@)",
        type: "error", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@enderror
@endpush