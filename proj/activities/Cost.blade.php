<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!!Alert($icon = "fa-info", $class = "alert-primary", $Title = "Activity Costing | ".$A->Activity." | <span
        class='text-danger'>

        Total Costs = ".number_format($Activities->sum('Subtotal'), 2)." UGX | Budget = ".number_format($A->Budget, 2)."
        UGX

    </span>", $Msg = "View all activity costs attached to the activity ".$A->Activity )!!}

</div>



<div class="card-body shadow-lg pt-3 bg-light table-responsive">
    {{ HeaderBtn($Toggle="New", $Class="btn-danger", $Label="New Activity Cost Activity", $Icon="fa-plus")}}

    <div class="col-md-12">

        <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                    <th>Broad Category</th>
                    <th>Units</th>
                    <th>Frequency</th>
                    <th>Quantity Required</th>
                    <th>Unit Cost</th>
                    <th>Subtotal</th>
                    <th>Record Date</th>
                    <th>Delete</th>




                </tr>
            </thead>
            <tbody>
                @isset($Activities)
                @foreach ($Activities as $data )
                <tr>

                    <td class="bg-dark text-light">{{$data->BroadCategory}}</td>
                    <td class="bg-dark text-light">{{$data->Units}}</td>
                    <td class="bg-dark text-light">{{$data->Frequency}}</td>
                    <td class="bg-dark text-light">{{$data->QuantityRequired}}</td>
                    <td class="bg-dark text-light">{{number_format($data->UnitCost, 2)}} UGX</td>
                    <td class="bg-dark text-light">{{number_format($data->Subtotal, 2)}} UGX </td>

                    <td>{{ date('j F, Y', strtotime($data->created_at)) }} </td>

                    <td><a href="#" data-route="{{ route('DelCost', ['id'=>$data->id]) }}"
                            data-msg="You sure you want to delete this activity cost . "
                            class="deleteConfirm btn btn-danger btn-sm">Delete Cost</a>
                    </td>
                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>
</div>

@include('activities.NewCost')
