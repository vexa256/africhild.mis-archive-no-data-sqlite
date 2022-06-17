@isset($Grants)
    @foreach ($Grants as $data)

        <div class="modal fade" id="UpdateGrant{{ $data->id }}">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header bg-gray">
                        <h5 class="modal-title">Update the grant record labelled

                            <small class="text-danger">
                                {{ $data->GrantName }}
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

                        <form action="{{ route('UpdateGrant') }}" class="row" method="POST"
                            enctype=multipart/form-data>

                            @csrf


                            <div class="row">
                                <div class="mb-3 mt-3 col-md-4">
                                    <label id="label" for="exampleFormControlInput1" class="required form-label">Grant
                                        Category</label>
                                    <select name="GrantCategory" required class="form-select form-control-sm  form-control"
                                        data-control="select2" data-placeholder="Select an option">
                                        <option value="{{ $data->GrantCategory }}">
                                            {{ $data->GrantCategory }}
                                        </option>


                                        <option value="Institutional Grant">Institutional Grant</option>
                                        <option value="Research Grant">Research Grant</option>
                                        <option value="Consultancy">Consultancy </option>
                                        <option value="Supplementary Grant">Supplementary Grant</option>

                                        <option value="Other">Other (Specifics in the description)</option>


                                    </select>

                                </div>
                                <div class="mb-3 mt-3 col-md-4">
                                    <label id="label" for="exampleFormControlInput1"
                                        class="required form-label">Donor</label>
                                    <select name="Donor" required class="form-select form-control-sm  form-control"
                                        data-control="select2" data-placeholder="Select an option">
                                        <option value="{{ $data->Donor }}">{{ $data->Donor }}</option>
                                        @isset($Donors)

                                            @foreach ($Donors as $datas)

                                                <option value="{{ $datas->Name }}">{{ $datas->Name }}</option>

                                            @endforeach
                                        @endisset
                                    </select>

                                </div>

                                <div class="mb-3 mt-3 col-md-4">
                                    <label id="label" for="exampleFormControlInput1" class="required form-label">Original
                                        Currency</label>
                                    <select name="OriginalCurrency" required
                                        class="form-select form-control-sm  form-control" data-control="select2"
                                        data-placeholder="Select an option">
                                        <option value="{{ $data->OriginalCurrency }}">{{ $data->OriginalCurrency }}
                                        </option>
                                        @isset($Currencies)

                                            @foreach ($Currencies as $dataz)

                                                <option value="{{ $dataz->name }}">{{ $dataz->langEN }}</option>

                                            @endforeach
                                        @endisset
                                    </select>

                                </div>


                                {{ UpdateString($name = 'GrantName', $label = ' Grant Name', $value = $data->GrantName) }}

                                {{ UpdateInteger($name = 'GrantAmountAlreadySpentInUgx', $label = ' Grant Amount Already Spent In Ugx ', $value = $data->GrantAmountAlreadySpentInUgx) }}



                                {{ UpdateInteger($name = 'OriginalAmount', $label = ' Original Amount', $value = $data->OriginalAmount) }}

                                {{ UpdateDate($name = 'GrantExpiry', $label = ' Grant Expiry', $value = $data->GrantExpiry) }}

                                {{ UpdateDate($name = 'GrantStartDate', $label = ' Grant Start Date', $value = $data->GrantStartDate) }}



                                {{ UpdateString($name = 'OriginalExchangeRate', $label = ' Original ExchangeRate', $value = $data->OriginalExchangeRate) }}




                                {{ UpdateString($name = 'GrantNumber', $label = ' Grant Number', $value = $data->GrantNumber) }}





                            </div>

                            <div class="row">


                                <div class="col-md-12 mb-3 mt-3 ">
                                    <div class="mb-3  ">
                                        <label class="required form-label">
                                            Applicable Information</label>
                                        <textarea name="DetailedNotes" class="form-control">
                                                                                                                                    {{ $data->DetailedNotes }}
                                                                                                                                </textarea>
                                    </div>
                                </div>

                            </div>

                            <input type="hidden" value="{{ $data->id }}" name="id">







                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-dark">Save Changes</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endisset
