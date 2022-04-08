<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{route('customerDashboard.report')}}">
                        <i class="bx bx-user-circle"></i>
                        <span> Reported Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('customerDashboard.claim')}}">
                        <i class="bx bx-user-circle"></i>
                        <span> Claimed Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('customerDashboard.notification.index')}}">
                        <i class="bx bx-user-circle"></i>
                        <span class="badge rounded-pill bg-info float-end" id="cust-notification">{{$GLOBAL_CUSTOMER_NOTIFICATION}}</span>
                        <span>Notifications</span>
                    </a>
                </li>
            </ul>


        </div>
        <!-- Sidebar -->
    </div>
</div>










