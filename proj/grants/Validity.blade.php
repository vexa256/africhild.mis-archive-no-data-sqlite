<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!!Alert($icon = "fa-info", $class = "alert-primary", $Title = "View grant validity  details", $Msg = "Grant validity report")!!}

</div>



<div class="card-body shadow-lg pt-3 bg-light table-responsive">


    <div class="col-md-12">

        <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                    <th class="bg-dark text-light">Grant</th>
                    <th class="bg-danger text-light">End Date</th>
                    <th style="background-color: #ff8f00 !important " class="fw-bolder text-dark">Validity in Months</th>
                    <th style="background-color: #ff8f00 !important " class="fw-bolder text-dark">Validity Status</th>




                </tr>
            </thead>
            <tbody>
                @isset($Grants)
                @foreach ($Grants as $data )
                  <tr>

                    <td class="bg-dark text-light">{{$data->GrantName}}</td>
                    <td>{{ date('j F, Y', strtotime($data->GrantExpiry)) }}
                    </td>
                    <td style="background-color: #ff8f00 !important " class="fw-bolder text-dark">{{$data->ValidityMonths}} Months</td>
                    <td style="background-color: #ff8f00 !important " class="fw-bolder text-dark">{{$data->status}} </td>

                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>
</div>
