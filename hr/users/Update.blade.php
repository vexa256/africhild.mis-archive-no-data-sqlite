<div class="modal fade"  id="UpdateAcc">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Hello {{ Auth::user()->name }}, Use this window to update your account password
                </h5>

                <!--begin::Close-->
                <a href="#MgtTaxes" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('UpdateAcc') }}" class="row" method="POST">
                    @csrf

                    <div class="col-md-6 mb-3 mt-3 ">
                        <div class="mb-3">
                            <label class="required form-label">New Password </label>
                            <input required="" type="text" name="password" class="form-control " placeholder="">
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                    <div class="col-md-6 mb-3 mt-3 ">
                        <div class="mb-3">
                            <label class="required form-label">Confirm Password  </label>
                            <input required="" type="text" name="password_confirmation" class="form-control " placeholder="">
                        </div>
                    </div>


            </div>

            <div class="modal-footer">
                <a href="#MgtTaxes" id="StartMgt" data-bs-dismiss="modal" data-bs-toggle="modal" type="button" class="btn btn-info" >Close</a>

                <button type="submit" class="btn btn-danger" >Save Changes</button>

            </form>
            </div>

        </div>
    </div>
</div>
