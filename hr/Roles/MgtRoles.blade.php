	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewRole", $Class="btn-danger", $Label="New Role", $Icon="fa-plus")}}
        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Role</th>
                    <th>Department</th>
                    <th>Role Description</th>
                    <th>Edit</th>
                    <th class="bg-dark text-light"> Actions</th>



                </tr>
            </thead>
            <tbody>
                @isset($Roles)
                @foreach ($Roles as $data )
                <tr>
                    <td>{{$data->Designation}}</td>
                    <td>{{$data->Department}}</td>
                    <td>
                        <a data-bs-toggle="modal" href="#RoleDesc{{$data->id}}" class="btn btn-sm btn-dark">
                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <a data-bs-toggle="modal" href="#Update{{$data->id}}" class="btn btn-sm btn-dark">
                            <i class="fas fa-edit" aria-hidden="true"></i>
                        </a>
                    </td>



                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                             Choose Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                              <li>
                                {{ConfirmBtn($data = [
                                    'msg'   => 'You want to delete this role, This action is not reversible!!',
                                    'route' => route('DelRole', ['id'=>$data->id]),
                                    'label' => 'Delete',
                                    'class' => 'dropdown-item deleteConfirm',

                                ])}}</li>

                            </ul>
                          </div>
                    </td>

                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>
    <!--end::Card body-->

    @include("Roles.Update")
    @include("Roles.NewRole")
    @include("Roles.Desc")



