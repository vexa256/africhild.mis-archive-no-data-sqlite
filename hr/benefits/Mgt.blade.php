	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {!! Alert($icon = "fa-info", $class = "alert-primary", $Title = "Salary Benefits", $Msg = "Manage all supported salary benefits") !!}
    </div>
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="New", $Class="btn-danger", $Label="New Benefit", $Icon="fa-plus")}}
        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Benefit</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th class="bg-dark text-light"> Delete</th>



                </tr>
            </thead>
            <tbody>
                @isset($SalaryBenefits)
                @foreach ($SalaryBenefits as $data )
                <tr>

                    <td>{{$data->Benefit}}</td>
                    <td>{{number_format($data->Amount)}} UGX</td>
                    <td>

                        <a data-bs-toggle="modal"  class="btn btn-danger btn-sm" href="#ViewDesc{{$data->id}}">

                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>

                    </td>


                    <td>

                            {!! ConfirmBtn($data = [
                                'msg'   => 'You want to delete this benefit  category',
                                'route' => route('DelSalaryBen' , ['id' => $data->id]),
                                'label' => '<i class="fas fa-trash"></i>',
                                'class' => 'btn btn-danger btn-sm deleteConfirm',

                            ]) !!}

                    </td>





                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>
    <!--end::Card body-->



    @include('benefits.New')

    {{DescModal($SalaryBenefits, $Title="View the description  attached to selected salary benefit", $ModalID="ViewDesc")}}
