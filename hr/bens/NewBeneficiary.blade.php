<div class="modal fade" id="NewBeneficiary">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Attach beneficiary to the selected staff member

                   <small class="text-danger">  Please attach applicable pdf uploads to staff documentation |  Photo attachments supported here</small>

                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewBeneficiary') }}" class="row" method="POST" enctype=multipart/form-data> @csrf <div
                    class="row">

                    <div class="mb-3 mt-3 col-md-3" >
                        <label  class="required form-label">Benefit</label>
                        <select name="BID" required class="form-select form-control-sm  form-control" data-control="select2" data-placeholder="Select an option">
                            <option></option>
                           @isset($Benefits)

                           @foreach ($Benefits    as  $data )

                           <option value="{{$data->BID}}">{{$data->Benefit}}</option>

                           @endforeach
                           @endisset
                        </select>

                    </div>


                    @foreach($Form as $data)

                    @if ($data['type'] == 'string')

                    {{ CreateInputText($data, $placeholder = null, $col='3') }}

                    @elseif ($data['type'] == 'integer')

                    {{CreateInputInteger($data , $placeholder = null, $col='3') }}

                    @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')


                    {{CreateInputDate($data, $placeholder = null, $col='3')}}

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

            <input type="hidden" name="EmpID" value="{{ $E->EmpID }}">
            <input type="hidden" name="StaffName" value="{{ $E->StaffName }}">


            {!! Form::hidden($name="BenID", $value=\Hash::make(uniqid()."AFC".date('Y-m-d H:I:S')), [$options=null]) !!}



        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-dark">Save Changes</button>

            </form>
        </div>

    </div>
</div>
</div>

