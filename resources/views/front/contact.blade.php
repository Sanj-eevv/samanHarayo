@extends('layouts.front')
@section('content')
    <div class="contact-area pt-25">
        <div class="container">
            <div class="contact-info mb-40">
                <h3 class="sh-title mb-40">contact info</h3>
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-4">
                        <div class="single-contact text-center">
                            <i class="icon-location-pin"></i>
                            <h4>our address</h4>
                            <p>{{config('app.settings.company_address')}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-contact text-center">
                            <i class="icon-screen-smartphone"></i>
                            <h4>our Phone</h4>
                            <p><a class="tel:{{config('app.settings.contact_phone')}}">{{config('app.settings.contact_phone')}}</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-contact text-center">
                            <i class="icon-envelope "></i>
                            <h4>our Email</h4>
                            <p><a href="mailto:{{config('app.settings.admin_email')}}">{{config('app.settings.admin_email')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="map" class="mb-70 mt-70">
                <iframe
                    style="border:0; height: 100%; width: 100%;"
                    loading="lazy"
                    src="https://www.google.com/maps/embed/v1/place?key={{config('services.google_map.api_key')}}&q={{config('app.settings.company_address')}}&zoom=18">
                </iframe>
            </div>
            <div class="get-in-touch-wrap pb-70">
                <h3 class="sh-title mb-40">Get In Touch</h3>
                <div class="contact-from">
                    <form action="{{route('front.contact.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 from-group">
                                <label class="w-100" for="name">
                                    <input name="name" class="form-control @error('name')is-invalid @enderror" type="text" placeholder="Name" value="{{old('name')}}">
                                    @error('name')
                                    <span class="text-danger mt-1 d-inline-block" role="alert">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="w-100">
                                    <input name="email" class="form-control @error('email')is-invalid @enderror" type="email" placeholder="Email">
                                    @error('email')
                                    <span class="text-danger mt-1 d-inline-block" role="alert">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="w-100">
                                    <input name="question" class="form-control @error('question')is-invalid @enderror" type="text" placeholder="Ask a question"/>
                                    @error('question')
                                    <span class="text-danger mt-1 d-inline-block" role="alert">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="w-100">
                                    <textarea name="message" class="form-control @error('message')is-invalid @enderror" placeholder="Your Message"></textarea>
                                    @error('message')
                                    <span class="text-danger mt-1 d-inline-block" role="alert">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="submit sh-btn" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

