<header class="header-area">
    <div class="container">
                <div class="row d-flex justify-content-between align-items-center ">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-5">
                        <div class="logo">
                            <a href="{{route('front.index')}}">
                                <img src="{{asset('assets/logo.png')}}">
                            </a>
                        </div>
                    </div>
                    <div class="header-nav col-xl-6 col-lg-5">
                        <div class="main-menu">
                            <div class="mr-10"><a href="{{route('front.index')}}">HOME </a></div>
                            <div class="mr-10"><a href="#">LISTING </a></div>
                            <div class="mr-10"><a href="#">FAQ </a></div>
                            <div class="mr-10"><a href="#">ABOUT US </a></div>
                            <div class="mr-10"><a href="#">CONTACT </a></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-3 col-sm-6 col-5">
                        <div class="header-action">
                            <div class="header-search mr-20">
                                    <form action="#">
                                        <input placeholder="Search products…" type="text">
                                        <button class="button-search"><i class="icon-magnifier"></i></button>
                                    </form>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="header-user-icon mr-20">
                                <a href="{{route('login')}}"><i class="icon-user"></i></a>
                            </div>
                            <div>
                                <a class="front-logout red-btn" href="{{route('logout')}}">Logout</a>
                            </div>
                            @else
                            <div>
                                <a class="red-btn" href="{{route('login')}}">Login</a>
                            </div>
                            @endif
                            <div class="mobile-header-button-active ml-20">
                                <a href="#"><i class="icon-menu"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none;">@csrf</form>
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
            <div>
                <button class="button-red">Login</button>
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
