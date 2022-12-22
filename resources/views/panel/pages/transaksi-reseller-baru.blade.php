@extends('panel.layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
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
                        <table id="productTable" class="display dataTable no-footer" role="grid" aria-describedby="productTable_info">
                        <thead class="text-body">
                          <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" aria-sort="ascending">No.</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1">Invoice</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1">Tgl. order</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1">Member</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1">Pemesan</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1">Status</th>
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          @foreach($dataTransaksiBaru as $transaksi)
                          <tr class="kt-table-row kt-table-row-level-0 odd" role="row">
                            <td class="sorting_1">{{ $loop->iteration }}</td>
                            <td>
                              <a href="/transaksi-baru/detail/{{ base64_encode($transaksi->id_order) }}">
                                <div class="d-flex align-items-center">
                                  <span>{{ $transaksi->id_order }}</span>
                                </div>
                              </a>
                            </td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($transaksi->tgl_order)) }}</td>
                            <td>{{ $transaksi->jns_member }}</td>
                            <td>{{ ucwords($transaksi->nama_depan.' '.$transaksi->nama_belakang) }}</td>
                            <td>
                              @if($transaksi->status == 'Menunggu Pembayaran')
                              <span class="badge badge-pill badge-danger">{{ $transaksi->status }}</span>
                              @elseif($transaksi->status == 'Menunggu Verifikasi')
                              <span class="badge badge-pill badge-warning">{{ $transaksi->status }}</span>
                              @else
                              <span class="badge badge-pill badge-info">{{ $transaksi->status }}</span>
                              @endif
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
@endpush