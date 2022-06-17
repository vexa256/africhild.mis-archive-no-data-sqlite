
        @isset($Employees)
        @foreach ($Employees as $up )
        <div class="modal fade" id="Update{{ $up->id }}">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Update selected  record for the staff member

                    <span class="text-primary">

                        {{ $up->StaffName }}

                    </span>
                    <small class="text-danger">
                        (Applicable PDF uploads should be added to the staff documentation section)
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

                <form action="{{ route('UpdateEmp') }}" class="row" method="POST" enctype=multipart/form-data> @csrf <div
                    class="row">
                    <div class="mb-3 mt-3 col-md-3">
                        <label id="label" for="exampleFormControlInput1" class="required form-label">Department</label>
                        <select name="Department" required class="form-select form-control-sm  form-control"
                            data-control="select2" data-placeholder="Select an option">
                            <option value="{{ $up->Department }}">
                                {{ $up->Department }}</option>
                            @isset($Departments)

                            @foreach ($Departments as $data )

                            <option value="{{$data->DepartmentName}}">{{$data->DepartmentName}}</option>

                            @endforeach
                            @endisset
                        </select>

                    </div>
                    <div class="mb-3 mt-3 col-md-3">
                        <label id="label" for="exampleFormControlInput1" class="required form-label">Reports To</label>
                        <select name="ReportsTo" required class="form-select form-control-sm  form-control"
                            data-control="select2" data-placeholder="Select an option">
                            <option value="{{$up->ReportsTo}}">
                                {{$up->ReportsTo}}</option>
                            @isset($Roles)

                            @foreach ($Roles as $data )

                            <option value="{{$data->Designation}}">{{$data->Designation}}</option>

                            @endforeach
                            @endisset
                        </select>

                    </div>

                    <div class="mb-3 mt-3 col-md-3">
                        <label id="label" for="exampleFormControlInput1" class="required form-label">Gender</label>
                        <select name="Gender" required class="form-select form-control-sm  form-control"
                            data-control="select2" data-placeholder="Select an option">
                            <option value="{{$up->Gender}}">{{$up->Gender}}</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>


                        </select>

                    </div>

                    <div class="mb-3 mt-3 col-md-3">
                        <label id="label" for="exampleFormControlInput1" class="required form-label">Designation</label>
                        <select name="Designation" required class="form-select form-control-sm  form-control"
                            data-control="select2" data-placeholder="Select an option">
                            <option value="{{$up->Designation}}">
                                {{$up->Designation}}</option>
                            @isset($Roles)

                            @foreach ($Roles as $des )

                            <option value="{{$des->Designation}}">{{$des->Designation}}</option>

                            @endforeach
                            @endisset
                        </select>

                    </div>


{{ UpdateString($name = 'StaffName', $label = 'Staff Name', $value = $up->StaffName) }}

{{ UpdateString($name = 'PhoneNumber', $label = 'Phone Number', $value = $up->PhoneNumber) }}

{{ UpdateString($name = 'Email', $label = 'Email', $value = $up->Email) }}

{{ UpdateString($name = 'LocalAddress', $label = 'Local Address', $value = $up->LocalAddress) }}

{{ UpdateString($name = 'Nationality', $label = 'Nationality', $value = $up->Nationality) }}

{{ UpdateString($name = 'PermanentAddress', $label = 'Permanent Address', $value = $up->PermanentAddress) }}

{{ UpdateString($name = 'NIN', $label = 'NIN', $value = $up->NIN) }}

{{ UpdateInteger($name = 'MonthlySalary', $label = 'Monthly Salary', $value = $up->MonthlySalary) }}

{{ UpdateString($name = 'StaffCode', $label = 'Staff Code', $value = $up->StaffCode) }}

{{ UpdateDate($name = 'JoiningDate', $label = 'Joining Date', $value = $up->JoiningDate) }}

{{ UpdateDate($name = 'ContractExpiry', $label = 'Contract Expiry', $value = $up->ContractExpiry) }}

{{ UpdateDate($name = 'DOB', $label = 'DOB', $value = $up->DOB) }}

{{ UpdateString($name = 'BankName', $label = 'Bank Name', $value = $up->BankName) }}

{{ UpdateString($name = 'BankBranch', $label = 'Bank Branch', $value = $up->BankBranch) }}

{{ UpdateString($name = 'AccountName', $label = 'Account Name', $value = $up->AccountName) }}

{{ UpdateString($name = 'AccountNumber', $label = 'Account Number', $value = $up->AccountNumber) }}

{{ UpdateString($name = 'TIN', $label = 'TIN', $value = $up->TIN) }}

{{ UpdateString($name = 'BankCode', $label = 'Bank Code', $value = $up->BankCode ) }}

{{ UpdateString($name = 'BankCode', $label = 'Bank Code', $value = $up->BankCode ) }}

            </div>

            <input type="hidden" name="id" value="{{ $up->id }}">




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

