<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!!Alert($icon = "fa-info", $class = "alert-primary", $Title = "Manage activity broad categories", $Msg = "These categories are used when creating activity costs" )!!}

    </div>



    <div class="card-body shadow-lg pt-3 bg-light table-responsive">
    {{ HeaderBtn($Toggle="NewCat", $Class="btn-danger", $Label="New Category Activity", $Icon="fa-plus")}}

    <div class="col-md-12">

    <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
    <thead>
    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

        <th class="bg-dark text-light">Broad Category</th>
        <th class="bg-dark text-light">Units</th>
        <th>Delete</th>



    </tr>
    </thead>
    <tbody>
    @isset($BroadCategories)
    @foreach ($BroadCategories as $data )
        <tr>

        <td class="bg-dark text-light">{{$data->BroadCategory}}</td>
        <td class="bg-dark text-light">{{$data->MeasurementUnits}}</td>

        <td class="bg-dark text-light">
            <a href="#" data-route="{{ route('DelBroadCat', ['id'=>$data->id]) }}" data-msg="You sure you want to delete this activity broad category . "  class="btn btn-danger btn-sm deleteConfirm" >
                Trash
            </a>
        </td>
    </tr>
    @endforeach
    @endisset



    </tbody>
    </table>
    </div>
    </div>


    @include('activities.NewCat')
