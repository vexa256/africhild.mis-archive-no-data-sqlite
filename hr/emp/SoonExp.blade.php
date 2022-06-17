	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">

        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Name</th>
                    <th class="bg-dark text-light">Contract Status</th>
                    <th class="bg-dark text-light">Contract End</th>
                    <th class="bg-dark text-light">Months To Expiry</th>

                    <th>Role</th>
                    <th>Gender</th>
                    <th>Supervisor</th>
                    <th>Dept</th>
                    <th>Extend validity</th>



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
                    <td class="bg-dark text-light">{{$data->MonthsToExpiry}}

                            Month(s)

                    </td>
                    <td>{{$data->Designation}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->ReportsTo}}</td>
                    <td>{{$data->Department}}</td>
                    <td><a data-bs-toggle="modal"  class="btn btn-danger btn-sm" href="#Extend{{ $data->id }}">Extend </a></td>




                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>

    @include('emp.Extend')
