@isset($Beneficiaries)
@foreach ($Beneficiaries as $data )
<div class="modal fade"  id="ViewMore{{ $data->id }}">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">View more details about the selected beneficiary

                    <span class="text-danger">
                        {{ $data->Name }}
                    </span>


                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
                    <thead>
                        <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                            <th>Beneficiary</th>
                            <th>Relationship</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Permanent Address</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{$data->Name}}</td>
                            <td>{{$data->Relationship}}</td>
                            <td>{{$data->PhoneNumber}}</td>
                            <td>{{$data->CurrentAddress}}</td>
                            <td>{{$data->PermanentAddress}}</td>
                        </tr>



                    </tbody>
                </table>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark" >Save Changes</button>


            </div>

        </div>
    </div>
</div>
@endforeach
@endisset
