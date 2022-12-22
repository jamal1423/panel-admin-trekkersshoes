@extends('panel.layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Member Trekkers Verifikasi</li>
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
                            <th class="sorting_asc" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 30.3906px;">No.</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 150.047px;">Nama</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 70.656px;">Member</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 100.656px;">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 120px;">Tgl.Daftar</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 80px;"></th>
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          @foreach($dataMemberVerifikasi as $member)
                          <tr class="kt-table-row kt-table-row-level-0 odd" role="row">
                            <td class="sorting_1">{{ $loop->iteration }}</td>
                            <td>
                              <div class="d-flex align-items-center">
                                <span>{{ $member->nama_depan.' '.$member->nama_belakang }}</span>
                              </div>
                            </td>
                            <td>{{ strtoupper($member->jns_member) }}</td>
                            <td>{{ $member->username }}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($member->tgl_daftar)) }}</td>
                            <td>
                              <div class="card-toolbar text-right">
                                <a href="#" id="member-approve-{{ base64_encode($member->id_member) }}" onclick="memberApprove(this)" data-id="{{ base64_encode($member->id_member) }}"><span class="badge badge-success"><i class="fa fa-check"></i> Approve</span></a>
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

{{-- MODAL VERIFIKASI --}}
<div class="modal fade text-left" id="modalVerifikasi" tabindex="-1" role="dialog" aria-labelledby="modalVerifikasi" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title white">Verifikasi Member</h5>
        <button type="button" class="white close rounded-pill btn btn-sm btn-icon btn-danger  m-0" data-dismiss="modal" aria-label="Close">
        <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
        </svg>	
        </button>
      </div>
      <form action="{{ url('/member-approve-verifikasi') }}" method="post">
        @csrf
        @method('patch')
        <div class="modal-body">
          Yakin akan memverifikasi member <label class="font-weight-bold" id="label-approve"></label>?
          <input type="hidden" id="idMember" name="id_member">
          <input type="hidden" id="username" name="username">
          <input type="hidden" id="nmPelanggan" name="nama_pelanggan">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">
            <span class="">Batal</span>
          </button>
          <button type="submit" class="btn btn-info ml-1">
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

@if(Session::has('member-verifikasi'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Member telah diverifikasi!",
        type: "success",
        timer: 25000,  
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    })  
  });
</script>
@endif
@if(Session::has('member-error'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Error!", 
        text: "Error, Silahkan ulangi proses!",
        type: "error", 
        timer: 25000,  
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
  });
</script>
@endif

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


  function memberApprove(element) {
    var id = $(element).attr('data-id');
    $.ajax({
      url: "/get-data-member-verifikasi/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        let {
          dataMember
        } = data

        $('#idMember').val(dataMember.id_member);
        $('#username').val(dataMember.username);
        $('#nmPelanggan').val(dataMember.nama_depan+' '+dataMember.nama_belakang);
        $('#label-approve').text(dataMember.username);
        $('#modalVerifikasi').modal('show');
      }
    });
  }
</script>
@endpush