	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {!! Alert($icon = "fa-info", $class = "alert-primary", $Title = "Lets plan your activities", $Msg = "Create and manage your activity plans") !!}
    </div>
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="UpStatus", $Class="btn-dark", $Label="Alter Activity Status", $Icon="fa-edit")}}
        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Category</th>
                    <th>Activity</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Venue</th>
                    <th>Duration</th>
                    <th class="text-wrap">Supervisor Comments</th>
                    <th>Description</th>




                </tr>
            </thead>
            <tbody>
                @isset($Act)
                @foreach ($Act as $data )
                <tr>

                    <td>{{$data->Category}}</td>
                    <td>{{$data->Activity}}</td>
                    <td class="bg-danger text-light fw-bolder">{{$data->Month}}</td>
                    <td class="bg-danger text-light fw-bolder">{{$data->Year}}</td>
                    <td class="bg-dark  text-light fw-bolder">{!! date('d/M/Y', strtotime($data->StartDate)) !!}</td>
                    <td class="bg-dark text-light fw-bolder">{!! date('d/M/Y', strtotime($data->EndDate)) !!}</td>
                    <td class="bg-danger text-light fw-bolder">{{$data->Status}}</td>

                    <td>{{$data->ActivityLocation}}</td>

                    <td>{{$data->DurationInWeeks}} Weeks</td>
                    <td>{{ $data->SupervisorComment }}</td>



                    <td><a data-bs-toggle="modal" href="#Desc{{ $data->id }}" class="btn btn-sm btn-dark edit" href="#">
                        <i class="fas fa-binoculars" aria-hidden="true"></i>
                    </a>


                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>
    <!--end::Card body-->







    @isset($Act)
    @foreach ($Act as $data)
        <form novalidate action="{{ route('CMSUpdate') }}" class="" method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="row">
                <input type="hidden" name="id" value="{{ $data->id }}">

                <input type="hidden" name="TableName" value="trackings">




                {{ RunUpdateModal($ModalID = $data->id,$Extra ='  <div class="mb-3 pt-3 col-md-12 ">
                    <label id="label" for="" class="required form-label">Activity Status</label>
                    <select required name="Status" class="form-select form-select-solid" data-control="select2"
                        data-placeholder="Select an option">
                        <option></option>

                        <option value="Expired">Expired</option>
                        <option value="Ongoing">Ongoing</option>
                        <option value="Terminated">Terminated</option>
                        <option value="Concluded">Concluded</option>



                    </select>

                </div>',$csrf = null,$Title = 'Update the selected  record',$RecordID = $data->id,$col = '12',$te = '12',$TableName = 'trackings') }}
            </div>
        </form>
    @endforeach
@endisset


@include('Track.NewAct')

@include('Track.UpStatus')

@include('Track.ViewDesc', ['All' => $Act, 'column'=> 'Description'])
