	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {!! Alert($icon = "fa-info", $class = "alert-primary", $Title = "User Account Management", $Msg = "Manage all  user accounts") !!}
    </div>
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewAcc", $Class="btn-danger", $Label="New User Account", $Icon="fa-plus")}}
        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Account Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Account Role</th>
                    <th>Date Created</th>
                    <th class="bg-dark text-light"> Delete</th>



                </tr>
            </thead>
            <tbody>
                @isset($User)
                @foreach ($User as $data )
                <tr>

                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->role}}</td>
                    <td>{{ date('j F, Y', strtotime($data->created_at)) }}
                    </td>



                    <td>

                            {!! ConfirmBtn($data = [
                                'msg'   => 'You want to delete this user  account',
                                'route' => route('DelUserAccount' , ['id' => $data->id]),
                                'label' => '<i class="fas fa-trash"></i>',
                                'class' => 'btn btn-danger btn-sm deleteConfirm',

                            ]) !!}

                    </td>





                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>
    <!--end::Card body-->


@include('users.New')
