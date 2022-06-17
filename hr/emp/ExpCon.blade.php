	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">

          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                      <th>Name</th>
                      <th class="bg-dark text-light">Contract Status</th>
                      <th class="bg-dark text-light">Contract End</th>
                      <th>Satff Code</th>
                      <th>Role</th>
                      <th>Gender</th>
                      <th>Supervisor</th>
                      <th>Dept</th>
                      <th>Extend Contract</th>

                      <th class="bg-dark text-light"> Actions</th>

                  </tr>
              </thead>
              <tbody>
                  @isset($Employees)
                  @foreach ($Employees as $data )
                  <tr>
                      <td>{{$data->StaffName}}</td>

                      <td class="bg-danger text-light"> {{$data->RecordStatus}} </td>
                      <td>{!! date('F j, Y', strtotime($data->ContractExpiry)) !!}
                    </td>
                      <td>{{$data->StaffCode}}</td>
                      <td>{{$data->Designation}}</td>
                      <td>{{$data->Gender}}</td>
                      <td>{{$data->ReportsTo}}</td>
                      <td>{{$data->Department}}</td>
                      <td><a data-bs-toggle="modal"  class="btn btn-danger btn-sm" href="#Extend{{ $data->id }}">Extend </a></td>


                      <td class="row fs-6">
                          <div class="col-md-6">
                              <div class="dropdown">
                                  <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                   HR Actions
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                    <li><a data-bs-toggle="modal"  class="dropdown-item " href="#PersonalDetails{{$data->id}}">Personal Details</a></li>

                                    <li><a data-bs-toggle="modal"  class="dropdown-item " href="#BankDetails{{$data->id}}">Bank Details</a></li>







                                  </ul>
                                </div>


                          </div>
                      </td>

                  </tr>
                  @endforeach
                  @endisset



              </tbody>
          </table>
      </div>
      <!--end::Card body-->

      @include('emp.Extend')
      @include('emp.NewEmp')
      @include('emp.BankDetails')
      @include('emp.PersonalDetails')
