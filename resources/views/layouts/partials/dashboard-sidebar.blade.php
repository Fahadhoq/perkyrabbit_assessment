        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Menu</li>
                   
                        <!-- employee start -->
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-pencil-ruler"></i> <span> Employee <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                            <ul class="submenu">
                                <li><a href="{{ route('employee.index') }}"> {{ __('Show All employee') }}</a></li>
                                <li><a href="{{ route('employee.create') }}"> {{ __('Create employee') }}</a></li>
                                
                            </ul>
                        </li>
                        <!-- employee end -->
 

                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->