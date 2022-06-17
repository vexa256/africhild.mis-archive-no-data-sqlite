<div class="modal fade" id="NewDoc">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Attach new scanned document to the grant

                    <span class="text-danger">
                        {{$E->GrantName}}
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

                <form action="{{ route('NewGrantDoc') }}" class="row" method="POST" enctype="multipart/form-data"> @csrf <div
                    class="row">

                    <div class="mb-3 col-md-4 mb-3 mt-3" >
                        <label class="required form-label"> PDF Document </label>
                        <input name="DocURL"  type="file" required  class="  form-control form-control-solid" /> </div>


        <input type="hidden" name="GID" value="{{$E->GID}}">

        <input type="hidden" name="GrantName" value="{{$E->GrantName}}">

        <input type="hidden" name="DOCID" value="{{\Hash::make($E->GID)}}">

        <input type="hidden" name="id" value="{{$E->id}}">


                    @foreach($Form as $data)

                    @if ($data['type'] == 'string')

                    {{ CreateInputText($data, $placeholder = null, $col = '4') }}

                    @elseif ($data['type'] == 'integer')

                    {{CreateInputInteger($data , $placeholder = null, $col = '4') }}

                    @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')


                    {{CreateInputDate($data, $placeholder = null, $col = '4')}}

                    @endif

                    @endforeach

            </div>

            <div class="row">
                @foreach($Form as $data)

                @if ($data['type'] == 'text')

                {{CreateInputEditor($data, $placeholder = null, $col = '12')}}

                @endif

                @endforeach

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
