	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {!! Alert($icon = "fa-info", $class = "alert-primary", $Title = "Your activity categories", $Msg = "Create and manage your activity categories") !!}
    </div>
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="New", $Class="btn-danger", $Label="New Category", $Icon="fa-plus")}}
        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Category</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th class="bg-dark text-light"> Delete</th>



                </tr>
            </thead>
            <tbody>
                @isset($Cat)
                @foreach ($Cat as $data )
                <tr>

                    <td>{{$data->Category}}</td>
                    <td>{{$data->Description}}</td>


                    <td><a data-bs-toggle="modal" href="#Update{{ $data->id }}" class="btn btn-sm btn-dark edit" href="#">
                        <i class="fas fa-edit" aria-hidden="true"></i>
                    </a>

                   </td>
                   <td>

                    <a data-route="{{ route('MassDelete', ['id' => $data->id, 'TableName' => 'tracking_categories']) }}"
                        data-msg="You want to delete this record. This action is not reversible" href="#"
                        class="btn deleteConfirm btn-danger btn-sm btn-shadow"> <i
                            class="fas me-1  fa-trash" aria-hidden="true"></i> Delete </a>
                </td>





                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>
    <!--end::Card body-->







    @isset($Cat)
    @foreach ($Cat as $data)
        <form novalidate action="{{ route('CMSUpdate') }}" class="" method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="row">
                <input type="hidden" name="id" value="{{ $data->id }}">

                <input type="hidden" name="TableName" value="tracking_categories">


                {{ RunUpdateModal($ModalID = $data->id,$Extra =null,$csrf = null,$Title = 'Update the selected  record',$RecordID = $data->id,$col = '12',$te = '12',$TableName = 'tracking_categories') }}
            </div>
        </form>
    @endforeach
@endisset


@include('Track.NewCat')
