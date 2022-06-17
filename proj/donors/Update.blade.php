@isset($Donors)
@foreach ($Donors as $up )
<div class="modal fade" id="UpDonor{{ $up->id }}">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Update the selected record


                    for the donor <span class="text-danger">


                        {{ $up->Name }}
                    </span>

                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('UpdateDonor') }}" class="row" method="POST" enctype=multipart/form-data> @csrf
                    <input type="hidden" name="id" value="{{ $up->id }}">

                    <div class="row">


                        <div class="col-md-4 mb-3 mt-3">
                            <label id="label" for="exampleFormControlInput1" class="required form-label">Country</label>
                            <select name="Country" required class="form-select form-control-sm  form-control"
                                data-control="select2" data-placeholder="Select an option">
                                <option value="{{ $up->Country }}">
                                    {{ $up->Country }}
                                </option>
                                @isset($Countries)

                                @foreach ($Countries as $data )

                                <option value="{{$data->name}}">{{$data->name}}</option>

                                @endforeach
                                @endisset
                            </select>

                        </div>

                        {{ UpdateString($name = 'Name', $label = 'Donor Name', $value = $up->Name) }}

                        {{ UpdateString($name = 'ContactPerson', $label = 'Contact Person', $value = $up->ContactPerson) }}

                        {{ UpdateString($name = 'Address', $label = 'Address', $value = $up->Address) }}

                        {{ UpdateString($name = 'Email', $label = 'Email', $value = $up->Email) }}

                        {{ UpdateString($name = 'Phone', $label = 'Phone', $value = $up->Phone) }}

                        {{ UpdateString($name = 'Category', $label = 'Donor Category', $value = $up->Category) }}

                    </div>

                    <div class="row">
                        {{ UpdateText($name = 'Description', $label = 'Description', $value = $up->Description) }}

                    </div>






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
