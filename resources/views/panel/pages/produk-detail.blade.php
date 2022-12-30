@extends('panel.layouts.main')

@push('style')
  <link href="{{ asset('panel/assets/api/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('panel/assets/css/dropzone.css') }}">
  <link rel="stylesheet" href="{{ asset('panel/assets/css/trix.css') }}">

  <style>
    trix-toolbar [data-trix-button-group="file-tools"],
		trix-toolbar [data-trix-attribute='quote'],
		trix-toolbar [data-trix-attribute='code'],
		trix-toolbar [data-trix-attribute='heading1'] {
			display: none;
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
          <li class="breadcrumb-item active" aria-current="page">Produk Detail</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end::Subheader-->

  <div class="d-flex flex-column-fluid">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-custom gutter-b bg-white border-0">

                <div class="card-header align-items-center  border-0">
                  <div class="card-title mb-0">
                    <h3 class="card-label mb-0 font-weight-bold text-body">Detail Produk
                    </h3>
                  </div>
                </div>
                @foreach($produkDetail as $detail)
                <div class="card-body">
                  <form id="myform" action="{{ url('/produk-update') }}" novalidate="novalidate" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                      <label>Artikel</label>
                      <input type="text" name="nama" class="form-control" value="{{ $detail->wip_style }}" readonly>
                      <input type="hidden" name="ID" class="form-control" value="{{ $detail->ID }}">
                      <input type="hidden" name="kd_brg" class="form-control" value="{{ $detail->kd_brg }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Deskripsi</label>
                      <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi',$detail->deskripsi) }}">
                      <trix-editor input="deskripsi"></trix-editor>
                      @error('deskripsi')
                          <p class="text-danger" style="font-size:11px;">{{ $message }}</p>
                      @enderror
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tipe Produk</label>
                      <ul class="list-unstyled mb-0">
												<li class="d-inline-block mr-2 mb-1">
												  <fieldset>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="tipe_produk" value="Anak" {{$detail->tipe_produk == 'Anak' ? 'checked' : '' }}>
                              <label class="form-check-label">
                              Anak
                              </label>
                            </div>
												  </fieldset>
												</li>
												<li class="d-inline-block mr-2 mb-1">
												  <fieldset>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="tipe_produk" value="Pria" {{$detail->tipe_produk == 'Pria' ? 'checked' : '' }}>
                              <label class="form-check-label">
                              Pria
                              </label>
                            </div>
												  </fieldset>
												</li>
												<li class="d-inline-block mr-2 mb-1">
												  <fieldset>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="tipe_produk" value="Wanita" {{$detail->tipe_produk == 'Wanita' ? 'checked' : '' }}>
                              <label class="form-check-label">
                              Wanita
                              </label>
                            </div>
												  </fieldset>
												</li>
												<li class="d-inline-block mr-2 mb-1">
												  <fieldset>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="tipe_produk" value="Sekolah" {{$detail->tipe_produk == 'Sekolah' ? 'checked' : '' }}>
                              <label class="form-check-label">
                              Sekolah
                              </label>
                            </div>
												  </fieldset>
												</li>
											</ul>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Grup Produk</label>
                      <fieldset class="form-group mb-3 d-flex">
                        <select class="js-example-basic-single js-states form-control bg-transparent select2-hidden-accessible" name="nama_group" tabindex="-1" aria-hidden="true">
                          @foreach($dataGroup as $group)
                            @if($detail->nama_group == $group->nama_group)
                                <option value="{{ $group->nama_group }}" selected>{{ $group->nama_group }}</option>
                            @else
                              <option value="{{ $group->nama_group }}">{{ $group->nama_group }}</option>
                            @endif
                          @endforeach
                        </select>
                      </fieldset>
                      @error('nama_group')
                          <p class="text-danger" style="font-size:11px;">{{ $message }}</p>
                      @enderror
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kategori</label>
                      <ul class="list-unstyled mb-0">
											  <li class="d-inline-block mr-2 mb-1">
                          <fieldset>
                            <div class="checkbox">
                              @if($detail->produk_baru == "Produk baru")
                                <input type="checkbox" class="checkbox-input" id="checkbox1" value="Produk Baru" name="produk_baru" checked>
                              @else
                                <input type="checkbox" class="checkbox-input" id="checkbox1" value="Produk Baru" name="produk_baru">
                              @endif
                              <label for="checkbox1">Produk Baru</label>
                            </div>
                          </fieldset>
											  </li>
											  <li class="d-inline-block mr-2 mb-1">
                          <fieldset>
                            <div class="checkbox">
                              @if($detail->produk_populer == "Produk Populer")
                                <input type="checkbox" class="checkbox-input" id="checkbox2" value="Produk Populer" name="produk_populer" checked>
                              @else
                                <input type="checkbox" class="checkbox-input" id="checkbox2" value="Produk Populer" name="produk_populer">
                              @endif
                            <label for="checkbox2">Produk Populer</label>
                            </div>
                          </fieldset>
											  </li>
											</ul>
                    </div>

                    <div class="form-group">
                      <label>Berat (gr)</label>
                      <input type="text" name="berat" class="form-control" value="1000">
                    </div>
                    
                    <div class="form-group">
                      <label>Foto Produk</label>
                      <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                          {{-- <div id="dropzone1">
                            <div>Select Image</div>
                            <input type="file" name="foto_produk_detail1" accept="image/png, image/gif, image/jpeg" />
                          </div> --}}
                          
                          <div class="avatar-upload mb-3">
                            <div class="avatar-edit">
                              <input type="file" name="foto_produk_detail1" id="imageUpload1" accept=".png, .jpg, .jpeg">
                              <input type="hidden" name="oldImageDetail1" value="{{ $detail->foto_produk_detail1 }}">
                              <input type="hidden" name="oldImage" value="{{ $detail->foto_produk }}">
                              @if(!$detail->foto_produk_detail1)
                              <label for="imageUpload1" style="color:#b1aeae">image upload</label>
                              @else
                              <label for="imageUpload1" style="color:#b1aeae"></label>
                              @endif
                            </div>
                            <div class="avatar-preview">
                              <div id="imagePreview1" class="rounded" style="background-image: url('{{ $baseUrlImage.$detail->foto_produk_detail1 }}')"></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="avatar-upload mb-3">
                            <div class="avatar-edit">
                              <input type="file" name="foto_produk_detail2" id="imageUpload2" accept=".png, .jpg, .jpeg">
                              <input type="hidden" name="oldImageDetail2" value="{{ $detail->foto_produk_detail2 }}">
                              @if(!$detail->foto_produk_detail2)
                              <label for="imageUpload2" style="color:#b1aeae">image upload</label>
                              @else
                              <label for="imageUpload2" style="color:#b1aeae"></label>
                              @endif
                            </div>
                            <div class="avatar-preview">
                              <div id="imagePreview2" class="rounded" style="background-image: url('{{ $baseUrlImage.$detail->foto_produk_detail2 }}')">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="avatar-upload mb-3">
                            <div class="avatar-edit">
                              <input type="file" name="foto_produk_detail3" id="imageUpload3" accept=".png, .jpg, .jpeg">
                              <input type="hidden" name="oldImageDetail3" value="{{ $detail->foto_produk_detail3 }}">
                              @if(!$detail->foto_produk_detail3)
                              <label for="imageUpload3" style="color:#b1aeae">image upload</label>
                              @else
                              <label for="imageUpload3" style="color:#b1aeae"></label>
                              @endif
                            </div>
                            <div class="avatar-preview">
                              <div id="imagePreview3" class="rounded" style="background-image: url('{{ $baseUrlImage.$detail->foto_produk_detail3 }}')">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="avatar-upload mb-3">
                            <div class="avatar-edit">
                              <input type="file" name="foto_produk_detail4" id="imageUpload4" accept=".png, .jpg, .jpeg">
                              <input type="hidden" name="oldImageDetail4" value="{{ $detail->foto_produk_detail4 }}">
                              @if(!$detail->foto_produk_detail4)
                              <label for="imageUpload4" style="color:#b1aeae">image upload</label>
                              @else
                              <label for="imageUpload4" style="color:#b1aeae"></label>
                              @endif
                            </div>
                            <div class="avatar-preview">
                              <div id="imagePreview4" class="rounded" style="background-image: url('{{ $baseUrlImage.$detail->foto_produk_detail4 }}')">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="avatar-upload mb-3">
                            <div class="avatar-edit">
                              <input type="file" name="foto_produk_detail5" id="imageUpload5" accept=".png, .jpg, .jpeg">
                              <input type="hidden" name="oldImageDetail5" value="{{ $detail->foto_produk_detail5 }}">
                              @if(!$detail->foto_produk_detail5)
                              <label for="imageUpload5" style="color:#b1aeae">image upload</label>
                              @else
                              <label for="imageUpload5" style="color:#b1aeae"></label>
                              @endif
                            </div>
                            <div class="avatar-preview">
                              <div id="imagePreview5" class="rounded" style="background-image: url('{{ $baseUrlImage.$detail->foto_produk_detail5 }}')">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="avatar-upload mb-3">
                            <div class="avatar-edit">
                              <input type="file" name="foto_produk_detail6" id="imageUpload6" accept=".png, .jpg, .jpeg">
                              <input type="hidden" name="oldImageDetail6" value="{{ $detail->foto_produk_detail6 }}">
                              @if(!$detail->foto_produk_detail6)
                              <label for="imageUpload6" style="color:#b1aeae">image upload</label>
                              @else
                              <label for="imageUpload6" style="color:#b1aeae"></label>
                              @endif
                            </div>
                            <div class="avatar-preview">
                              <div id="imagePreview6" class="rounded" style="background-image: url('{{ $baseUrlImage.$detail->foto_produk_detail6 }}')">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="avatar-upload mb-3">
                            <div class="avatar-edit">
                              <input type="file" name="foto_produk_detail7" id="imageUpload7" accept=".png, .jpg, .jpeg">
                              <input type="hidden" name="oldImageDetail7" value="{{ $detail->foto_produk_detail7 }}">
                              @if(!$detail->foto_produk_detail7)
                              <label for="imageUpload7" style="color:#b1aeae">image upload</label>
                              @else
                              <label for="imageUpload7" style="color:#b1aeae"></label>
                              @endif
                            </div>
                            <div class="avatar-preview">
                              <div id="imagePreview7" class="rounded" style="background-image: url('{{ $baseUrlImage.$detail->foto_produk_detail7 }}')">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="avatar-upload mb-3">
                            <div class="avatar-edit">
                              <input type="file" name="foto_produk_detail8" id="imageUpload8" accept=".png, .jpg, .jpeg">
                              <input type="hidden" name="oldImageDetail8" value="{{ $detail->foto_produk_detail8 }}">
                              @if(!$detail->foto_produk_detail8)
                              <label for="imageUpload8" style="color:#b1aeae">image upload</label>
                              @else
                              <label for="imageUpload8" style="color:#b1aeae"></label>
                              @endif
                            </div>
                            <div class="avatar-preview">
                              <div id="imagePreview8" class="rounded" style="background-image: url('{{ $baseUrlImage.$detail->foto_produk_detail8 }}')">
                              </div>
                            </div>
                          </div>
                        </div>
                       
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary"> <i class="fa fa-upload"></i> Update Detail</button>
                  </form>
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
@endsection

@push('script')
  <script src="{{ asset('panel/assets/js/jquery.js') }}"></script>
  <script src="{{ asset('panel/assets/js/dropzone.js') }}"></script>
  <script src="{{ asset('panel/assets/js/trix.js') }}"></script>
  <script src="{{ asset('panel/assets/api/select2/select2.min.js') }}"></script>

  <script>
    document.addEventListener('trix-file-accept', function(e) {
			e.preventDefault();
		});
  </script>

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

</script>
@endpush