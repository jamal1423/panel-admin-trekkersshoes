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
            @foreach($dataJenisMember as $jenisMember)
            <div class="col-lg-6 col-xl-3">
              <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-primary">
                <div class="card-body">
                  <h3 class="text-body font-weight-bold"> <i class="fas fa-user-friends"></i> </h3>
                  <div class="mt-3">
                    <div class="d-flex align-items-center">
                      <span class="text-dark font-weight-bold font-size-h1 mr-3">
                        <span class="counter" data-target="400">0</span>
                      </span>
                    </div>
                    <div class="text-black-50 mt-3">{{ $jenisMember->jns_member }}</div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            {{-- <div class="col-lg-6 col-xl-3">
              <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle theme-circle-secondary">
                <div class="card-body">
                  <h3 class="text-body font-weight-bold"><i class="fas fa-user-friends"></i></h3>
                  <div class="mt-3">
                    <div class="d-flex align-items-center">
                      <span class="text-dark font-weight-bold font-size-h1 mr-3">
                        <span class="counter" data-target="600">0</span>
                      </span>
                    </div>
                    <div class="text-black-50 mt-3">PEMKA</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-3">
              <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-success">
                <div class="card-body">
                  <h3 class="text-body font-weight-bold"><i class="fas fa-user-friends"></i></h3>
                  <div class="mt-3">
                    <div class="d-flex align-items-center">
                      <span class="text-dark font-weight-bold font-size-h1 mr-3">
                        <span class="counter" data-target="1000">0</span>
                      </span>
                    </div>
                    <div class="text-black-50 mt-3">END-USER</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-3">
              <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-info">
                <div class="card-body">
                  <h3 class="text-body font-weight-bold"><i class="fas fa-user-friends"></i></h3>
                  <div class="mt-3">
                    <div class="d-flex align-items-center">
                      <span class="text-dark font-weight-bold font-size-h1 mr-3">
                        <span class="counter" data-target="6800">0</span>
                      </span>
                    </div>
                    <div class="text-black-50 mt-3">UBAYA</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-3">
              <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-info">
                <div class="card-body">
                  <h3 class="text-body font-weight-bold"><i class="fas fa-user-friends"></i></h3>
                  <div class="mt-3">
                    <div class="d-flex align-items-center">
                      <span class="text-dark font-weight-bold font-size-h1 mr-3">
                        <span class="counter" data-target="6800">0</span>
                      </span>
                    </div>
                    <div class="text-black-50 mt-3">UKM</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-3">
              <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-info">
                <div class="card-body">
                  <h3 class="text-body font-weight-bold"><i class="fas fa-user-friends"></i></h3>
                  <div class="mt-3">
                    <div class="d-flex align-items-center">
                      <span class="text-dark font-weight-bold font-size-h1 mr-3">
                        <span class="counter" data-target="6800">0</span>
                      </span>
                    </div>
                    <div class="text-black-50 mt-3">FORKAS</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-3">
              <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-info">
                <div class="card-body">
                  <h3 class="text-body font-weight-bold"><i class="fas fa-user-friends"></i></h3>
                  <div class="mt-3">
                    <div class="d-flex align-items-center">
                      <span class="text-dark font-weight-bold font-size-h1 mr-3">$
                        <span class="counter" data-target="6800">0</span>
                      </span>
                    </div>
                    <div class="text-black-50 mt-3">HAIRSTAR</div>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
          
          <div class="row">
            <div class="col-lg-12 col-xl-12">
              <div class="card card-custom gutter-b bg-white border-0" >
                <div class="card-header align-items-center  border-0">
                  <div class="card-title mb-0">
                    <h3 class="card-label mb-0 font-weight-bold text-body">New Orders
                    </h3>
                  </div>
                  <div class="card-toolbar">
                    <button class="btn p-0" type="button" id="dropdownMenuButton3"
                      data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <span class="svg-icon">
                        <svg width="20px" height="20px" viewBox="0 0 16 16"
                          class="bi bi-three-dots text-body" fill="currentColor"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                            d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                        </svg>
                      </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right"
                      aria-labelledby="dropdownMenuButton3">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <div class="card-body" >
                  <div >
                    <div class="kt-table-content table-responsive">
                      <table id="myTable" class="table ">
                        
                        <thead class="kt-table-thead text-body">
                          <tr>
                            <th class="kt-table-cell">Order ID</th>
                            <th class="kt-table-cell">Customer Name</th>
                            <th class="kt-table-cell">Amount</th>
                            <th class="kt-table-cell">
                              <div class="text-right">Status</div>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="kt-table-tbody text-dark">
                          <tr class="kt-table-row kt-table-row-level-0">
                            <td class="kt-table-cell">#12425</td>
                            <td class="kt-table-cell">
                              <div class="d-flex align-items-center">
                                <span
                                  class="ml-2">Clayton Bates</span></div>
                            </td>
                            
                            <td class="kt-table-cell">$137.00</td>
                            <td class="kt-table-cell">
                              <div class="text-right"><span
                                  class="mr-0 text-success">Approved</span>
                              </div>
                            </td>
                          </tr>
                          <tr class="kt-table-row kt-table-row-level-0">
                            <td class="kt-table-cell">#12425</td>
                            <td class="kt-table-cell">
                              <div class="d-flex align-items-center"><span
                                  class="ml-2">Gabriel Frazier</span>
                              </div>
                            </td>
                            <td class="kt-table-cell">$322.00</td>
                            <td class="kt-table-cell">
                              <div class="text-right"><span
                                  class="mr-0 text-success">Approved</span>
                              </div>
                            </td>
                          </tr>
                          
                          <tr class="kt-table-row kt-table-row-level-0">
                            <td class="kt-table-cell">#12425</td>
                            <td class="kt-table-cell">
                              <div class="d-flex align-items-center"><span
                                  class="ml-2">Troy Alexander</span></div>
                            </td>
                            <td class="kt-table-cell">$241.00</td>
                            <td class="kt-table-cell">
                              <div class="text-right"><span
                                  class="mr-0 text-success">Approved</span>
                              </div>
                            </td>
                          </tr>
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