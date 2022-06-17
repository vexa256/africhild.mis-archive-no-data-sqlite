<div class="row">

    <div class="col-md-6 card-body shadow-lg pt-3 bg-light table-responsive">

        {!! $chart->container() !!}

    </div>

    <div class="col-md-6 card-body shadow-lg pt-3 bg-light table-responsive">

        {!! $chart2->container() !!}

    </div>
    <div class="card-body   bg-light table-responsive">


        <div class="col-md-12">

            <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                        <th class="bg-dark text-light">Grant</th>
                        <th class="bg-danger text-light">End Date</th>
                        <th class="bg-danger text-light">Validity in Years</th>
                        <th class="bg-danger text-light">Validity Status</th>




                    </tr>
                </thead>
                <tbody>
                    @isset($Grants)
                    @foreach ($Grants as $data )
                      <tr>

                        <td class="bg-dark text-light">{{$data->GrantName}}</td>
                        <td>{{ date('j F, Y', strtotime($data->GrantExpiry)) }}
                        </td>
                        <td class="bg-dark text-light">{{number_format($data->ValidityMonths/12, 1)}} Year(s)</td>
                        <td class="bg-dark text-light">{{$data->status}} </td>

                    </tr>
                    @endforeach
                    @endisset



                </tbody>
            </table>
        </div>
    </div>
</div>
