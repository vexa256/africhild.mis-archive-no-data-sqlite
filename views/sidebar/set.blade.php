<div data-kt-menu-trigger="click" class="menu-item menu-accordion ">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas fa-cogs fs-3" aria-hidden="true"></i>
        </span>
        <span class="menu-title">User Settings</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php

        MenuItem($link = route('MgtUsers'), $label = 'User Database');

        // MenuItem($link=route('SelectGrantBVA'), $label="Grant BVA");

        ?>


    </div>
</div>
