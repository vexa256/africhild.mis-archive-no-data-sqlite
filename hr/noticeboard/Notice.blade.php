	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light table-responsive">

        {{ HeaderBtn($Toggle="New", $Class="btn-danger", $Label="New Notice", $Icon="fa-plus")}}


    </div>
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">




{!!Alert($icon = "fa-info", $class = "alert-primary", $Title = "Staff Noticeboard", $Msg = "For notices with attachments, please check your group mail")!!}

        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Sender</th>
                    <th class="bg-dark text-light">Subject</th>
                    <th class="bg-dark text-light">Has attachment</th>
                    <th class="bg-dark text-light">Date Sent</th>
                    <th class="bg-dark text-light">Message</th>




                </tr>
            </thead>
    <tbody>
        @isset($Nots)
        @foreach ($Nots as $data )
        <tr>
            <td>{{$data->SenderName}}</td>
            <td class="bg-danger text-light"> {{$data->Subject}} </td>
            <td class="bg-danger text-light"> {{$data->HasAttachement}} </td>
            <td>{!! date('F j, Y', strtotime($data->created_at)) !!}
            </td>

            <td><a data-bs-toggle="modal" href="#ViewNote{{ $data->id }}" class="btn btn-danger btn-sm">

                <i class="fas fa-binoculars" aria-hidden="true"></i>
            </a></td>




        </tr>
        @endforeach
        @endisset



    </tbody>
        </table>
    </div>


    @include('noticeboard.New')

@isset($Nots)

{!!  DescModal($Nots, $Title="View the message attached to the selected notification", $ModalID="ViewNote") !!}
@endisset

