<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!! Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Grant Database', $Msg = 'View all grant records | PDF attachments are stored under grant documentation') !!}

</div>



<div class="card-body shadow-lg pt-3 bg-light table-responsive">
    {{ HeaderBtn($Toggle = 'NewGrant', $Class = 'btn-danger', $Label = 'New Grant', $Icon = 'fa-plus') }}

    <div class="col-md-12">

        <table class="table  mytable table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                    <th class="bg-dark text-light">Grant</th>
                    <th style="background-color: #ff8f00 !important " class="fw-bolder text-dark">Status</th>
                    <th class="bg-danger text-light">Start Date</th>
                    <th class="bg-danger text-light">End Date</th>
                    <th>Donor</th>
                    <th>Category</th>
                    <th class="bg-dark text-light">Original Amount</th>

                    <th class="bg-dark text-light">Original Currency</th>
                    <th class="bg-dark text-light">Original Rate</th>
                    <th class="bg-danger text-light">Amount (UGX)</th>
                    <th class="fw-bolder text-dark" style="background-color: #ff8f00 !important;">Available
                        (UGX)
                    </th>
                    <th class="fw-bolder text-dark" style="background-color: #ff8f00 !important;">Amount Spent (UGX)
                    </th>
                    <th>Grant Number</th>
                    <th>Actions</th>



                </tr>
            </thead>
            <tbody>
                @isset($Grants)
                    @foreach ($Grants as $data)
                        <tr>

                            <td class="bg-dark text-light">{{ $data->GrantName }}</td>
                            <td style="background-color: #ff8f00 !important;" class="fw-bolder text-dark">
                                {{ $data->status }}</td>
                            <td>{{ date('M-d-Y', strtotime($data->GrantStartDate)) }}
                            </td>
                            <td>{{ date('M-d-Y', strtotime($data->GrantExpiry)) }}
                            </td>

                            <td>{{ $data->Donor }}</td>
                            <td>{{ $data->GrantCategory }}</td>
                            <td class="bg-dark text-light">{{ number_format($data->OriginalAmount, 2) }}
                                {{ $data->OriginalCurrency }} </td>

                            <td class="bg-dark text-light"> {{ $data->OriginalCurrency }} </td>
                            <td class="bg-dark text-light">{{ number_format($data->OriginalExchangeRate, 2) }} </td>
                            <td class="bg-dark text-light">{{ number_format($data->AmountInUgx, 2) }} </td>
                            <td class="fw-bolder text-dark" style="background-color: #ff8f00 !important;">
                                {{ number_format($data->AvailableGrantAmountInUgx, 1) }}
                            </td>
                            <td class="fw-bolder text-dark" style="background-color: #ff8f00 !important;">
                                {{ number_format($data->GrantAmountAlreadySpentInUgx, 1) }}
                            </td>
                            <td>{{ $data->GrantNumber }}</td>



                            <td class="row fs-6">

                                <div class="dropdown">
                                    <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a data-bs-toggle="modal" href="#View{{ $data->id }}"
                                                class="dropdown-item ">More Details</a></li>

                                        <li><a data-bs-toggle="modal" href="#UpdateGrant{{ $data->id }}"
                                                class="dropdown-item ">Update Record</a></li>

                                        <li><a href="javascript:void(0);"
                                                data-route="{{ route('ReverseGrant', ['id' => $data->id]) }}"
                                                data-msg="You sure you want to delete this grant . "
                                                class="dropdown-item deleteConfirm">Delete Grant</a></li>

                                        <li><a data-bs-toggle="modal" href="#Extend{{ $data->id }}"
                                                class="dropdown-item ">Extend Grant Validity</a></li>





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

@include('grants.New')
@include('grants.Desc')
@include('grants.Extend')
@include('grants.Update')
