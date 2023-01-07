@extends('panel.layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Produk</li>
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
          <!-- <div class="row">
            <div class="col-lg-12 col-xl-12">
              <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                <div class="card-header align-items-center  border-bottom-dark px-0">
                  <div class="card-title mb-0">
                    <h3 class="card-label mb-0 font-weight-bold text-body">Produk
                    </h3>
                  </div>
                  <div class="icons d-flex">
                    <a href="add-product.html" class="ml-2">
                      <span class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">
                        <svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-plus white" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                          </svg>
                      </span>
                    </a>
                    <a href="#" onclick="printDiv()" class="ml-2">
                      <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"></path>
                          <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"></path>
                          <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                          </svg>
                      </span>
                    </a>
                    <a href="#" class="ml-2">
                      <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-file-earmark-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"></path>
                          </svg>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="row">
            <div class="col-12 ">
              <div class="card card-custom gutter-b bg-white border-0">
                <div class="card-body">
                  <div>
                    <div class="table-responsive" id="printableTable" style="overflow-x: hidden;">
                      <div id="productTable_wrapper">
                        <div class="row">
                          <div class="dataTables_filter col-md-3">
                            <input type="search" class="form-control" placeholder="Cari Artikel" aria-controls="orderTable">
                          </div>
                        </div>
                        {{-- KALAU MAU PAKE DATATABLE TAMBAHKAN id="productTable" pada table --}}
                        <table class="display dataTable no-footer" role="grid" aria-describedby="productTable_info">
                          <thead class="text-body">
                            <tr role="row">
                              <th class="sorting_asc" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 30px">No.</th>
                              <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 210.047px;">Artikel</th>
                              <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 143.891px;">Detail</th>
                              <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 125.656px;">Foto</th>
                              <th class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 77px;"></th>
                            </tr>
                          </thead>
                          <tbody class="kt-table-tbody text-dark">
                            @forelse($dataProduk as $key=>$produk)
                            <tr class="kt-table-row kt-table-row-level-0 odd" role="row">
                              <td class="sorting_1">{{ $dataProduk->firstItem()+$key }}</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <a href="{{ url('/produk/detail/'.base64_encode($produk->ID)) }}"><span>{{ $produk->wip_kode.' '.$produk->wip_warna }}</span></a>
                                </div>
                              </td>
                              <td>{{ $produk->jenis.' / '.$produk->tipe_produk.' / '.$produk->nama_group }}</td>
                              <td>
                                @if($produk->foto_produk == '')
                                  <img src="{{ asset('gambar-umum/no-image.jpg') }}" alt="Produk" width="50px">
                                @else
                                  <img src="{{ $baseUrlImage.$produk->foto_produk }}" alt="Produk" width="50px">
                                @endif
                              </td>
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
                                    <a class="dropdown-item" href="{{ url('/produk/detail/'.base64_encode($produk->ID)) }}"> <i class="fa fa-edit text-info"></i> Edit</a>
                                    <a class="dropdown-item confirm-delete" title="Delete" href="#"> <i class="fa fa-trash text-danger"></i> Hapus</a>
                                  </div>
                                  </div>
                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="5">Data tidak ditemukan.</td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>

                        <div class="dataTables_paginate paging_simple_numbers mt-5" id="orderTable_paginate">
                          {{ $dataProduk->links('pagination::bootstrap-5') }}
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
@endpush