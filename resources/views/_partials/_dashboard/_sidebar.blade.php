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
                <li class="menu-title">Admin options</li>
                @if (auth()->user()->isAdmin())
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
                @endcan
            </ul>


        </div>
        <!-- Sidebar -->
    </div>
</div>

