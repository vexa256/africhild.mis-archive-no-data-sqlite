	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewEmp", $Class="btn-danger", $Label="New Contractor", $Icon="fa-plus")}}

          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                      <th>Contractor</th>
                      <th>Contact Person</th>
                      <th>Expertise</th>
                      <th>Service Rendered</th>
                      <th>Category</th>
                      <th>Reports To</th>
                      <th>Department</th>
                      <th>Delete</th>
                      <th class="bg-dark text-light"> Actions</th>

                  </tr>
              </thead>
              <tbody>
                  @isset($Employees)
                  @foreach ($Employees as $data )
                  <tr>
                      <td>{{$data->Contractor}}</td>
                      <td>{{$data->ContactPerson}}</td>

                      <td>{{$data->Expertise}}</td>
                      <td>{{$data->ServiceRendered}}</td>
                      <td>{{$data->Category}}</td>
                      <td>{{$data->ReportsTo}}</td>
                      <td>{{$data->Department}}</td>
                      <td>

                            <a href="#" data-route="{{ route('DelCon', ['id'=>$data->id]) }}" data-msg="You want to delete this contractor's records"   class="btn shadow-lg btn-danger deleteConfirm btn-sm">

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
                                    <li><a data-route="{{ route('ConContractTerm', ['id'=>$data->id]) }}" data-msg="You sure you want to end this contractor's contract"  class="dropdown-item deleteConfirm" href="#">End Contract</a></li>

                                    <li><a data-bs-toggle="modal"  class="dropdown-item " href="#PersonalDetails{{$data->id}}">Personal Details</a></li>

                                    <li><a data-bs-toggle="modal"  class="dropdown-item " href="#BankDetails{{$data->id}}">Bank Details</a></li>


                                    <li><a data-bs-toggle="modal"  class="dropdown-item " href="#ViewDesc{{$data->id}}">More Details</a></li>







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

      @include('cons.NewCon')
      @include('cons.Bank')
      @include('cons.Personal')



    {{DescModal($Employees, $Title="View  more details/description  attached to selected contractor's records", $ModalID="ViewDesc")}}
