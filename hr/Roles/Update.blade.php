
@isset($Roles)
@foreach ($Roles as $data )
<div class="modal fade" id="Update{{ $data->id }}">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Update the staff role

                    <span class="text-danger">
                       {{$data->Designation}}
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

                <form action="{{ route('UpdateLogic') }}" class="row" method="POST" enctype=multipart/form-data> @csrf <div
                    class="row">

                    <div class="mb-3 mt-3 col-md-6" >
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
