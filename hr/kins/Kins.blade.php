	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {!! Alert($icon = "fa-info", $class = "alert-primary", $Title = $E->StaffName." | Staff Next of kins", $Msg = "View next of kins | Next of kin documents are stored under the staff documentation section") !!}
    </div>
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewKin", $Class="btn-danger", $Label="New Next of Kin", $Icon="fa-plus")}}
        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Email</th>
                    <th>ID Type</th>
                    <th>ID N.O</th>
                    <th>Relationship</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Permanent Address</th>
                    <th class="bg-dark text-light">Edit</th>
                    <th class="bg-dark text-light"> Delete</th>



                </tr>
            </thead>
            <tbody>
                @isset($Kins)
                @foreach ($Kins as $data )
                <tr>

                    <td>{{$data->Name}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>{!! date('F j, Y', strtotime($data->DateOfBirth)) !!}
                    </td>

                    <td>{{$data->Email}}</td>
                    <td>{{$data->IdType}}</td>
                    <td>{{$data->IdNumber}}</td>
                    <td>{{$data->Relationship}}</td>
                    <td>{{$data->PhoneNumber}}</td>
                    <td>{{$data->CurrentAddress}}</td>
                    <td>{{$data->PermanentAddress}}</td>

                   <td><a data-bs-toggle="modal" href="#Update{{ $data->id }}" class="btn btn-sm btn-dark edit" href="#">
                        <i class="fas fa-edit" aria-hidden="true"></i>
                    </a>

                   </td>

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


    @include('kins.New')

    @isset($Kins)
    @foreach ($Kins as $data )
    <form action="{{ route('UpdateLogic') }}" class="row" method="POST" enctype="multipart/form-data">
        @csrf
    {{ RunUpdateModal(
        $ModalID = $data->id,
        $Extra = null,
        $csrf = '@csrf',
        $Title ="Update the selected next of kin record",
        $RecordID =  $data->id,
        $col ='4',
        $te = '12',
        $TableName ="kins"
        ) }}

</form>
 @endforeach
 @endisset
