@if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'hrandfinance')
<div data-kt-menu-trigger="click" class="menu-item menu-accordion ">
    <span class="menu-link">
        <span class="menu-icon">
            <i  class="fas fa-users-cog fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Leave Portal</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php

        MenuItem($link = route('LeaveSettings'), $label = 'Leave Categories');

        MenuItem($link = route('AssignLeave'), $label = 'Leave Assignment');

        MenuItem($link = route('SelectLeaveApply'), $label = 'Leave Dashboard');

        MenuItem($link = route('LeaveApproval'), $label = 'Leave Approvals');

        MenuItem($link = route('HRDash'), $label = 'HR Leave Portal');

        ?>


    </div>
</div>
@endif
