<div class="">

    <div class="row">

        <div class="col-md-12">
            <div class="">
                <table class="table table-rounded table-bordered  border gy-3 gs-3">
                    <thead>
                        <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                            <th class="bg-danger text-light">Grant</th>
                            <th class="bg-dark text-light">Grant Amount </th>
                            <th class="bg-dark text-light">Actual Amount Spent</th>
                            <th class="bg-dark text-light">Variance</th>
                            <th class="bg-danger text-light">Burn Rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-danger text-light">{{ $G->GrantName }}</td>
                            <td class="bg-dark text-light">{{ number_format($Budget, 2) }} UGX</td>
                            <td class="bg-dark text-light">{{ number_format($Actual, 2) }} UGX</td>
                            <td class="bg-dark text-light">{{ number_format($Variance, 2) }} UGX</td>
                            <td class="bg-danger text-light">

                                {{ number_format(($Actual/$Budget)*100, 2) }} %

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        <div class="col-md-6 card-body shadow-lg pt-3 bg-light table-responsive">

            {!! $chart->container() !!}

        </div>

        <div class="col-md-6 card-body shadow-lg pt-3 bg-light table-responsive">

            {!! $chart2->container() !!}

        </div>

    </div>

    <div class="col-md-12 mt-4">
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">
            {!!Alert($icon = "fa-info", $class = "alert-primary", $Title = "Activity costs log ", $Msg = "View all
            activity costs attached to the grant ".$G->GrantName )!!}

        </div>
        <div class="card-body shadow-lg mt-3 bg-light table-responsive">




            <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                        <th>Activity</th>
                        <th>Broad Category</th>
                        <th>Units</th>
                        <th>Frequency</th>
                        <th>Quantity Required</th>
                        <th>Unit Cost</th>
                        <th>Subtotal</th>
                        <th>Record Date</th>





                    </tr>
                </thead>
                <tbody>
                    @isset($Activities)
                    @foreach ($Activities as $data )
                    <tr>

                        <td class="bg-danger text-light">{{$data->Activity}}</td>
                        <td class="bg-dark text-light">{{$data->BroadCategory}}</td>
                        <td class="bg-dark text-light">{{$data->Units}}</td>
                        <td class="bg-dark text-light">{{$data->Frequency}}</td>
                        <td class="bg-dark text-light">{{$data->QuantityRequired}}</td>
                        <td class="bg-dark text-light">{{number_format($data->UnitCost, 2)}} UGX</td>
                        <td class="bg-dark text-light">{{number_format($data->Subtotal, 2)}} UGX </td>

                        <td>{{ date('j F, Y', strtotime($data->created_at)) }} </td>


                    </tr>
                    @endforeach
                    @endisset



                </tbody>
            </table>
        </div>
    </div>
</div>
