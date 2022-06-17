<div class="row">
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {!!Alert($icon = "fa-info", $class = "alert-primary", $Title = "Donor contribution analysis", $Msg = "refer to the tabular data for more details" )!!}

        </div>
    <div class="col-md-6 card-body shadow-lg pt-3 bg-light table-responsive">

        {!! $chart->container() !!}

    </div>

    <div class="card-body   bg-light table-responsive">


        <div class="col-md-12">

            <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                        <th class="bg-dark text-light">Name</th>
                        <th class="bg-danger text-light">Contributed Amount (UGX)</th>
                        <th class="bg-danger text-light">Record Date</th>




                    </tr>
                </thead>
                <tbody>
                    @isset($DonorsData)
                    @foreach ($DonorsData as $data )
                      <tr>

                        <td class="bg-dark text-light">{{$data->Name}}</td>

                        <td class="bg-dark text-light">{{number_format($data->AmountInUgx, 2)}} UGX</td>

                        <td>{{ date('j F, Y', strtotime($data->date_a)) }}
                        </td>


                    </tr>
                    @endforeach
                    @endisset



                </tbody>
            </table>
        </div>
    </div>


</div>
