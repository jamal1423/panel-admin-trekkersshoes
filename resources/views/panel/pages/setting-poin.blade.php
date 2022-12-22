@extends('panel.layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Poin dan Cashback</li>
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
            <div class="col-lg-12">
              <div class="card card-custom gutter-b bg-white border-0">
                <div class="card-header align-items-center  border-0">
                  <div class="card-title mb-0">
                    <h3 class="card-label mb-0 font-weight-bold text-body">Poin
                    </h3>
                  </div>
                </div>
                <div class="card-body">
                  @foreach($dataPoin as $poin)
                  @endforeach
                  <form id="myform" action="{{ url('/setting-poin-cashback/update') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="form-group row align-items-center">
                          <div class="col-lg-2 col-2">
                            <label class="col-form-label">Rp.</label>
                          </div>
                          <div class="col-lg-10 col-10">
                            <input type="hidden" name="id_poin" value="{{ $poin->id_poin }}">
                            <input type="number" class="form-control" value="{{ $poin->poin_rp }}" name="poin_rp" placeholder="Rp.">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row align-items-center">
                          <div class="col-lg-2 col-2">
                            <label class="col-form-label">Poin</label>
                          </div>
                          <div class="col-lg-10 col-10">
                            <input type="number" class="form-control" value="{{ $poin->poin_pt }}" name="poin_pt" placeholder="Poin">
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="form-group row align-items-center">
                          <div class="col-lg-2 col-2">
                            <label class="col-form-label">Poin</label>
                          </div>
                          <div class="col-lg-10 col-10">
                            <input type="number" class="form-control" value="{{ $poin->tkr_poin_pt }}" name="tkr_poin_pt" placeholder="Poin">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row align-items-center">
                          <div class="col-lg-2 col-2">
                            <label class="col-form-label">Rp.</label>
                          </div>
                          <div class="col-lg-10 col-10">
                            <input type="number" class="form-control" value="{{ $poin->tkr_poin_rp }}" name="tkr_poin_rp" placeholder="Rp.">
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
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
<script src="{{ asset('panel/assets/js/sweetalert.js') }}"></script>
<script src="{{ asset('panel/assets/js/sweetalert1.js') }}"></script>

@if(Session::has('poin-edit'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Poin dan cashback berhasil diupdate!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif
@if(Session::has('poin-error'))
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
@endpush