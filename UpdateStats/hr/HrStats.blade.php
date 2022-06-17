<div class="col-md-12">
    <!--begin::Tables Widget 9-->
    <div class="card card-xl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Hello {{ Auth::user()->name }}, Here is your realtime HR and Finance report
                    </span>
                <span class="text-muted mt-1 fw-bold fs-7">Human Resource and Finance stats</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title=""
                data-bs-original-title="Click to add a user">

            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted">

                            <th class="min-w-150px">Metric</th>
                            <th class="min-w-140px">Value</th>

                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                       <i class="fas fa-3x text-danger fw-bolder fa-users" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Staff Contracts</a>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">Active Staff Contracts</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-danger  fw-bolder text-hover-primary d-block fs-1">{{ $ActiveEmp }}</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7"> Active Staff Contracts</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                       <i class="fas fa-3x text-danger fw-bolder fa-calendar" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Soon Expiring</a>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">Staff Contracts</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-danger  fw-bolder text-hover-primary d-block fs-1">{{ $EmpSoonExpire }}</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7"> Soon Expiring Staff Contracts</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                       <i class="fas fa-3x text-danger fw-bolder fa-clock" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Expired</a>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">Staff Contracts</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-danger  fw-bolder text-hover-primary d-block fs-1">{{ $ExpEmp }}</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7"> Soon Expired Staff Contracts</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                       <i class="fas fa-3x text-danger fw-bolder fa-money-check-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Valid</a>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">Grants</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-danger  fw-bolder text-hover-primary d-block fs-1">{{ $ValidGrants }}</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7"> Valid Grants</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                       <i class="fas fa-3x text-danger fw-bolder fa-people-carry" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Tracked </a>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">Donors</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-danger  fw-bolder text-hover-primary d-block fs-1">{{ $Donors }}</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7">  Donors Records</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                       <i class="fas fa-3x text-danger fw-bolder fa-user" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Soon Expiring </a>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">Contractor Contracts</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-danger  fw-bolder text-hover-primary d-block fs-1">{{ $ConSoonExpire }}</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7">  Contractor Contracts</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                       <i class="fas fa-3x text-danger fw-bolder fa-user-tag" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Active </a>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">Contractor Contracts</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-danger  fw-bolder text-hover-primary d-block fs-1">{{ $ActiveCon }}</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7">  Contractor Contracts</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                       <i class="fas fa-3x text-danger fw-bolder fa-user-tag" aria-hidden="true"></i>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Expired </a>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">Contractor Contracts</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-danger  fw-bolder text-hover-primary d-block fs-1">{{ $ExpCon }}</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7">  Contractor Contracts</span>
                            </td>

                        </tr>

                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 9-->
</div>
