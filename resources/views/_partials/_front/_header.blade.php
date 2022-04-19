<header class="header-area">
    <div id="sh_nav_bar">
        <div class="container header-container-flex-box">
            <div class="logo">
                <a href="{{route('front.index')}}">
                    <img class="img-fluid" src="{{asset('storage/uploads/settings/'.config('app.settings.app_logo'))}}" alt="">
                </a>
            </div>
            <div class="header-nav">
                   <a class="underlined-link {{Request::segment(1) === null ? 'active' : ''}}" href="{{route('front.index')}}">HOME </a>
                   <a class="underlined-link {{Request::segment(1) === 'listing' ? 'active' : ''}}" href="{{route('front.listing')}}">LISTING </a>
                   <a class="underlined-link {{Request::segment(1) === 'faqs' ? 'active' : ''}}" href="{{route('front.faqs.index')}}">FAQs </a>
{{--                   <a class="underlined-link {{Request::segment(1) === 'about' ? 'active' : ''}}" href="#">ABOUT US </a>--}}
                   <a class="underlined-link {{Request::segment(1) === 'contact' ? 'active' : ''}}" href="{{route('front.contact.index')}}">CONTACT </a>
            </div>
            <div class="header-action">
                <div class="header-search">
                        <form action="{{route('front.search')}}" method="get">
                            <label>
                                <input placeholder="Search products…"  value="{{old('search')}}" type="text" name="search">
                            </label>
                            <button class="button-search" type="submit"><i class="icon-magnifier"></i></button>
                        </form>
                </div>
                @auth
                    <a class="desktop front-logout sh-btn" href="{{route('logout')}}">Logout</a>
                    <a href="{{route('profile.index')}}" class="header-user-icon">
                        <span>{{auth()->user()->initialLettersOfName()}}</span>
{{--                        <img class="img-fluid" alt="" src="{{$img_src}}">--}}
                    </a>
                @else
                    <a class="desktop front-login sh-btn" href="{{route('login')}}">Login</a>
                @endauth
                    <div class="mobile-header-button-active">
                        <a href="#"><i class="icon-menu"></i></a>
                    </div>
            </div>
        </div>
    </div>
    <hr class="m-0">
    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">@csrf</form>
</header>
<div class="mobile-header-active">
    <div class="clickalbe-sidebar-wrap">
        <a class="sidebar-close"><i class="icon_close"></i></a>
        <div class="mobile-header-content-area">
            <div class="mobile-search mobile-header-padding-border-1">
                <form class="search-form" action="{{route('front.search')}}" method="get">
                    <input placeholder="Search here…" value="{{old('search')}}" type="text" name="search">
                    <button class="button-search" type="submit"><i class="icon-magnifier"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-padding-border-2">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li>
                            <a class="underlined-link {{Request::segment(1) === null ? 'active' : ''}}" href="{{route('front.index')}}">HOME </a>
                        </li>
                        <li>
                            <a class="underlined-link {{Request::segment(1) === 'listing' ? 'active' : ''}}" href="{{route('front.listing')}}">LISTING </a>
                        </li>
                        <li>
                            <a class="underlined-link {{Request::segment(1) === 'faqs' ? 'active' : ''}}" href="{{route('front.faqs.index')}}">FAQs </a>
                        </li>
                        <li>
                            <a class="underlined-link {{Request::segment(1) === 'contact' ? 'active' : ''}}" href="{{route('front.contact.index')}}">CONTACT </a>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-padding-border-2">
                @auth
                    <a class="mobile front-logout sh-btn" href="{{route('logout')}}">Logout</a>
                @else
                    <a class="mobile front-login sh-btn" href="{{route('login')}}">Login</a>
                @endauth
            </div>
            <div class="mobile-contact-info mobile-header-padding-border-4">
                <ul>
                    <li><i class="icon-phone "></i>{{config('app.settings.contact_phone')}}</li>
                    <li><i class="icon-envelope-open "></i>{{config('app.settings.contact_email')}}</li>
                    <li><i class="icon-home"></i>{{config('app.settings.company_address')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
