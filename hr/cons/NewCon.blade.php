<div class="modal fade" id="NewEmp">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Create new contractor record


                    <small class="text-danger">
                        Applicable PDF uploads should be added to the contrator documentation section
                    </small>

                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewCon') }}" class="row" method="POST" enctype="multipart/form-data"> @csrf <div
                    class="row">
                    <div class="mb-3 mt-3 col-md-3" >
                        <label id="label" for="exampleFormControlInput1" class="required form-label">Department</label>
                        <select name="Department" required class="form-select form-control-sm  form-control" data-control="select2" data-placeholder="Select an option">
                            <option></option>
                           @isset($Departments)

                           @foreach ($Departments    as  $data )

                           <option value="{{$data->DepartmentName}}">{{$data->DepartmentName}}</option>

                           @endforeach
                           @endisset
                        </select>

                    </div>
                    <div class="col-md-3 mb-3 mt-3" >
                        <label id="label" for="exampleFormControlInput1" class="required form-label">Nationality</label>
                        <select name="Nationality" required class="form-select form-control-sm  form-control" data-control="select2" data-placeholder="Select an option">
                            <option></option>
                           @isset($Countries)

                           @foreach ($Countries    as  $data )

                           <option value="{{$data->name}}">{{$data->name}}</option>

                           @endforeach
                           @endisset
                        </select>

                    </div>
                    <div class="mb-3 mt-3 col-md-3" >
                        <label id="label" for="exampleFormControlInput1" class="required form-label">Reports To</label>
                        <select name="ReportsTo" required class="form-select form-control-sm  form-control" data-control="select2" data-placeholder="Select an option">
                            <option></option>
                           @isset($Roles)

                           @foreach ($Roles    as  $data )

                           <option value="{{$data->Designation}}">{{$data->Designation}}</option>

                           @endforeach
                           @endisset
                        </select>

                    </div>



                    @foreach($Form as $data)

                    @if ($data['type'] == 'string')

                    {{ CreateInputText($data, $placeholder = null, $col = '3') }}

                    @elseif ($data['type'] == 'integer')

                    {{CreateInputInteger($data , $placeholder = null, $col = '3') }}

                    @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')


                    {{CreateInputDate($data, $placeholder = null, $col = '3')}}

                    @endif

                    @endforeach

            </div>

            <div class="row">
                @foreach($Form as $data)

                @if ($data['type'] == 'text')

                {{CreateInputEditor($data, $placeholder = null, $col = '12')}}

                @endif

                @endforeach

            </div>



            {!! Form::hidden($name="EmpID", $value=\Hash::make(uniqid()."AFC".date('Y-m-d H:I:S')), [$options=null]) !!}




        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-dark">Save Changes</button>

            </form>
        </div>

    </div>
</div>
</div>

