<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {{ HeaderBtn($Toggle="Approved", $Class="btn-danger", $Label="All Approved Requests", $Icon="fa-check")}}

    {{ HeaderBtn($Toggle="Declined", $Class="btn-dark", $Label="All Declined Requests", $Icon="fa-times")}}

</div>


<div class="text-inverse-dark fs-6 bg-dark py-5 pb-5 ps-4 mb-5">
    <span class="p3-3 me-3"> Human Resource Leave Dashboard
  </div><!--begin::Card body--><!--begin::Card body-->


  <div class="alert bg-primary">
    <h3 class="h3 text-light">

       Leave requests pending  supervisor approval

    </h3>
</div>


    <div class="card-body pt-3 bg-light shadow-lg table-responsive">


          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                      <th>Leave</th>
                      <th>Staff Name</th>
                      <th>Leave Days</th>
                      <th>Days requested</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Spent Days</th>
                      <th>Unused Days</th>
                      <th class="bg-danger text-light">Approval</th>
                      <th class="bg-dark text-light">Validity</th>
                      <th>Actions</th>


                  </tr>
              </thead>
              <tbody>
                  @isset($Apps)
                  @foreach ($Apps as $data )
                  <tr>

                      <td>{{$data->LeaveCategory}}</td>
                      <td>{{$data->StaffName}}</td>
                      <td>{{$data->AssignedDays}}</td>
                      <td>{{$data->DaysAppliedFor}}</td>
                      <td>{{ date('j F, Y', strtotime($data->StartDate))}}</td>
                      <td>{{ date('j F, Y', strtotime($data->EndDate))}}</td>
                      <td>{{$data->SpentDays}}</td>
                      <td>{{$data->UnusedDays}}</td>
                      <td class="bg-danger text-light">{{$data->ApprovalStatus}}</td>
                      <td class="bg-dark text-light">{{$data->ValidityStatus}}</td>



                 <td class="row fs-6">
                    <div class="col-md-12">
                        <div class="dropdown">
                            <button class="btn btn-sm  btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                             More
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">


                              <li><a data-bs-toggle="modal"  class="dropdown-item " href="#AppLetter{{$data->id}}">Leave Letter </a></li>









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
@include('leave.Approve')
@include('leave.Approved')

@include('leave.AppLetter')
@include('leave.AppComments')

@include('leave.Declined')
@include('leave.Decline')

