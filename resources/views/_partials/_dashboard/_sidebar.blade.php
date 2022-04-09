<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                @can('view',\App\Models\Contact::class)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span>Contact</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('contacts.index')}}">Contact Listing</a></li>
                    </ul>
                </li>
                @endcan
                @can('view',\App\Models\Faq::class)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span>Faqs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('faqs.index')}}">Faq Listing</a></li>
                        @can('create',\App\Models\Faq::class)
                        <li><a href="{{route('faqs.create')}}">Add Faq</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('view',\App\Models\Report::class)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('lost-reports.index')}}">Lost Report Listing</a></li>
                        <li><a href="{{route('found-reports.index')}}">Found Report Listing</a></li>
                    </ul>
                </li>
                @endcan
                @can('view',\App\Models\User::class)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('users.index')}}">User Listing</a></li>
                        <li><a href="{{route('users.create')}}">Add User</a></li>
                    </ul>
                </li>
                @endcan
                @if (auth()->user()->isAdmin())
                    <li class="menu-title">Admin Profile</li>
                @endif
                <li>
                    <a href="{{route('dashboard.user-report.index')}}">
                        <i class="bx bx-user-circle"></i>
                        <span> Reported Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.user-claim.index')}}">
                        <i class="bx bx-user-circle"></i>
                        <span> Claimed Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.user-notification.index')}}">
                        <i class="bx bx-user-circle"></i>
                        <span class="badge rounded-pill bg-info float-end" id="cust-notification">{{$GLOBAL_CUSTOMER_NOTIFICATION}}</span>
                        <span>Notifications</span>
                    </a>
                </li>
                @if (auth()->user()->isAdmin())
                <li class="menu-title">Admin options</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span>Roles</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('roles.index')}}">Role Listinsg</a></li>
                        <li><a href="{{route('roles.create')}}">Add Role</a></li>
                    </ul>
                </li>
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

