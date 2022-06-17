
@isset($Departments)
@foreach ($Departments as $data )
<div class="modal fade" id="Update{{ $data->id }}">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Update the department

                    <span class="text-danger">
                       {{$data->DepartmentName}}
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

                    {{ $FormEngine->UpdateTable(

                        $TableName = 'departments',
                        $id = $data->id,
                        $col = "12",
                        $te = '12'
                        )
                    }}

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
