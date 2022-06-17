<div class="modal fade" id="New">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Hello {{ Auth::user()->name }}, Lets create  your activities


                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewRecord') }}" class="row" method="POST" enctype=multipart/form-data> @csrf <div
                    class="row">

                    <div class="mb-3 pt-3 col-md-4 ">
                        <label id="label" for="" class="required form-label">Activity Category</label>
                        <select required name="CatID" class="form-select form-select-solid" data-control="select2"
                            data-placeholder="Select an option">
                            <option></option>
                            @isset($Cat)

                            @foreach ($Cat as $datazs)
                            <option value="{{$datazs->CatID}}">{{$datazs->Category}}</option>
                            @endforeach
                            @endisset

                        </select>

                    </div>

                    <div class="mb-3 pt-3 col-md-4 ">
                        <label id="label" for="" class="required form-label">Select Supervisor</label>
                        <select required name="Supervisor" class="form-select form-select-solid" data-control="select2"
                            data-placeholder="Select an option">
                            <option></option>
                            @isset($Emp)

                            @foreach ($Emp as $dataz)
                            <option value="{{$dataz->EmpID}}">{{$dataz->StaffName}}</option>
                            @endforeach
                            @endisset

                        </select>

                    </div>

                    <div class="mb-3 pt-3 col-md-4 ">
                        <label id="label" for="" class="required form-label">Activity Status</label>
                        <select required name="Status" class="form-select form-select-solid" data-control="select2"
                            data-placeholder="Select an option">
                            <option></option>

                            <option value="Expired">Expired</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Terminated">Terminated</option>
                            <option value="Concluded">Concluded</option>



                        </select>

                    </div>

                    @foreach($Form as $data)

                    @if ($data['type'] == 'string')

                    {{ CreateInputText($data, $placeholder = null, $col='4') }}

                    @elseif ($data['type'] == 'integer')

                    {{CreateInputInteger($data , $placeholder = null, $col='4') }}

                    @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')


                    {{CreateInputDate($data, $placeholder = null, $col='4')}}

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

            <input type="hidden" name="TableName" value="trackings">

            <input type="hidden" name="EmpID" value="{{Auth::user()->EmpID}}">



            {!! Form::hidden($name="ActivityID", $value=\Hash::make(uniqid()."AFC".date('Y-m-d H:I:S')), [$options=null]) !!}

            {!! Form::hidden($name="ActID", $value=\Hash::make(uniqid()."AFC".date('Y-m-d H:I:S')), [$options=null]) !!}



        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-dark">Save Changes</button>

            </form>
        </div>

    </div>
</div>
</div>

