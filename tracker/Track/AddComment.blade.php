

<!-- Modal -->
<div class="modal fade" id="UpStatus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form novalidate action="{{ route('CMSUpdate') }}" class="" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Alter the status of your activities

                </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">

                <div class="mb-3 pt-3 col-md-12  ">
                    <label id="label" for="" class="required form-label">Activity Status</label>


                </div>


               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submite" class="btn btn-danger">Save Changes</button>
            </div>

        </form>
        </div>
    </div>
</div>
