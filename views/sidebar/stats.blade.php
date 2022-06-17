@if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'hrandfinance' || Auth::user()->role == 'projectmanager' )

<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-chart-bar fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Analytics  & Reports</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php

        MenuItem($link=route('GrantBVASelectYear'), $label="Grant BVA");

        MenuItem($link=route('GrantValidityAnalysis'), $label="Grant validity analysis");

        MenuItem($link=route('GrantValueAnalysis'), $label="Grant Value Analysis");

        MenuItem($link=route('SelectActivities'), $label="Activity Grant Impact");

        MenuItem($link=route('DonorContributions'), $label="Donor Contributions");



                /* MenuItem($link=route("DeptHeads"), $label="Non Payroll Benefits");*/




        ?>


    </div>
</div>


@endif


