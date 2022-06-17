	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {!! Alert($icon = "fa-info", $class = "alert-primary", $Title = "Salary Deductions", $Msg = "Manage all supported salary deductions") !!}
    </div>
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="New", $Class="btn-danger", $Label="New Deduction", $Icon="fa-plus")}}
        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Deduction</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Edit</th>

                    <th class="bg-dark text-light"> Delete</th>



                </tr>
            </thead>
            <tbody>
                @isset($Deductions)
                @foreach ($Deductions as $data )
                <tr>

                    <td>{{$data->Deduction}}</td>
                    <td>{{number_format($data->Amount)}} UGX</td>
                    <td>

                        <a data-bs-toggle="modal"  class="btn btn-danger btn-sm" href="#ViewDesc{{$data->id}}">

                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>

                    </td>
                    <td><a data-bs-toggle="modal" href="#Update{{ $data->id }}" class="btn btn-sm btn-dark edit" href="#">
                        <i class="fas fa-edit" aria-hidden="true"></i>
                    </a>

                   </td>

                    <td>

                            {!! ConfirmBtn($data = [
                                'msg'   => 'You want to delete this salary deduction category',
                                'route' => route('DelDed' , ['id' => $data->id]),
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



    @include('deductions.New')


    @isset($Deductions)
    @foreach ($Deductions as $data )
    <form action="{{ route('UpdateLogic') }}" class="row" method="POST" enctype="multipart/form-data">
        @csrf
    {{ RunUpdateModal(
        $ModalID = $data->id,
        $Extra = null,
        $csrf = '@csrf',
        $Title ="Update the selected deduction category record",
        $RecordID =  $data->id,
        $col ='6',
        $te = '12',
        $TableName ="deductions"
        ) }}

</form>
 @endforeach
 @endisset

    {{DescModal($Deductions, $Title="View the description  attached to selected salary deduction", $ModalID="ViewDesc")}}
