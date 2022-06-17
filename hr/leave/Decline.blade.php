@isset($Apps)
@foreach ($Apps as $data )
<div class="modal fade"  id="DeclineLeave{{ $data->id }}">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Decline the leave request for the staff member

                    <span class="text-danger">
                        {{ $data->StaffName }}
                    </span>
                </h5>

                <!--begin::Close-->
                <a href="#MgtTaxes" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('DeclineLeave') }}" class="row" method="POST">
                    @csrf

                <div class="mb-3 col-md-12 pt-3 mt-3">
                    <label id="label" for="" class="required form-label">Message to leave applicant </label>
                     <textarea    name="ApproverMessage"></textarea>

                </div>

                   <input type="hidden" name="id" value="{{ $data->id }}">

            </div>

            <div class="modal-footer">
                <a href="#MgtTaxes" id="StartMgt" data-bs-dismiss="modal" data-bs-toggle="modal" type="button" class="btn btn-info" >Close</a>

                <button type="submit" class="btn btn-danger" >Decline Leave</button>

            </form>
            </div>

        </div>
    </div>
</div>
@endforeach
@endisset
