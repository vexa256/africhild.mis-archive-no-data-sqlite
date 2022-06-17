@include('users.Update')
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->


<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>

<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
@isset($TurnOffDataTables)
    <script defer type="text/javascript" src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js">
    </script>


@else
    <script defer src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>


@endisset




<script defer src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>

<script defer src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
<!--end::Global Javascript Bundle-->

<script defer src="https://cdn.tiny.cloud/1/1nr3t3t5xeyg86kk7vb6p7u0d9eo1w4zd7dy14p1volsp9ed/tinymce/5/tinymce.min.js"
referrerpolicy="origin"></script>

<script defer src="{{ asset('js/custom.js') }}"></script>
@include('not.not')
<script defer src="{{ asset('js/main.js') }}"></script>
<!--end::Javascript-->
@include('scripts.chartjs')

@isset($chart)

    {!! $chart->script() !!}

@endisset

@isset($chart2)

    {!! $chart2->script() !!}

@endisset
</body>
<!--end::Body-->

</html>
