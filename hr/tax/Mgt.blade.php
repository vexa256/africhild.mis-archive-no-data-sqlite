	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {!! Alert($icon = "fa-info", $class = "alert-primary", $Title = "Salary Taxes", $Msg = "Manage all supported salary taxes") !!}
    </div>
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="New", $Class="btn-danger", $Label="New Tax", $Icon="fa-plus")}}
        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Tax</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th class="bg-dark text-light"> Delete</th>



                </tr>
            </thead>
            <tbody>
                @isset($Taxes)
                @foreach ($Taxes as $data )
                <tr>

                    <td>{{$data->Tax}}</td>
                    <td>{{$data->Percentage}} %</td>
                    <td>

                        <a data-bs-toggle="modal"  class="btn btn-danger btn-sm" href="#ViewDesc{{$data->id}}">

                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>

                    </td>

                    <td><a data-bs-toggle="modal" href="#Update{{ $data->id }}" class="btn btn-sm btn-dark edit" href="#">
                        <i class="fas fa-edit" aria-hidden="true"></i>
                    </a>

                   </td>
                    <td>

                            {!! ConfirmBtn($data = [
                                'msg'   => 'You want to delete this tax  category',
                                'route' => route('DelTax' , ['id' => $data->id]),
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



    @include('tax.New')

    {{DescModal($Taxes, $Title="View the description  attached to selected salary tax", $ModalID="ViewDesc")}}
