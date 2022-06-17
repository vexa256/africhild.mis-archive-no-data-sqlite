<div class="row g-5 g-xl-8">

    <div class="col">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotone/Home/Building.svg-->
                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                    <i class="fas fa-file-invoice-dollar fa-2x" aria-hidden="true"></i>
                </span>
                <!--end::Svg Icon-->
                <div class="text-inverse-dark fw-bolder fs-6  mb-2 mt-5">{{number_format($Deductions,2)}} UGX</div>
                <div class="fw-bold text-inverse-dark fs-7">Total Deductions</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
    <div class="col">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotone/Home/Building.svg-->
                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                    <i class="fas fa-file-invoice-dollar fa-2x" aria-hidden="true"></i>
                </span>
                <!--end::Svg Icon-->
                <div class="text-inverse-dark fw-bolder fs-6  mb-2 mt-5">{{
                        number_format($TaxableAmount)
                    }} UGX</div>
                <div class="fw-bold text-inverse-dark fs-7">Total Taxes</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
    <div class="col">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-info hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotone/Home/Building.svg-->
                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                    <i class="fas fa-file fa-2x" aria-hidden="true"></i>
                </span>
                <!--end::Svg Icon-->
                <div class="text-inverse-dark fw-bolder fs-6  mb-2 mt-5">{{  number_format($Benefits)}} UGX</div>
                <div class="fw-bold text-inverse-dark fs-7">Total Benefits</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>


    <div class="col">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotone/Home/Building.svg-->
                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                    <i class="fas fa-calculator fa-2x" aria-hidden="true"></i>
                </span>
                <!--end::Svg Icon-->
                <div class="text-inverse-dark fw-bolder fs-6  mb-2 mt-5">{{number_format($NetSalary, 2)}} UGX</div>
                <div class="fw-bold text-inverse-dark fs-7">Net Salary</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>

    <div class="col">
        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Svg Icon | path: icons/duotone/Home/Building.svg-->
                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                    <i class="fas fa-calculator fa-2x" aria-hidden="true"></i>
                </span>
                <!--end::Svg Icon-->
                <div class="text-inverse-dark fw-bolder fs-6  mb-2 mt-5">{{number_format($Salary, 2)}} UGX</div>
                <div class="fw-bold text-inverse-dark fs-7">Gross Salary</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>

</div>
