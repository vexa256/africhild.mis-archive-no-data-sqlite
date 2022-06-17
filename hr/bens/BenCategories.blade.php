	<!--begin::Card body-->
    <div class="card-body pt-3 text-light  bg-light shadow-lg table-responsive">
        {!! Alert($icon = "fa-info", $class = "alert-primary", $Title = "Non-Salary benefits", $Msg = "Manage non-salary benefits | Non-salary benefits are assigned to staff beneficiaries") !!}
    </div>
    <div class="card-body pt-3 text-light  bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewBen", $Class="btn-danger", $Label="New Benefit Category", $Icon="fa-plus")}}
        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th class="text-light  bg-danger">Benefit</th>
                    <th class="text-light  bg-dark">Amount</th>
                    <th class="text-light  bg-dark">Description</th>
                    <th class="text-light  bg-dark text-light"> Delete</th>



                </tr>
            </thead>
            <tbody>
                @isset($Bens)
                @foreach ($Bens as $data )
                <tr>

                    <td class="text-light  bg-dark">{{$data->Benefit}}</td>
                    <td class="text-dark ">{{number_format($data->Amount, 2)}} UGX</td>
                    <td><a data-bs-toggle="modal" href="#ViewDesc{{ $data->id }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-binoculars aria-hidden="true"></i>
                    </a></td>


                    <td>

                            {!! ConfirmBtn($data = [
                                'msg'   => 'You want to delete this next of kin record',
                                'route' => route('DelNOK' , ['id' => $data->id]),
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


    @include('bens.NewBen')

    {{DescModal($Bens, $Title="View description of the selected non-salary benefit category selected", $ModalID="ViewDesc")}}

