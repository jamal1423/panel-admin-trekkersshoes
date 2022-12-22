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

  <link href="{{ asset('panel/assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('panel/assets/api/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
  
@endpush

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0 px-0 py-2">
          <li class="breadcrumb-item active" aria-current="page">Member Trekkers</li>
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
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 150.656px;">Tgl.Daftar</th>
                            <th class="sorting" tabindex="0" aria-controls="productTable" rowspan="1" colspan="1" style="width: 50.656px;"></th>
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          @foreach($dataMember as $key=>$member)
                          <tr class="kt-table-row kt-table-row-level-0 odd" role="row">
                            <td class="sorting_1">{{ $loop->iteration }}</td>
                            <td>
                              <div class="d-flex align-items-center">
                                <span>{{ $member->nama_depan.' '.$member->nama_belakang }}</span>
                              </div>
                            </td>
                            <td id="group-member-id-{{ $key + 1 }}">{{ strtoupper($member->jns_member) }}</td>
                            <td>{{ $member->username }}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($member->tgl_daftar)) }}</td>
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
                                  <a class="dropdown-item" id="member-edit-{{ base64_encode($member->id_member) }}" onclick="memberEdit(this)" data-id="{{ base64_encode($member->id_member) }}" href="#">Edit</a>
                                  {{-- <a class="dropdown-item" onclick="edit('{{ $member->id_member }}','{{ $member->nama_depan }}','{{ $member->nama_belakang }}','{{ $member->username }}','{{ $member->no_tlp }}','{{ $member->alamat }}','{{ $member->poin }}','{{ $member->wallet }}','{{ $key + 1 }}')" href="#" data-toggle="modal">Edit</a> --}}
                                  <a class="dropdown-item confirm-delete" title="Delete" href="#">Hapus</a>
                                </div>
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

<!--Edit form Modal -->
<div class="modal fade text-left" id="modalFormEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Edit Member </h4>
        <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
          <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
          </svg>
        </button>
      </div>
      <div class="modal-body">
        <form id="myform" action="{{ url('/member-trekkers/edit') }}" method="post">
          @csrf
          @method('patch')
          <div class="form-group">
            <label>Nama Depan</label>
            <input type="hidden" name="idEdit" class="form-control @error('idEdit') is-invalid  @enderror" value="{{ old('idEdit') }}" id="idEdit" readonly>
            <input type="text" name="nama_depan" class="form-control @error('nama_depan') is-invalid  @enderror" value="{{ old('nama_depan') }}" id="nama_depan_edit" readonly>
            @error('nama_depan')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Nama Belakang</label>
            <input type="text" name="nama_belakang" class="form-control @error('nama_belakang') is-invalid @enderror" id="nama_belakang_edit" value="{{ old('nama_belakang') }}" readonly>
            @error('nama_belakang')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username_edit" value="{{ old('username') }}" readonly>
            @error('username')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>No. Tlp</label>
            <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp_edit" value="{{ old('no_telp') }}" readonly>
            @error('no_telp')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat_edit" rows="3" readonly>{{ old('alamat') }}</textarea>
            @error('alamat')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Poin</label>
            <input type="number" name="poin" class="form-control @error('poin') is-invalid @enderror" id="poin_edit" value="{{ old('poin') }}">
            @error('poin')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Saldo</label>
            <input type="number" name="wallet" class="form-control @error('wallet') is-invalid @enderror" id="wallet_edit" value="{{ old('wallet') }}">
            @error('wallet')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Group Member</label>
            <select class="js-example-basic-multiple js-states form-control select2" name="jns_member[]" id="jns_member_edit" multiple="multiple">
              {{-- <option selected>Data1</option>
              <option selected>Data2</option>
              <option selected>Data3</option>
              <option>Data4</option> --}}
              {{-- @foreach($masterPelanggan as $pelanggan)
                <option value="{{ $pelanggan->jns_pelanggan }}">{{ $pelanggan->jns_pelanggan }}</option>
              @endforeach --}}
            </select>
            @error('jns_member')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary"> <i class="fa fa-upload"></i> Update Data</button>
        </form>
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

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="{{ asset('panel/assets/js/sweetalert.js') }}"></script>
<script src="{{ asset('panel/assets/js/sweetalert1.js') }}"></script>
<script src="{{ asset('panel/assets/api/select2/select2.min.js') }}"></script>

@if(Session::has('member-edit'))
<script>
  $(document).ready(function() {
    Swal.fire({ 
        title: "Sukses!", 
        text: "Data berhasil diubah!",
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

  function memberEdit(element) {
    var id = $(element).attr('data-id');
    $.ajax({
      url: "/get-data-member/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        let {
          dataMember,
          masterPelanggan
        } = data

        $('#idEdit').val(dataMember.id_member);
        $('#nama_depan_edit').val(dataMember.nama_depan);
        $('#nama_belakang_edit').val(dataMember.nama_belakang);
        $('#username_edit').val(dataMember.username);
        $('#no_telp_edit').val(dataMember.no_tlp);
        $('#alamat_edit').val(dataMember.alamat);
        $('#poin_edit').val(dataMember.poin);
        $('#wallet_edit').val(dataMember.wallet);

        a = dataMember.jns_member;
        b = a.split(",")
        
        var selectElement = $('#jns_member_edit');
        selectElement.empty();
        for (master of masterPelanggan) {
          selectElement.append(`
            <option value="${master.jns_pelanggan}">${master.jns_pelanggan}</option>
          `)
          for(member of b){
            if (master.jns_pelanggan == member) {
              $("#jns_member_edit option[value='" + master.jns_pelanggan + "']").attr("selected", "selected");
            }
          }
        }
        $('#modalFormEdit').modal('show');
      }
    });
  }

  // function edit(id_member,nama_depan,nama_belakang,username,no_tlp,alamat,poin,wallet,jns_member) {
  //   $('#idEdit').val(id_member);
  //   $('#nama_depan_edit').val(nama_depan);
  //   $('#nama_belakang_edit').val(nama_belakang);
  //   $('#username_edit').val(username);
  //   $('#no_telp_edit').val(no_tlp);
  //   $('#alamat_edit').val(alamat);
  //   $('#poin_edit').val(poin);
  //   $('#wallet_edit').val(wallet);
    
  //   a = $('#group-member-id-'+jns_member).text()
  //   b = a.split(",")
  //   console.log(b)

  //   var select = $('#jns_member_edit');

  //   var items = [];
  //   for (var i = 0; i < b.length; i++) {
  //     items.push({
  //       "id": i,
  //       "text": b[i]
  //     });
  //     select.append("<option selected value=\"" + b[i] + "\">" + b[i] + "</option>");
  //   }

  //   select.data = items;
  //   $('#modalFormEdit').modal('show');
  // }
</script>
@endpush