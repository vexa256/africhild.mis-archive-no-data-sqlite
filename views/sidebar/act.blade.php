<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
          <i class="fas fa-calendar" aria-hidden="true"></i>
        </span>
        <span class="menu-title">Staff Activity Plan</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php

        if (Auth::user()->role == "superadmin") {
        MenuItem($link=route('SelectTracker'), $label="Executive  Director");
         }


        MenuItem($link=route('CreateMyCategories'), $label="My Categories");

        MenuItem($link=route('CreateMyActivities'), $label="My Activities");

        MenuItem($link=route('SuperVisorAction'), $label="Supervisor Actions");










        ?>


    </div>
</div>
