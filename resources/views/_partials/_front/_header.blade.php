<header class="header-area transparent-bar section-padding-1">
    <div class="container">
        <div class="header-large-device">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href="{{route('front.index')}}"><img src="{{asset('storage/uploads/settings/header_logo.png')}}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="main-menu main-menu-padding-1 main-menu-lh-1">
                            <nav>
                                <ul>
                                    <li><a href="index.html">HOME </a>
                                    </li>
                                    <li><a href="shop.html">LISTING </a>
                                    </li>
                                    <li><a href="#">FAQ </a>
                                    </li>
                                    <li><a href="blog.html">ABOUT US </a>
                                    </li>
                                    <li><a href="contact.html">CONTACT </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3">
                        <div class="header-action header-action-flex">
                            <div class="same-style header-search-1">
                                <div class="search-wrap-1">
                                    <form action="#">
                                        <input placeholder="Search products…" type="text">
                                        <button class="button-search"><i class="icon-magnifier"></i></button>
                                    </form>
                                </div>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="same-style">
                                <a href="{{route('login')}}"><i class="icon-user"></i></a>
                            </div>
                            @else
                            <div class="same-style same-style-login">
                                <a href="{{route('login')}}">Login</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
        <div class="header-medium-device medium-device-ptb-1">
            <div class="row align-items-center">
                <div class="col-5">
                    <div class="mobile-logo">
                        <a href="{{route('front.index')}}">
                            <img alt="" src="{{asset('storage/uploads/settings/header_logo.png')}}">
                        </a>
                    </div>
                </div>
                <div class="col-7">
                    <div class="header-action header-action-flex">
                        <div class="same-style header-search-1">
                            <div class="search-wrap-1 open">
                                <form action="#">
                                    <input placeholder="Search products…" type="text">
                                    <button class="button-search"><i class="icon-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="same-style">
                                <a href="{{route('login')}}"><i class="icon-user"></i></a>
                            </div>
                        @else
                            <div class="same-style same-style-login">
                                <a href="{{route('login')}}">Login</a>
                            </div>
                        @endif
                        <div class="same-style main-menu-icon">
                            <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-small-device small-device-ptb-1">
            <div class="row align-items-center">
                <div class="col-5">
                    <div class="mobile-logo">
                        <a href="{{route('front.index')}}">
                            <img alt="" src="{{asset('storage/uploads/settings/header_logo.png')}}">
                        </a>
                    </div>
                </div>
                <div class="col-7">
                    <div class="header-action header-action-flex">
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="same-style">
                                <a href="{{route('login')}}"><i class="icon-user"></i></a>
                            </div>
                        @else
                            <div class="same-style same-style-login">
                                <a href="{{route('login')}}">Login</a>
                            </div>
                        @endif
                        <div class="same-style main-menu-icon">
                            <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="clickalbe-sidebar-wrap">
        <a class="sidebar-close"><i class="icon_close"></i></a>
        <div class="mobile-header-content-area">
            <div class="mobile-search mobile-header-padding-border-1">
                <form class="search-form" action="#">
                    <input type="text" placeholder="Search here…">
                    <button class="button-search"><i class="icon-magnifier"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-padding-border-2">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><a href="index.html">Home</a>
                        </li>
                        <li class="menu-item-has-children "><a href="#">Listing</a>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Faq</a>
                        </li>
                        <li class="menu-item-has-children "><a href="#">About Us</a>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-contact-info mobile-header-padding-border-4">
                <ul>
                    <li><i class="icon-phone "></i> (+612) 2531 5600</li>
                    <li><i class="icon-envelope-open "></i> norda@domain.com</li>
                    <li><i class="icon-home"></i> PO Box 1622 Colins Street West Australia</li>
                </ul>
            </div>
            <div class="mobile-social-icon">
                <a class="facebook" href="#"><i class="icon-social-facebook"></i></a>
                <a class="twitter" href="#"><i class="icon-social-twitter"></i></a>
                <a class="pinterest" href="#"><i class="icon-social-pinterest"></i></a>
                <a class="instagram" href="#"><i class="icon-social-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
