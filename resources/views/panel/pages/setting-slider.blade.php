@extends('panel.layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Slider</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end::Subheader-->

  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-xl-12">
          <div class="card card-custom bg-transparent shadow-none border-0 mb-0">
            <div class="card-header align-items-center  border-bottom-dark px-0">
              <div class="card-title mb-0">
                <h3 class="card-label mb-0 font-weight-bold text-body">Data Slider
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-12 ">
          <div id="generalmedia" class="media0 linked card card-custom gutter-b bg-white border-0">
            <div class="card-header border-0 align-items-center">
              <div class="icons d-flex">
                <button type="button" title="Tambah Slider" class="btn btn-primary white p-2 ml-2" data-toggle="modal" data-target="#imagepopup">
                   <i class="fa fa-plus"></i> Tambah Slider
                </button>
                <!--Basic Modal -->
                <div class="modal fade text-left" id="imagepopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog " role="document">
                    <form action="{{ url('/setting-slider/tambah') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('post')
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="myModalLabel1">Tambah Data Slider</h3>
                          <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                            </svg>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>
                            Klik atau Drop gambar dibawah
                          </p>
                          <div class="avatar-upload mb-3">
                            <div class="avatar-edit">
                              <input type="file" name="gambar" id="imageUpload" accept=".png, .jpg, .jpeg">
                              <label for="imageUpload">
                                image upload
                              </label>
                            </div>
                            <div class="avatar-preview">
                              <div id="imagePreview" class="rounded" style="background-image: url()">
                              </div>
                            </div>
                          </div>
                          <fieldset class="form-label-group">
                            <label for="label-textarea2">Keterangan</label>
                            <textarea class="form-control" id="label-textarea2" rows="3" name="nama"></textarea>
                          </fieldset>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-light" data-dismiss="modal">
                            <span class="">Batal</span>
                          </button>
                          <button type="submit" class="btn btn-primary ml-1">
                            <span class="">Simpan</span>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="All-center" role="tabpanel" aria-labelledby="All-tab-center">
                <div class="card-body">
                  <div class="row">
                    @foreach($dataSlider as $slider)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 loadingmore" style="display: block;">
                      <div class="thumbnail text-center mb-4">
                        <div class="detail-link">
                          <a href="#" class="btn btn-link d-flex justify-content-center align-items-center flex-column" id="slider-edit-{{ base64_encode($slider->id) }}" onClick="sliderEdit(this)" data-id="{{ base64_encode($slider->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            Edit
                          </a>
                          
                          <a href="#" class="btn btn-link d-flex justify-content-center align-items-center flex-column" id="slider-delete-{{ base64_encode($slider->id) }}" onClick="sliderDelete(this)" data-id="{{ base64_encode($slider->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                            Hapus
                          </a>
                        </div>
                        <div class="thumbnail-imges ">
                          <a class="img-select d-block" href="javascript:void(0);">
                          <img class="img-fluid" src="{{ $baseUrlImage.$slider->gambar }}" alt="image">
                        </a>
                        </div>
                      </div>
                    </div>
                    @endforeach
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

<!--Edit Gambar Slider -->
<div class="modal fade text-left" id="modalSlider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Gambar Slider </h4>
        <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
          <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
          </svg>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/setting-slider/update') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="form-group">
            <div class="row">
              <div class="col-12">
                <label for="nameBasic">Yakin akan ubah data <strong id="label-edit"></strong>?</label>
                <input type="hidden" name="id_edit" id="id-edit">
                <input type="hidden" name="oldImage" id="oldImage-edit">
                <div class="row">
                  <div class="col-6">
                    <span class="badge badge-info mb-2" style="font-size: 12px">Gambar Original</span>
                    <div id="img-edit"></div>
                  </div>
                  <div class="col-6">
                    <span class="badge badge-success mb-2" style="font-size: 12px">Upload Gambar Baru</span>
                    <div class="avatar-upload">
                      <div class="avatar-edit">
                        <input type="file" name="gambar" id="imageUpload1" accept=".png, .jpg, .jpeg">
                        <label for="imageUpload1" style="font-size: 12px">
                          Upload Gambar
                        </label>
                      </div>
                      <div class="avatar-preview" style="height: 116px;">
                        <div id="imagePreview1" class="rounded" style="background-image: url();height:116px;"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <span class="badge badge-danger mt-2 text-center" style="font-size: 12px">Pastikan gambar yang diupload berukuran 1280px x 674px</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary"> <i class="fa fa-upload"></i> Update Slider</button>
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
        <h5 class="modal-title white">Hapus Slider</h5>
        <button type="button" class="white close rounded-pill btn btn-sm btn-icon btn-danger  m-0" data-dismiss="modal" aria-label="Close">
        <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
        </svg>	
        </button>
      </div>
      <form action="{{ url('/setting-slider/delete') }}" method="post">
        @csrf
        @method('delete')
        <div class="modal-body">
          Yakin akan menghapus slider <label class="font-weight-bold" id="label-del"></label>?
          <input type="hidden" name="id" id="id-del">
          <input type="hidden" name="oldImage" id="oldImage-del">
          <div id="img-del"></div>
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

@if(Session::has('slider-tambah'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Slider berhasil ditambahkan!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif
@if(Session::has('slider-edit'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Slider berhasil diupdate!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif
@if(Session::has('slider-delete'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Slider berhasil dihapus!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif
@if(Session::has('slider-error'))
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
  function sliderEdit(element) {
    var id = $(element).attr('data-id');
    $.ajax({
      url: "/get-data-slider/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        console.log(data)
        
        var imgElement = $('#img-edit');
        imgElement.empty();

        $('#id-edit').val(data.id);
        $('#label-edit').text(data.nama);
        $('#oldImage-edit').val(data.gambar);
        
        var imgs_del = data.gambar;
        var elem_del= document.createElement("img");
        elem_del.setAttribute("src", "/slider/" + imgs_del);
        elem_del.className="img-fluid";
        document.getElementById("img-edit").appendChild(elem_del);
        // document.getElementById("imagePreview1").style.backgroundImage="url(http://127.0.0.1:8000/slider/slider2.jpg)";
        $('#modalSlider').modal('show');
      }
    });
  }
  
  function sliderDelete(element) {
    var id = $(element).attr('data-id');
    $.ajax({
      url: "/get-data-slider/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        console.log(data)
        
        var imgElement = $('#img-del');
        imgElement.empty();

        $('#id-del').val(data.id);
        $('#label-del').text(data.nama);
        $('#oldImage-del').val(data.gambar);
        
        var imgs_del = data.gambar;
        var elem_del= document.createElement("img");
        elem_del.setAttribute("src", "/slider/" + imgs_del);
        elem_del.className="img-fluid";
        document.getElementById("img-del").appendChild(elem_del);
        $('#modalHapus').modal('show');
      }
    });
  }
</script>
@endpush