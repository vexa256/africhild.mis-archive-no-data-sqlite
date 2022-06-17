<div class="modal fade" id="NewAcc">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Create a new user account
                </h5>

                <!--begin::Close-->
                <a href="#MgtTaxes" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewRoles') }}" class="row" method="POST">
                    @csrf

                    <div class="col-md-4 mb-3 mt-3 x_Deduction">
                        <div class="mb-3"><label class="required form-label">AfriChild Email</label>
                            <input required="" type="text" name="Email" class="form-control " placeholder="">
                        </div>
                    </div>

                    <div class="mb-3 mt-3 col-md-4">
                        <label id="label" for="" class="required form-label">Select Staff Member</label>
                        <select name="id" required class="form-select form-control-sm  form-control"
                            data-control="select2" data-placeholder="Select an option">
                            <option></option>
                            @isset($Staff)

                                @foreach ($Staff as $data)
                                    <option value="{{ $data->id }}">{{ $data->StaffName }}</option>
                                @endforeach
                            @endisset
                        </select>

                    </div>


                    <div class="mb-3 mt-3 col-md-4">
                        <label id="label" for="" class="required form-label">Select Account Role</label>
                        <select name="role" required class="form-select form-control-sm  form-control"
                            data-control="select2" data-placeholder="Select an option">
                            <option></option>


                            <option value="superadmin">Executive Director</option>
                            <option value="staffaccount">Staff Account</option>
                            <option value="hrandfinance">HR and Finance</option>
                            <option value="projectmanager">Project Manager</option>
                            <option value="sysadmin">System Administrator</option>


                        </select>

                    </div>


            </div>

            <div class="modal-footer">
                <a href="#MgtTaxes" id="StartMgt" data-bs-dismiss="modal" data-bs-toggle="modal" type="button"
                    class="btn btn-info">Close</a>

                <button type="submit" class="btn btn-danger">Save Changes</button>

                </form>
            </div>

        </div>
    </div>
</div>
