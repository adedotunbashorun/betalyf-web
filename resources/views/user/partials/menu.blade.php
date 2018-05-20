<?php 
    $menu_id = (isset($menu_id)) ? $menu_id : "0.0";
    $menu_id = explode(".", $menu_id);
?>

<div class="left-sidebar">
            <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>                        
                <li class="nav-label">Home</li>
                @can('user')
                    <li> 
                        <a class="" href="{{ URL::route('home') }}" aria-expanded="false">
                            <i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span> 
                        </a>
                    </li>
                    <li> 
                        <a class="" href="{{ URL::route('beneficiaries.index') }}" aria-expanded="false">
                            <i class="fa fa-users"></i><span class="hide-menu">Clients</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ URL::route('users.profile') }}" aria-expanded="false">
                            <i class="fa fa-user"></i><span class="hide-menu">Profile</span>
                        </a>
                    </li>
                    <li> 
                        <a class="" href="{{ URL::route('activity.index') }}" aria-expanded="false">
                            <i class="fa fa-list"></i><span class="hide-menu">Activity Log</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>