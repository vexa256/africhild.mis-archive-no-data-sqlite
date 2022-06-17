	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewDoc", $Class="btn-danger", $Label="New Document", $Icon="fa-plus")}}
        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Grant Name</th>
                    <th>Document Category</th>
                    <th>Document Title</th>
                    <th>Description</th>
                    <th>Document</th>
                    <th>Delete</th>




                </tr>
            </thead>
            <tbody>
                @isset($Grants)
                @foreach ($Grants as $data )
                <tr>
                    <td>{{$data->GrantName}}</td>
                    <td>{{$data->DocumentCategory}}</td>
                    <td>{{$data->DocumentTitle}}</td>
                    <td>
                        <a data-bs-toggle="modal" href="#ViewDesc{{$data->id}}" class="btn btn-danger btn-sm">
                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>

                    </td>

                    <td>
                        <a data-doc="  {{$data->DocumentTitle}} ({{$E->GrantName}})" data-source="{{ asset($data->DocURL) }}"  data-bs-toggle="modal" href="#PdfJS" class="btn btn-sm  PdfViewer btn-info"> <i class="fas fa-file-pdf" aria-hidden="true"></i> </a>
                      </td>




                    <td>
                        <a data-route="{{ route('DelGrantDoc', ['id'=>$data->id]) }}" data-msg="You sure you want to delete this  document . This action  is not reversible"  class="btn btn-danger btn-sm  deleteConfirm" href="#">

                        <i class="fas fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>





                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>
@include('grants.NewDoc')

@include('grants.PDFJS')

{{DescModal($Grants, $Title="View description of the documentation attached to the selected grant", $ModalID="ViewDesc")}}
