	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewEmp", $Class="btn-danger", $Label="New Staff", $Icon="fa-plus")}}

          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                      <th>Name</th>
                      <th>Contract End</th>
                      <th>Code</th>
                      <th>Role</th>
                      <th>Gender</th>
                      <th>Supervisor</th>
                      <th>Dept</th>
                      <th>Edit</th>
                      <th>Trash</th>
                      <th class="bg-dark text-light"> Actions</th>

                  </tr>
              </thead>
              <tbody>
                  @isset($Employees)
                  @foreach ($Employees as $data )
                  <tr>
                      <td>{{$data->StaffName}}</td>
                      <td>{{ date('j, M, Y', strtotime($data->ContractExpiry)) }}
                    </td>
                      <td>{{$data->StaffCode}}</td>
                      <td>{{$data->Designation}}</td>
                      <td>{{$data->Gender}}</td>
                      <td>{{$data->ReportsTo}}</td>
                      <td>{{$data->Department}}</td>
                      <td>

                        <a href="#Update{{ $data->id }}" data-bs-toggle="modal"  class="btn shadow-lg btn-danger  btn-sm" >

                            <i class="fas fa-edit" aria-hidden="true"></i>

                        </a>

                  </td>
                      <td>

                            <a href="#" data-route="{{ route('DelEmp', ['id'=>$data->id]) }}" data-msg="You want to delete this staff member's records"   class="btn shadow-lg btn-danger deleteConfirm btn-sm">

                                <i class="fas fa-trash" aria-hidden="true"></i>

                            </a>

                      </td>

                      <td class="row fs-6">
                          <div class="col-md-6">
                              <div class="dropdown">
                                  <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                   HR Actions
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a data-route="{{ route('TerminateContract', ['id'=>$data->id]) }}" data-msg="You sure you want to end this staff member's contract"  class="dropdown-item deleteConfirm" href="#">End Contract</a></li>

                                    <li><a data-bs-toggle="modal"  class="dropdown-item " href="#PersonalDetails{{$data->id}}">Personal Details</a></li>

                                    <li><a data-bs-toggle="modal"  class="dropdown-item " href="#BankDetails{{$data->id}}">Bank Details</a></li>

                                    <li><a data-bs-toggle="modal"  class="dropdown-item " href="#Extend{{ $data->id }}">Extend contract</a></li>







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

      @include('emp.update')
      @include('emp.NewEmp')
      @include('emp.BankDetails')
      @include('emp.PersonalDetails')
      @include('emp.Extend')
