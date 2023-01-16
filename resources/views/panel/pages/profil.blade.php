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
          <li class="breadcrumb-item active" aria-current="page">Profil</li>
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
          <div class="row" id="printArea">
            <div class="col-12 col-lg-12 col-xl-12">
              <div class="card card-custom gutter-b bg-white border-0">
                <div class="card-body pt-2 pb-0">
                  <div class="row">
                    <div class="col-12 gutter-pt table-padding" style="padding:35px;">
                      <table class="table text-body">
                        <tbody>
                          <tr class="row">
                            <td class="col-lg-3 col-3">Username</td>
                            <td class="col-lg-9 col-9">{{ auth()->user()->username }}</td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">Nama</td>
                            <td class="col-lg-9 col-9">{{ auth()->user()->nama }}</td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">Hak Akses</td>
                            <td class="col-lg-9 col-9">{{ auth()->user()->hak_akses }}</td>
                          </tr>
                          <tr class="row">
                            <td class="col-lg-3 col-3">
                              <button class="btn btn-primary mt-2" id="promo-edit-{{ base64_encode(auth()->user()->user_id) }}" onClick="profilEdit(this)" data-id="{{ base64_encode(auth()->user()->user_id) }}"> 
                                <i class="fa fa-edit"></i> Edit Profil
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
          
        </div>
      </div>
    </div>
  </div>
</div>

<!--form Modal Edit -->
<div class="modal fade text-left" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Detail Profil</h4>
        <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
          <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
          </svg>
        </button>
      </div>
    
      <div class="modal-body">
        <form id="myform" action="{{ url('/profil-update') }}" method="post">
          @csrf
          @method('patch')
          <div class="form-group">
            <label>Username</label>
            <input type="hidden" name="user_id" id="id-edit">
            <input type="text" name="username" class="form-control" id="username-edit" readonly>
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama-edit">
            @error('nama')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
              <div class="form-text text-danger">{{ $message }} Password wajib mengandung huruf, huruf kapaital, angka, dan simbol karakter. Contoh format password (Wip123456!@)</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Hak Akses</label>
            <input type="text" name="hak_akses" class="form-control" id="hak-akses-edit" readonly>
          </div>
          @if(auth()->user()->adm_mitra != null)
          <div class="form-group">
            <label>Koordinator</label>
            <input type="text" name="adm_mitra" class="form-control" id="adm-mitra-edit" readonly>
          </div>
          @endif
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

@if (count($errors) > 0)
  <script type="text/javascript">
      $(document).ready(function() {
        $('#modalForm').modal('show');
      });
  </script>
@endif

@if(Session::has('profil-edit'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Profil berhasil diupdate!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif

@if(Session::has('profil-error'))
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
  function printDivArea(printArea) {
    var printContents = document.getElementById(printArea).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>

<script>
  function profilEdit(element) {
      var id = $(element).attr('data-id');
      $.ajax({
        url: "/get-profil/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          // console.log(data)
          let {
            dataAdmin
          } = data

          $('#id-edit').val(dataAdmin.user_id);
          $('#username-edit').val(dataAdmin.username);
          $('#nama-edit').val(dataAdmin.nama);
          $('#hak-akses-edit').val(dataAdmin.hak_akses);
          $('#adm-mitra-edit').val(dataAdmin.adm_mitra);
          $('#modalForm').modal('show');
        }
      });
    }
</script>
@endpush