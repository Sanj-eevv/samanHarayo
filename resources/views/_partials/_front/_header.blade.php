<header class="header-area">
    <div id="sh_nav_bar">
        <div class="container header-container-flex-box">
            <div class="logo">
                <a href="{{route('front.index')}}">
                    <img class="img-fluid" src="{{asset('assets/logo.png')}}" alt="">
                </a>
            </div>
            <div class="header-nav">
                   <a class="underlined-link" href="{{route('front.index')}}">HOME </a>
                   <a class="underlined-link" href="#">LISTING </a>
                   <a class="underlined-link" href="#">FAQ </a>
                   <a class="underlined-link" href="#">ABOUT US </a>
                   <a class="underlined-link" href="#">CONTACT </a>
            </div>
            <div class="header-action">
                <div class="header-search">
                        <form action="#">
                            <label>
                                <input placeholder="Search products…" type="text">
                            </label>
                            <button class="button-search"><i class="icon-magnifier"></i></button>
                        </form>
                </div>
                @if(auth()->check())
                    <a class="front-logout red-btn" href="{{route('logout')}}">Logout</a>
                    <a href="#" class="header-user-icon">
                        <img class="img-fluid" alt="" src="{{asset('assets/images/users/avatar-1.jpg')}}">
                    </a>
                @else
                    <a class="red-btn" href="{{route('login')}}">Login</a>
                @endif
                    <div class="mobile-header-button-active">
                        <a href="#"><i class="icon-menu"></i></a>
                    </div>
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none;">@csrf</form>
</header>
<div class="mobile-header-active">
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
            </div>
        </div>
    </div>
</div>
