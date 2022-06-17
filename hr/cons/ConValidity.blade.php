	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">

        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Name</th>
                    <th class="bg-dark text-light">Contract Status</th>
                    <th class="bg-dark text-light">Contract End</th>
                    <th class="bg-dark text-light">Months To Expiry</th>

                    <th>Expertise</th>
                    <th>Service Rendered</th>
                    <th>Gender</th>
                    <th>Reports To</th>
                    <th>Department</th>



                </tr>
            </thead>
            <tbody>
                @isset($Employees)
                @foreach ($Employees as $data )
                <tr>
                    <td>{{$data->Contractor}}</td>

                    <td class="bg-danger text-light"> {{$data->RecordStatus}} </td>
                    <td>{!! date('F j, Y', strtotime($data->ContractExpiry)) !!}
                  </td>
                    <td class="bg-dark text-light">{{$data->MonthsToExpiry}}

                            Month(s)

                    </td>
                    <td>{{$data->Expertise}}</td>
                    <td>{{$data->ServiceRendered}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{{$data->ReportsTo}}</td>
                    <td>{{$data->Department}}</td>




                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>
