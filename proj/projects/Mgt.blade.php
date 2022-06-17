<div class="card-body pt-3 bg-light shadow-lg table-responsive">
{!!Alert($icon = "fa-info", $class = "alert-primary", $Title = "Project Database", $Msg = "View all project records ")!!}

</div>



<div class="card-body shadow-lg pt-3 bg-light table-responsive">
{{ HeaderBtn($Toggle="NewGrant", $Class="btn-danger", $Label="New Project", $Icon="fa-plus")}}

<div class="col-md-12">

<table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
<thead>
    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

        <th class="bg-dark text-light">Project</th>
        <th class="bg-danger text-light">Grant</th>
        <th class="bg-dark text-light">Start Date</th>
        <th class="bg-dark text-light">Project Expiry</th>
        <th class="bg-dark text-light">Budget (UGX)</th>
        <th>Actions</th>



    </tr>
</thead>
<tbody>
    @isset($Projects)
    @foreach ($Projects as $data )
        <tr>

        <td class="bg-dark text-light">{{$data->ProjectName}}</td>
        <td class="bg-dark text-light">{{$data->Grant}}</td>
        <td>{{ date('j F, Y', strtotime($data->StartDate)) }} </td>
        <td>{{ date('j F, Y', strtotime($data->ProjectExpiry)) }} </td>

     <td class="bg-dark text-light">{{number_format($data->Budget, 2)}} UGX </td>




        <td class="row fs-6">

                <div class="dropdown">
                    <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a data-bs-toggle="modal"  href="#View{{$data->id}}" class="dropdown-item " >More Details</a></li>

                        <li><a  href="javascript:void(0);" data-route="{{ route('DelProj', ['id'=>$data->id]) }}" data-msg="You sure you want to delete this project."  class="dropdown-item deleteConfirm" >Delete Project</a></li>

                        <li><a data-bs-toggle="modal"  href="#Extend{{$data->id}}"  class="dropdown-item " >Extend Project Validity</a></li>





                    </ul>
                    </div>


        </td>
    </tr>
    @endforeach
    @endisset



</tbody>
</table>
</div>
</div>

@include('projects.New')
@include('projects.Desc')
@include('projects.Extend')
