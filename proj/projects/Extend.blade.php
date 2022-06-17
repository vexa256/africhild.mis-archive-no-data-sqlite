@isset($Projects)
@foreach ($Projects as $data )
    <div class="modal fade"  id="Extend{{$data->id}}">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Extend  validity for the project
                        <span class="text-danger font-weight-bold">
                            {{$data->ProjectName}}
                        </span>
                    </h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <form action="{{ route('ExtendProjectValidity') }}" class="row" method="POST" enctype= multipart/form-data>

                        @csrf


                <input type="hidden" name="id" value="{{ $data->id }}">

                        <div class="row">

                    <div class="col-md-12 mb-3 mt-3 ">
                        <div class="mb-3">
                            <label class="required form-label">Project End Date</label>
                            <input required type="text" name="ProjectExpiry" class="form-control DateArea" placeholder="" />
                        </div>
                    </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-dark shadow-lg" data-bs-dismiss="modal">Close</button>



                <button type="submit" class="btn btn-dark" >Save Changes</button>
                </form>
                </div>

            </div>
        </div>
    </div>

    @endforeach
@endisset
