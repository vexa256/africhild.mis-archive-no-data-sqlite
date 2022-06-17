<!--begin::Card body-->
<div class="card-body pt-3 bg-light table-responsive">
</div>
<div class="card-body shadow-lg pt-3 bg-light table-responsive">
    <div class="row">

            <form class="row" action="{{ route('MonthlyPayReport') }}" method="POST">
                @csrf
                <div class="mb-3 col-md-6  py-5   my-5">
                    <label id="label" for="" class="px-5   my-5 required form-label">Select Month to attach payroll report to </label>
                    <select required name="Month" class="form-select  py-5   my-5 form-select-solid" data-control="select2"
                        data-placeholder="Select an option">
                        <option></option>
                        @isset($Months)

                        @foreach ($Months->unique('Month') as $data)
                        <option value="{{$data->Month}}">{{$data->Month}}</option>
                        @endforeach
                        @endisset

                    </select>

                </div>
                <div class="mb-3 col-md-6  py-5   my-5">
                    <label id="label" for="" class="px-5   my-5 required form-label">Select Year to attach payroll report to </label>
                    <select required name="Year" class="form-select  py-5   my-5 form-select-solid" data-control="select2"
                        data-placeholder="Select an option">
                        <option></option>
                        @isset($Years)

                        @foreach ($Years->unique('Year') as $data)
                        <option value="{{$data->Year}}">{{$data->Year}}</option>
                        @endforeach
                        @endisset

                    </select>

                </div>
                <div class="float-end my-3">
                    <button class="btn btn-danger btn-sm shadow-lg" type="submit">
                      Next
                    </button>
                </div>
            </form>


        </div>






</div>
