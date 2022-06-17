	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewDoc", $Class="btn-danger", $Label="New Document", $Icon="fa-plus")}}
        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Contractor</th>
                    <th>Department</th>
                    <th>Expertise</th>
                    <th>Service Rendered</th>
                    <th>Document Title</th>
                    <th>Document Category</th>
                    <th>Description</th>
                    <th>Document</th>
                    <th>Delete</th>




                </tr>
            </thead>
            <tbody>
                @isset($Staff)
                @foreach ($Staff as $data )
                <tr>
                    <td>{{$data->Contractor}}</td>
                    <td>{{$data->Department}}</td>
                    <td>{{$data->Expertise}}</td>
                    <td>{{$data->ServiceRendered}}</td>
                    <td>{{$data->DocumentTitle}}</td>
                    <td>{{$data->DocumentCategory}}</td>
                    <td>
                        <a data-bs-toggle="modal" href="#ViewDesc{{$data->id}}" class="btn btn-danger btn-sm">
                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>

                    </td>

                    <td>
                        <a data-doc="  {{$data->DocumentTitle}} ({{$E->StaffName}})" data-source="{{ asset($data->DocURL) }}"  data-bs-toggle="modal" href="#PdfJS" class="btn btn-sm  PdfViewer btn-info"> <i class="fas fa-file-pdf" aria-hidden="true"></i> </a>
                      </td>




                    <td>
                        <a data-route="{{ route('DelDoc', ['id'=>$data->id]) }}" data-msg="You sure you want to delete this  document . This action  is not reversible"  class="btn btn-danger btn-sm  deleteConfirm" href="#">

                        <i class="fas fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>





                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>
@include('cons.NewDoc')
@include('cons.PDFJS')

{{DescModal($Staff, $Title="View description of the documentation attached to the selected contractor", $ModalID="ViewDesc")}}
