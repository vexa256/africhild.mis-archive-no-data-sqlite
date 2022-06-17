@if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'hrandfinance')

<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
            <i  class="fas fa-people-carry fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">HR Actions</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php
        MenuItem($link = route('MgtDepts'), $label = 'Departments');

        MenuItem($link = route('MgtRoles'), $label = 'Staff Roles');

        // MenuItem($link='#', $label="Department Heads");

        MenuItem($link = route('MgtEmp'), $label = 'Staff Database');

        MenuItem($link = route('ExpiredCons'), $label = 'Expired Contracts');

        MenuItem($link = route('SoonExpiring'), $label = 'Soon Expiring Contracts');

        MenuItem($link = route('SelectStaffDocs'), $label = 'Staff Documentation');

        MenuItem($link = route('ConTrack'), $label = 'Contract Tracking');

      //  MenuItem($link = route('Noticeboard'), $label = 'Staff Noticeboard');

        MenuItem($link = route('SelectStaffNOK'), $label = 'Next of Kins');

        MenuItem($link = route('MgtBenefits'), $label = 'Staff Benefits');

        MenuItem($link = route('SelectBenStaff'), $label = 'Staff Beneficiaries');

        /* MenuItem($link=route("DeptHeads"), $label="Non Payroll Benefits");*/

        ?>


    </div>
</div>

<div data-kt-menu-trigger="click" class="menu-item menu-accordion ">
    <span class="menu-link">
        <span class="menu-icon" >
            <i   class="fas fa-money-bill-wave-alt fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Finance Actions</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php

        MenuItem($link = route('MgtDeductions'), $label = 'Salary Deductions');

        MenuItem($link = route('MgtTaxes'), $label = 'Salary Taxation');

        MenuItem($link = route('MgtBenefitsSalary'), $label = 'Salary Benefits');

        MenuItem($link = route('SelectStaffPay'), $label = 'Payroll Settings');

        MenuItem($link = route('SelectStaffExecPay'), $label = 'Execute Payroll');

        MenuItem($link = route('SelectMonthRep'), $label = 'Payroll Report (Monthly)');

        //MenuItem($link='#', $label="Staff Expenses");

        MenuItem($link = route('SelectGrantActCost'), $label = 'Activity Costing');

        /* MenuItem($link=route("DeptHeads"), $label="Non Payroll Benefits");*/

        ?>


    </div>
</div>

<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
            <i  class="fas fa-user-tie fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Contractors</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php

        MenuItem($link = route('MgtCons'), $label = 'Contractor Database');

        MenuItem($link = route('SelectConDocs'), $label = 'Documentation');

        MenuItem($link = route('ContractorConTrack'), $label = 'Contract Tracking');

        MenuItem($link = route('ConSoonExpiring'), $label = 'Soon Expiring Contracts');

        MenuItem($link = route('ConExpiredCons'), $label = 'Expired Contracts');

        /* MenuItem($link=route("DeptHeads"), $label="Non Payroll Benefits");*/

        ?>


    </div>
</div>


@endif
