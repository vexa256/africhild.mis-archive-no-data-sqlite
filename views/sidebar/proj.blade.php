@if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'projectmanager')

<div data-kt-menu-trigger="click" class="menu-item menu-accordion ">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-project-diagram fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Project Management</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php

        MenuItem($link = route('MgtDonors'), $label = 'Donor Database');

        MenuItem($link = route('GrantDatabase'), $label = 'Grant Database');

        MenuItem($link = route('SelectGrant'), $label = 'Grant Documentation');

        MenuItem($link = route('GrantValidity'), $label = 'Grant Validity');

        //MenuItem($link=route('Projects'), $label="Projects Database");

        //MenuItem($link=route('ProjectValidity'), $label="Project Validity");

        MenuItem($link = route('SelectProjAct'), $label = 'Activity Database');

        MenuItem($link = route('MgtBroadCats'), $label = 'Broad Categories');

        // MenuItem($link=route('SelectGrantBVA'), $label="Grant BVA");

        ?>


    </div>
</div>
@endif
