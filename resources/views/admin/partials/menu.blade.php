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
                        @can('admin')
                        <li>
                             <a class="  " href="{{ URL::route('home') }}" aria-expanded="false">
                                <i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="  " href="{{ URL::route('permissions.index') }}" aria-expanded="false">
                                <i class="fa fa-briefcase"></i><span class="hide-menu">Permissions</span>
                            </a>
                        </li>
                        <li> 
                            <a class="  " href="{{ URL::route('roles.index') }}" aria-expanded="false">
                                <i class="fa fa-briefcase"></i><span class="hide-menu">Roles</span>
                            </a>
                        </li>
                        <li> 
                            <a class="  " href="{{ URL::route('users.index') }}" aria-expanded="false">
                                <i class="fa fa-briefcase"></i><span class="hide-menu">Users</span>
                            </a>
                        </li>
                        <li> 
                            <a class="  " href="{{ URL::route('informations.index') }}" aria-expanded="false">
                                <i class="fa fa-briefcase"></i><span class="hide-menu">Information</span>
                            </a>
                        </li>
                        <li> 
                            <a class="  " href="{{ URL::route('categories.index') }}" aria-expanded="false">
                                <i class="fa fa-briefcase"></i><span class="hide-menu">Hospital category</span>
                            </a>
                        </li>
                        <li> 
                            <a class="  " href="{{ URL::route('hospitals.index') }}" aria-expanded="false">
                                <i class="fa fa-briefcase"></i><span class="hide-menu">Hospitals</span>
                            </a>
                        </li>
                        <li>
                            <a class="  " href="{{ URL::route('disputeIndex') }}" aria-expanded="false">
                                <i class="fa fa-briefcase"></i><span class="hide-menu">Report Outbreak</span>
                            </a>
                        </li>
                        <li> 
                            <a class="  " href="{{ URL::route('activity.index') }}" aria-expanded="false">
                                <i class="fa fa-briefcase"></i><span class="hide-menu">Activity Logs</span>
                            </a>                        
                        </li>
                        <li> 
                            <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cogs">
                                </i><span class="hide-menu">System Settings<span class="label label-rouded label-primary pull-right">2</span></span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ URL::route('mailIndex') }}">Mail Settings</a></li>
                                <li><a href="{{ URL::route('generalSettingIndex') }}">General Settings</a></li>
                            </ul>
                        </li>
                        @endcan
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>