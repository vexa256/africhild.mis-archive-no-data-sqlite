@isset($All)
    @foreach ($All as $data)
        <div class="modal modal-blur fade" id="Desc{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> View more details
                             abut the selected record


                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form enctype="multipart/form-data" action="{{ route('NewRecord') }}" method="POST">
                            @csrf


                            <div class="mb-3">
                                <label class="form-label">
                                    Record Description / Details
                                </label>
                                <textarea name="Desc" class="form-control tiny">

                                                        {{ $data->{$column} }}
                                                    </textarea>
                            </div>





                            <div class="modal-footer">
                                <a href="#" class="btn btn-pill btn-dark" data-bs-dismiss="modal">
                                    Cancel
                                </a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endisset
