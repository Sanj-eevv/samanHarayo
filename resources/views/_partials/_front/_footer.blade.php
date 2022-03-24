<footer class="footer-area bg-gray">
    <div class="container pt-20 pb-20">
        <div class="row align-items-center flex-md-row-reverse gy-2">
            <div class="col-md-9">
                <div class="footer-menu">
                    <nav>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="shop.html">Listing</a></li>
                            <li><a href="shop.html">Faq</a></li>
                            <li><a href="contact.html">About us</a></li>
                            <li><a href="blog.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-3">
                <div class="logo-container">
                    <div class="footer-logo">
                        <a href="{{route('front.index')}}">
                            <img class="img-fluid cover-image" src="{{asset('storage/uploads/settings/logo.png')}}">
                        </a>
                    </div>
                    <div class="copyright">
                        <span>Copyright © 2021 | <a href="#">{{config('app.name')}}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
