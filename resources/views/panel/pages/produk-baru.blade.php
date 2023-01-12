@extends('panel.layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Produk Baru</li>
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
            <div class="col-12 ">
              <div class="card card-custom gutter-b bg-white border-0">
                <div class="card-body">
                  <div>
                    <div class=" table-responsive" id="printableTable">
                      <div id="productTable_wrapper" class="dataTables_wrapper no-footer">
                        <div id="productTable_filter" class="dataTables_filter">
                          <form action="{{ url('/produk-baru-cari') }}" method="post">
                            @method('post')
                            @csrf
                            <label>
                              Cari:
                              <input type="search" name="artikel" value="{{ old('artikel') }}" class="" placeholder="" aria-controls="productTable">
                            </label>
                          </form>
                        </div>
                        <table class="display dataTable no-footer" role="grid" aria-describedby="productTable_info">
                        <thead class="text-body">
                          <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 30px;">No.</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 210.047px;">Artikel</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 143.891px;">Detail</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 125.656px;">Foto</th>
                            <th class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 77px;"></th>
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          @if($singleProduk == "yes")
                            @forelse($dataProdukBaru as $produk)
                            <tr class="kt-table-row kt-table-row-level-0 odd" role="row">
                              <td class="sorting_1">{{ $loop->iteration }}</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <a href="{{ url('/produk/detail/'.base64_encode($produk->ID)) }}"><span>{{ $produk->wip_kode.' '.$produk->wip_warna }}</span></a>
                                </div>
                              </td>
                              <td>{{ $produk->wip_jenis_barang.' / '.$produk->tipe_produk.' / '.$produk->nama_group }}</td>
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
                          @else
                            @forelse($dataProdukBaru as $key=>$produk)
                            <tr class="kt-table-row kt-table-row-level-0 odd" role="row">
                              <td class="sorting_1">{{ $loop->iteration }}</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <span>{{ $produk->wip_kode.' '.$produk->wip_warna }}</span>
                                </div>
                              </td>
                              <td>{{ $produk->wip_jenis_barang.' / '.$produk->tipe_produk.' / '.$produk->nama_group }}</td>
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
                                    <a class="dropdown-item" href="add-product.html">Edit</a>
                                    <a class="dropdown-item confirm-delete" title="Delete" href="#">Hapus</a>
                                  </div>
                                  </div>
                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="5">Data tidak ditemukan.</td>
                            </tr>
                            @endforelse
                          @endif
                        </tbody>
                      </table>
                      @if($singleProduk == "no")
                        <div class="dataTables_paginate paging_simple_numbers mt-5" id="orderTable_paginate">
                          {{ $dataProdukBaru->links('pagination::bootstrap-5') }}
                        </div>
                      @endif
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