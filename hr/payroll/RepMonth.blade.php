
<div class="row">
  <div class="card-body pt-3 bg-light shadow-lg table-responsive">
      {!! Alert($icon = "fa-info", $class = "alert-primary", $Title = "Staff Payroll report for the month <span class='text-danger'>".$Month." and the year ".$Year."</span>" , $Msg = "Detailed benefits , deductions and taxaion logs can be found in the execute payroll function") !!}
  </div>
</div>
<div class="card-body mt-5 shadow-lg pt-5 bg-light table-responsive">
    <div class="row mt-5 ">
        <div class="col-md-12 ">

            <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th class="bg-dark text-light">Staff Member</th>
                        <th class="bg-dark text-light">Staff Code</th>
                        <th class="bg-dark text-light">Net Salary </th>
                        <th class="bg-dark text-light">Gross Salary</th>
                        <th class="bg-dark text-light">Deductions</th>
                        <th class="bg-danger text-light">Benefits</th>
                        <th class="bg-danger text-light">Taxes</th>
                        <th class="bg-danger text-light">Month Paid</th>
                        <th class="bg-danger text-light"> Calendar Year</th>
                        <th class="bg-danger text-light">Date Effected</th>


                    </tr>
                </thead>
                <tbody>
                    @isset($Payroll)
                    @foreach ($Payroll as $data )
                      <tr style="">
                          <td class="bg-danger text-light">{{$data->StaffName}}</td>
                          <td class="bg-danger text-light">{{$data->StaffCode}}</td>
                          <td class="bg-danger text-light">{{number_format($data->SalaryPaid, 2)}} UGX</td>
                          <td class="bg-danger text-light">{{number_format($data->GrossSalary, 2)}} UGX</td>
                          <td class="bg-dark text-light">{{number_format($data->D, 2)}} UGX</td>
                          <td class="bg-dark text-light">{{number_format($data->Benefits, 2)}} UGX</td>
                          <td class="bg-dark text-light">{{number_format($data->Taxes, 2)}} UGX</td>
                          <td class="bg-dark text-light">{{$data->Month}}</td>
                          <td class="bg-dark text-light">{{$data->Year}}</td>
                          <td class="bg-dark text-light">{{date('d-M-Y', strtotime($data->CT));
                          }}</td>




                      </tr>

                    @endforeach
                    @endisset



                </tbody>
            </table>
        </div>



    </div>


  </div>


  {{DescModal($Payroll, $Title="View HR note attached to the selected payroll transaction ", $ModalID="ViewDesc")}}
