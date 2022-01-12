<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span key="t-authentication">Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('users.index')}}" key="t-login">User Listing</a></li>
                        <li><a href="{{route('users.create')}}" key="t-login">Add User</a></li>
                    </ul>
                </li>
                <li class="menu-title" key="t-apps">Apps</li>

            </ul>


        </div>
        <!-- Sidebar -->
    </div>
</div>
