
<div class="card-body pt-3 bg-light table-responsive">
    {{ HeaderBtn($Toggle="AssignBen", $Class="btn-danger", $Label="New Benefit", $Icon="fa-plus")}}

    {{ HeaderBtn($Toggle="AssignDed", $Class="btn-dark", $Label="New Deduction", $Icon="fa-plus")}}

    {{ HeaderBtn($Toggle="TaxAssign", $Class="btn-info", $Label="New Tax", $Icon="fa-cogs")}}
</div>
<div class="row">
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {!! Alert($icon = "fa-info", $class = "alert-primary", $Title = $E->StaffName."| Payroll settings", $Msg = "Manage payroll settings for the selected staff member") !!}
    </div>
</div>
@include('payroll.Stats')

<div class="row">
    <div class="col-md-4">
        <h3 class="h3">
            Assigned Benefits
        </h3>
        <table class="table  table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Benfit</th>
                    <th>Amount</th>
                    <th>Reverse Assignment</th>


                </tr>
            </thead>
            <tbody>
                @isset($AssignedBenefits)
                @foreach ($AssignedBenefits as $data )
                  <tr>
                    <td>{{$data->Benefit}}</td>
                    <td>{{number_format($data->Amount)}} UGX</td>

                    <td><a data-route="{{ route('DeleteBenefit', ['id'=>$data->BIID]) }}" data-msg="You sure you want to reverse this salary benefit assignment. "  class="btn-danger btn btn-sm deleteConfirm" href="#">Delete</a></td>




                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>

    <div class="col-md-4">
        <h3 class="h3">
            Assigned Deductions
        </h3>
        <table class="table  table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Deduction</th>
                    <th>Amount</th>
                    <th>Reverse Assignment</th>


                </tr>
            </thead>
            <tbody>
                @isset($AssignedDeductions)
                @foreach ($AssignedDeductions as $data )
                  <tr>
                    <td>{{$data->Deduction}}</td>
                    <td>{{number_format($data->Amount)}} UGX</td>

                    <td><a data-route="{{ route('DeleteDeduction', ['id'=>$data->DIID]) }}" data-msg="You sure you want to reverse this salary deduction assignment. "  class="btn-danger btn btn-sm deleteConfirm" href="#">Delete</a></td>




                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>



    <div class="col-md-4">
        <h3 class="h3">
            Assigned Taxes
        </h3>
        <table class="table  table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Tax</th>
                    <th>Percentage</th>
                    <th>Reverse Assignment</th>


                </tr>
            </thead>
            <tbody>
                @isset($AssignedTaxes)
                @foreach ($AssignedTaxes as $data )
                  <tr>
                    <td>{{$data->Tax}}</td>
                    <td>{{$data->Percentage}} %</td>

                    <td><a data-route="{{ route('DeleteTaxAssign', ['id'=>$data->TIID]) }}" data-msg="You sure you want to reverse this salary tax assignment. "  class="btn-danger btn btn-sm deleteConfirm" href="#">Delete</a></td>




                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>



</div>


@include('payroll.AssignBen')
@include('payroll.AssignDed')
@include('payroll.AssignTax')
