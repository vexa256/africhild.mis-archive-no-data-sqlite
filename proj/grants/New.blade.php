<div class="modal fade" id="NewGrant">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Create a new grant record

                    <small class="text-danger">
                        All grant PDF documents should be stored under the grant documentation section
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

                <form action="{{ route('NewGrant') }}" class="row" method="POST"
                    enctype=multipart/form-data>

                    @csrf


                    <div class="row">
                        <div class="mb-3 mt-3 col-md-4">
                            <label id="label" for="exampleFormControlInput1" class="required form-label">Grant
                                Category</label>
                            <select name="GrantCategory" required class="form-select form-control-sm  form-control"
                                data-control="select2" data-placeholder="Select an option">
                                <option></option>


                                <option value="Institutional Grant">Institutional Grant</option>
                                <option value="Research Grant">Research Grant</option>
                                <option value="Consultancy">Consultancy </option>
                                <option value="Supplementary Grant">Supplementary Grant</option>

                                <option value="Other">Other (Specifics in the description)</option>


                            </select>

                        </div>
                        <div class="mb-3 mt-3 col-md-4">
                            <label id="label" for="exampleFormControlInput1" class="required form-label">Donor</label>
                            <select name="Donor" required class="form-select form-control-sm  form-control"
                                data-control="select2" data-placeholder="Select an option">
                                <option></option>
                                @isset($Donors)

                                    @foreach ($Donors as $data)

                                        <option value="{{ $data->Name }}">{{ $data->Name }}</option>

                                    @endforeach
                                @endisset
                            </select>

                        </div>

                        <div class="mb-3 mt-3 col-md-4">
                            <label id="label" for="exampleFormControlInput1" class="required form-label">Original
                                Currency</label>
                            <select name="OriginalCurrency" required class="form-select form-control-sm  form-control"
                                data-control="select2" data-placeholder="Select an option">
                                <option></option>
                                @isset($Currencies)

                                    @foreach ($Currencies as $data)

                                        <option value="{{ $data->name }}">{{ $data->langEN }}</option>

                                    @endforeach
                                @endisset
                            </select>

                        </div>

                        @foreach ($Form as $data)

                            @if ($data['type'] == 'string')

                                <div class="col-md-4 mb-3 mt-3 x_{{ $data['name'] }}">
                                    <div class="mb-3">
                                        <label
                                            class="required form-label">{{ ucfirst(FromCamelCase($data['name'])) }}</label>
                                        <input required type="text" name="{{ $data['name'] }}" class="form-control "
                                            placeholder="" />
                                    </div>
                                </div>

                            @elseif ($data['type'] == 'integer')

                                <div class="col-md-4 mb-3 mt-3 x_{{ $data['name'] }}">
                                    <div class="mb-3">
                                        <label
                                            class="required form-label">{{ ucfirst(FromCamelCase($data['name'])) }}</label>
                                        <input required type="text" name="{{ $data['name'] }}"
                                            class="form-control IntOnlyNow" />
                                    </div>
                                </div>

                            @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')

                                <div class="col-md-4 mb-3 mt-3 x_{{ $data['name'] }}">
                                    <div class="mb-3">
                                        <label
                                            class="required form-label">{{ ucfirst(FromCamelCase($data['name'])) }}</label>
                                        <input type="text" name="{{ $data['name'] }}"
                                            class="form-control DateArea" />
                                    </div>
                                </div>

                            @endif

                        @endforeach

                    </div>

                    <div class="row">
                        @foreach ($Form as $data)

                            @if ($data['type'] == 'text')

                                <div class="col-md-12 mb-3 mt-3 x_{{ $data['name'] }}">
                                    <div class="mb-3  x_insert" data-name="{{ $data['name'] }}">
                                        <label
                                            class="required form-label">{{ ucfirst(FromCamelCase($data['name'])) }}
                                            /Applicable Information</label>
                                        <textarea name="{{ $data['name'] }}" class="form-control"></textarea>
                                    </div>
                                </div>

                            @endif

                        @endforeach

                    </div>



                    {!! Form::hidden($name = 'GID', $value = \Hash::make(uniqid() . 'PROJ' . date('Y-m-d H:I:S')), [($options = null)]) !!}




            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark">Save Changes</button>

                </form>
            </div>

        </div>
    </div>
</div>
