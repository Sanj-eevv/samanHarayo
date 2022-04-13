<footer class="footer-area bg-gray">
    <div class="container pt-20 pb-20">
        <div class="row align-items-center flex-md-row-reverse gy-2">
            <div class="col-md-9">
                <div class="footer-menu">
                    <nav>
                        <ul>
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
