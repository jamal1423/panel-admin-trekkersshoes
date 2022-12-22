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
                    <h3 class="card-label mb-0 font-weight-bold text-body">Daily Visit
                    </h3>
                  </div>
                </div>
                <div class="card-body">
                  @foreach($dataDailyVisit as $dailyVisit)
                  @endforeach
                  <form id="myform" action="{{ url('/setting-dalily-visit/update') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group row align-items-center">
                          <div class="col-lg-4 col-4">
                            <label class="col-form-label">Daily Visit</label>
                          </div>
                          <div class="col-lg-8 col-8">
                            <input type="hidden" name="id_poin" value="{{ $dailyVisit->id_poin }}">
                            <input type="number" class="form-control" value="{{ $dailyVisit->daily_visit }}" name="daily_visit" placeholder="Daily Visit">
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

@if(Session::has('daily-visit-edit'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Poin daily visit berhasil diupdate!",
        type: "success", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif
@if(Session::has('daily-visit-error'))
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