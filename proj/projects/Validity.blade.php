<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!!Alert($icon = "fa-info", $class = "alert-primary", $Title = "Project validity", $Msg = "view project validity
    details ")!!}

</div>

<div class="row">
    <div class="card-body shadow-lg pt-3 bg-light table-responsive">

    <div class="col-md-12">

        <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                    <th class="bg-dark text-light">Project</th>
                    <th class="bg-dark text-light">Start Date</th>
                    <th class="bg-dark text-light">Project Expiry</th>
                    <th class="bg-dark text-light">Status</th>
                    <th class="bg-dark text-light">Validity in Months</th>




                </tr>
            </thead>
            <tbody>
                @isset($Projects)
                @foreach ($Projects as $data )
                <tr>

                    <td class="bg-dark text-light">{{$data->ProjectName}}</td>
                    <td>{{ date('j F, Y', strtotime($data->StartDate)) }} </td>
                    <td>{{ date('j F, Y', strtotime($data->ProjectExpiry)) }} </td>
                    <td class="bg-danger text-light">{{$data->status}}</td>
                    <td class="bg-danger text-light">{{$data->ValidityMonths}} Months</td>

                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>
</div>

</div>
