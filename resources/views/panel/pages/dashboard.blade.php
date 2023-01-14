@extends('panel.layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end::Subheader-->
  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="row">
            @foreach($totalMember as $dtMember)
            <div class="col-lg-6 col-xl-3">
              <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-primary">
                <div class="card-body">
                  <h3 class="text-body font-weight-bold"> <i class="fas fa-user-friends"></i> </h3>
                  <div class="mt-3">
                    <div class="d-flex align-items-center">
                      <span class="text-dark font-weight-bold font-size-h1 mr-3">
                        <span class="counter" data-target="{{ $dtMember->totMember }}">{{ $dtMember->totMember }}</span>
                      </span>
                    </div>
                    <div class="text-black-50 mt-3">{{ $dtMember->jns_member }}</div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          
          <div class="row">
            <div class="col-lg-12 col-xl-12">
              <div class="card card-custom gutter-b bg-white border-0" >
                <div class="card-header align-items-center  border-0">
                  <div class="card-title mb-0">
                    <h3 class="card-label mb-0 font-weight-bold text-body">Rekap Transaksi Pelanggan
                    </h3>
                  </div>
                </div>
                <div class="card-body" >
                  <div >
                    <div class="kt-table-content table-responsive">
                      {{-- <table id="myTable" class="table "> --}}
                      <table class="table ">
                        <thead class="kt-table-thead text-body">
                          <tr>
                            <th class="kt-table-cell">Jenis Pelanggan</th>
                            <th class="kt-table-cell">
                              <div class="text-center">Total Transaksi</div>
                            </th>
                            <th class="kt-table-cell">
                              <div class="text-right">Status</div>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          @foreach($totalTransaksi as $transaksi)
                          <tr class="kt-table-row kt-table-row-level-0">
                            <td class="kt-table-cell">{{ $transaksi->jns_member }}</td>
                            <td class="kt-table-cell text-center">{{ $transaksi->totOrder }}</td>
                            <td class="kt-table-cell">
                              <div class="text-right">
                                <span class="mr-0 badge badge-success">{{ $transaksi->status }}</span>
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

          <div class="row">
            <div class="col-lg-12 col-xl-12">
              <div class="card card-custom gutter-b bg-white border-0" >
                <div class="card-header align-items-center  border-0">
                  <div class="card-title mb-0">
                    <h3 class="card-label mb-0 font-weight-bold text-body">Rekap Produk Terlaris Reseller
                    </h3>
                  </div>
                </div>
                <div class="card-body" >
                  <div >
                    <div class="kt-table-content table-responsive">
                      {{-- <table id="myTable" class="table "> --}}
                      <table class="table ">
                        <thead class="kt-table-thead text-body">
                          <tr>
                            <th class="kt-table-cell">No</th>
                            <th class="kt-table-cell">Artikel</th>
                            <th class="kt-table-cell">
                              <div class="text-center">Total Qty</div>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          @foreach($produkTerlarisReseller as $terlarisReseller)
                          <tr class="kt-table-row kt-table-row-level-0">
                            <td class="kt-table-cell">{{ $loop->iteration }}</td>
                            <td class="kt-table-cell">{{ $terlarisReseller->wip_kode.' / '.$terlarisReseller->warna.' / '.$terlarisReseller->ukuran }}</td>
                            <td class="kt-table-cell">
                              <div class="text-center">
                                <span class="mr-0 badge badge-success">{{ $terlarisReseller->totQty }}</span>
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
          
          <div class="row">
            <div class="col-lg-12 col-xl-12">
              <div class="card card-custom gutter-b bg-white border-0" >
                <div class="card-header align-items-center  border-0">
                  <div class="card-title mb-0">
                    <h3 class="card-label mb-0 font-weight-bold text-body">Rekap Produk Terlaris Stockist
                    </h3>
                  </div>
                </div>
                <div class="card-body" >
                  <div >
                    <div class="kt-table-content table-responsive">
                      {{-- <table id="myTable" class="table "> --}}
                      <table class="table ">
                        <thead class="kt-table-thead text-body">
                          <tr>
                            <th class="kt-table-cell">No</th>
                            <th class="kt-table-cell">Artikel</th>
                            <th class="kt-table-cell">
                              <div class="text-center">Total Qty</div>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          @foreach($produkTerlarisStockist as $terlarisStockist)
                          <tr class="kt-table-row kt-table-row-level-0">
                            <td class="kt-table-cell">{{ $loop->iteration }}</td>
                            <td class="kt-table-cell">{{ $terlarisStockist->wip_kode.' / '.$terlarisStockist->warna.' / '.$terlarisStockist->ukuran }}</td>
                            <td class="kt-table-cell">
                              <div class="text-center">
                                <span class="mr-0 badge badge-success">{{ $terlarisStockist->totQty }}</span>
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