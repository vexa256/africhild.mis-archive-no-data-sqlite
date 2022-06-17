<div class="modal fade"  id="New">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Send out new notice to all staff members.

                    <span class="text-danger">

                     Please send all applicable attachments by mail and for accuracy,  cross check your message before sending

                    </span>

                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewNotice') }}" class="row" method="POST" enctype= multipart/form-data>

                    @csrf


                    <div class="row">

                        <div class="mb-3 mt-3 col-md-6" >
                            <label id="label" for="exampleFormControlInput1" class="required form-label">Has attachment</label>
                            <select name="HasAttachement" required class="form-select form-control-sm  form-control" data-control="select2" data-placeholder="Select an option">
                                <option></option>


                               <option value="Yes  (Sent by mail)">Yes (Sent by mail)</option>
                               <option value="No">No</option>

                            </select>

                        </div>
                        @foreach($Form as $data)

                        @if ($data['type'] == 'string')

                        <div class="col-md-6 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}}</label>
                                <input required type="text" name="{{$data['name']}}" class="form-control "  />
                            </div>
                        </div>

                        @elseif ($data['type'] == 'integer')

                        <div class="col-md-6 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}} (UGX)</label>
                                <input required type="text" name="{{$data['name']}}" class="form-control IntOnlyNow" />
                            </div>
                        </div>

                        @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')

                        <div class="col-md-6 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}}</label>
                                <input type="text" name="{{$data['name']}}" class="form-control DateArea" />
                            </div>
                        </div>

                        @endif

                        @endforeach

                    </div>

                    <div class="row">
                        @foreach($Form as $data)

                        @if ($data['type'] == 'text')

                        <div class="col-md-12 mb-3 mt-3 x_{{$data['name']}}">
                            <div class="mb-3  x_insert" data-name="{{$data['name']}}">
                                <label class="required form-label">{{ucfirst(FromCamelCase($data['name']))}} / <small>(Photo attachments can be added using this interface)</small></label>
                                <textarea name="{{$data['name']}}" class="form-control"></textarea>
                            </div>
                        </div>

                        @endif

                        @endforeach

                    </div>


                    <input type="hidden" name="SenderName" value={{Auth::user()->name}}>





            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark" >Send Noticeboard</button>

            </form>
            </div>

        </div>
    </div>
</div>


