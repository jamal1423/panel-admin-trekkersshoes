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
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1">SJT</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1">Tgl.order/Tgl.Kembali</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1">Pemesan</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1">Status</th>
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          @foreach($transaksiStockistSelesai as $transaksi)
                          <tr class="kt-table-row kt-table-row-level-0 odd" role="row">
                            <td class="sorting_1">{{ $loop->iteration }}</td>
                            <td>
                              <a href="/manifest-selesai/detail/{{ base64_encode($transaksi->id_order) }}/{{ base64_encode($transaksi->status_approval) }}/{{ base64_encode($transaksi->status) }}">
                                <div class="d-flex align-items-center">
                                  <span>{{ $transaksi->id_order }}</span>
                                </div>
                              </a>
                            </td>
                            <td>
                              @foreach($nomerSJT as $sjt)
                                @if($transaksi->id_order == $sjt->id_order)
                                <span class="badge badge-pill badge-primary mt-2">{{ $sjt->wip_sjt_nomer }}</span>
                                @endif
                              @endforeach
                            </td>
                            <td>
                            <?php
															if($transaksi->tgl_kembali == "0000-00-00 00:00:00")
															{
																$transaksi->tgl_kembali = date('Y-m-d H:i:s', strtotime('+7 day', strtotime($transaksi->tgl_order)));
																echo "<span class='badge badge-pill badge-success'>".date_format(date_create($transaksi->tgl_order),"d-m-Y H:i:s")."</span><br>";
																echo "<span class='badge badge-pill badge-danger'>".date_format(date_create($transaksi->tgl_kembali),"d-m-Y H:i:s")."</span>";
															}
															else
															{
																echo "<span class='badge badge-pill badge-success'>".date_format(date_create($transaksi->tgl_order),"d-m-Y H:i:s")."</span><br>";
																echo "<span class='badge badge-pill badge-danger'>".date_format(date_create($transaksi->tgl_kembali),"d-m-Y H:i:s")."</span>";
															}
														?>
                            </td>
                            
                            <td>{{ ucwords($transaksi->nama_depan.' '.$transaksi->nama_belakang) }}</td>
                            <td>
                              @if($transaksi->status == 'Verifikasi Manifest')
                              <span class="badge badge-pill badge-danger">{{ $transaksi->status }}</span>
                              @elseif($transaksi->status == 'Proses')
                              <span class="badge badge-pill badge-info">{{ $transaksi->status }}</span>
                              @elseif($transaksi->status == 'Verifikasi Nota')
                              <span class="badge badge-pill badge-warning">{{ $transaksi->status }}</span>
                              @else
                              <span class="badge badge-pill badge-success">{{ $transaksi->status }}</span>
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