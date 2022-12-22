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
@endpush

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Lap. Produk Favorite</li>
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
                <div class="card-header align-items-center   border-bottom-dark px-0">
                  <div class="card-title mb-0">
                    <h3 class="card-label mb-0 font-weight-bold text-body">Detail <span class="text-black-50"></span>
                    </h3>
                  </div>
                  <div class="icons d-flex">
                    <a href="javascript:;" id="printButton" onclick="printDivArea('printArea')" class="ml-2">
                      <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"></path>
                          <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"></path>
                          <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                          </svg>
                      </span>
                    </a>
                    <a href="#" class="ml-2">
                      <span class="icon  h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"></path>
                          </svg>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="printArea">
            <div class="col-12" id="hidePrint">
              <div class="card card-custom gutter-b bg-white border-0">
                <div class="card-header align-items-center border-0">
                  <div class="card-title">
                    <h3 class="card-label font-weight-bold text-body text-center">Laporan Produk Favorit</h3>
                    <label>
                      Periode : 
                      @if($tglAwal == "" && $tglAkhir == "")
                        -
                      @else
                        {{ date('d-m-Y', strtotime($tglAwal)).' - '.date('d-m-Y', strtotime($tglAkhir)) }}
                      @endif
                    </label>
                  </div>
                </div>
                <div class="card-body">
                  <form action="/laporan-fee-koordinator" method="get">
                    <div class="form-group row justify-content-center mb-0">
                      <div class="col-md-3">
                        <label class="text-dark">Tgl. Awal</label>
                        <input type="date" name="tglAwal" id="tglAwal" class="form-control datepicker mb-3" required>
                      </div>
                      <div class="col-md-3">
                        <label class="text-dark">Tgl. Akhir</label>
                        <fieldset class="form-group mb-3 d-flex">
                          <input type="date" name="tglAkhir" id="tglAkhir" class="form-control datepicker" required>
                          <button type="submit" class="btn-primary btn ml-2 white pt-1 pb-1 d-flex align-items-center justify-content-center">Cari</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-12 ">
              <div class="card card-custom gutter-b bg-white border-0">
                <div class="card-body">
                  <div>
                    <div class=" table-responsive" id="printableTable">
                      <div id="produkFavorit_wrapper" class="dataTables_wrapper no-footer">
                      <table id="produkFavorit" class="display dataTable no-footer" role="grid" aria-describedby="produkFavorit_info">
                        <thead class="text-body">
                          <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="produkFavorit" rowspan="1" colspan="1" aria-sort="ascending" style="width: 30px;">No.</th>
                            <th class="sorting" tabindex="0" aria-controls="produkFavorit" rowspan="1" colspan="1" style="width: 200px;">Artikel</th>
                            <th class="sorting text-center" tabindex="0" aria-controls="produkFavorit" rowspan="1" colspan="1" style="width: 70px;">Total Favorit</th>
                            <th class="sorting" tabindex="0" aria-controls="produkFavorit" rowspan="1" colspan="1" style="width: 70px;">Group Member</th>
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          @foreach($getData as $data)
                          <tr class="kt-table-row kt-table-row-level-0 odd" role="row">
                            <td class="sorting_1">{{ $loop->iteration }}</td>
                            <td>
                              <div class="d-flex align-items-center">
                                <span>{{ $data->style_barang.' '.$data->warna_barang }}</span>
                              </div>
                            </td>
                            <td class="text-center"> <span class="badge badge-success" data-toggle="tooltip" data-placement="top" title="ssss">{{ $data->totUser }}</span>
                            </td>
                            <td>{{ $data->jns_member }}</td>
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
    jQuery('#produkFavorit').dataTable( {
      "pagingType": "simple_numbers",
    
      "columnDefs": [ {
        "targets"  : 'no-sort',
        "orderable": false,
      }]
    });
  });
</script>
@endpush