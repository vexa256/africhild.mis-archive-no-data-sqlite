<!--begin::Card body-->
<div class="card-body pt-3 bg-light table-responsive">
</div>
<div class="card-body shadow-lg pt-3 bg-light table-responsive">
    <form action="{{ route('BVASelected') }}" method="POST">
    <div class="row">
        <div class="col-md-6">

                @csrf
                <div class="mb-3 col-md-12  py-5   my-5">
                    <label id="label" for="" class="px-5   my-5 required form-label">Select year to attach BVA report to (Grant BVA)</label>
                    <select required name="Year" class="form-select  py-5   my-5 form-select-solid" data-control="select2"
                        data-placeholder="Select an option">
                        <option></option>
                        @isset($Activities)

                        @foreach ($Activities->unique('Year') as $data)
                        <option value="{{$data->Year}}">{{$data->Year}}</option>
                        @endforeach
                        @endisset

                    </select>

                </div>


        </div>
        <div class="col-md-6">

                @csrf
                <div class="mb-3 col-md-12  py-5   my-5">
                <label id="label" for="" class="px-5   my-5 required form-label">Select Grant (Annual Grant BVA)</label>
                    <select required name="id" class="form-select  py-5   my-5 form-select-solid" data-control="select2"
                        data-placeholder="Select an option">
                        <option></option>
                        @isset($Grants)

                        @foreach ($Grants as $data)
                        <option value="{{$data->id}}">{{$data->GrantName}}</option>
                        @endforeach
                        @endisset

                    </select>

                </div>
                <div class="float-end my-3">
                    <button class="btn btn-danger btn-sm shadow-lg" type="submit">
                      Next
                    </button>
                </div>



        </div>



    </div>

    </form>

</div>
