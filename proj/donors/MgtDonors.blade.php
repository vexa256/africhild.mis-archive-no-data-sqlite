<div class="card-body pt-3 bg-light table-responsive">
    {{ HeaderBtn($Toggle="NewDonor", $Class="btn-danger", $Label="New Donor", $Icon="fa-plus")}}


</div>
<div class="card-body shadow-lg pt-3 bg-light table-responsive">
    <div class="row">
        <div class="col-md-12">

            <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                        <th>Donor</th>
                        <th>Contact Person</th>
                        <th> Email</th>
                        <th> Phone</th>
                        <th> Address</th>
                        <th>Category</th>
                        <th>Country</th>
                        <th>Date Registered</th>
                        <th>Donor Details</th>
                        <th>Actions</th>



                    </tr>
                </thead>
                <tbody>
                    @isset($Donors)
                    @foreach ($Donors as $data )
                      <tr>

                        <td>{{$data->Name}}</td>
                        <td>{{$data->ContactPerson}}</td>
                        <td>{{$data->Email}}</td>
                        <td>{{$data->Phone}}</td>
                        <td>{{$data->Address}}</td>
                        <td>{{$data->Category}}</td>
                        <td>{{$data->Country}}</td>
                        <td>{{ date('j F, Y', strtotime($data->created_at)) }}
                        </td>
                        <td><a   data-bs-toggle="modal" href="#Details{{$data->id}}" class="btn btn-sm  btn-dark"> <i class="fas fa-binoculars" aria-hidden="true"></i> </a></td>

                        <td class="row fs-6">

                                <div class="dropdown">
                                    <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                      Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                      <li><a  href="javascript:void(0);" data-route="{{ route('DelDonor', ['id'=>$data->id]) }}" data-msg="You sure you want to delete this donor. This action is not reversible"  class="dropdown-item deleteConfirm" >Delete</a></li>
                                      <li><a data-bs-toggle="modal"  href="#UpDonor{{ $data->id }}" class="dropdown-item " >Update</a></li>




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


  </div>
  <!--end::Card body-->

  @include('donors.NewDonor')
  @include('donors.Details')
  @include('donors.Update')

