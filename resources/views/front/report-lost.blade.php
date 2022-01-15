@extends('layouts.front')
@section('content')
    @include('utils._error_all')
{{--    <div class="slider-area">--}}
{{--        <div class="container">--}}
{{--            <div class="hero-slider-active bg-gray-7" data-aos="fade-up" data-aos-duration="1600">--}}
{{--                <div class="single-hero-slider slider-height d-flex single-animation-wrap slider-animated">--}}
{{--                    <div class="hero-slider-content">--}}
{{--                        <div>--}}
{{--                            <h5>Item Lost</h5>--}}
{{--                            <h1>Laptop Lenovo Ideapad 530s</h1>--}}
{{--                            <p class="content">A laptop was found at Itahari near Vishwa Adarsha college.A laptop was found at Itahari near Vishwa Adarsha college. Adarsha college.</p>--}}
{{--                            <p class="more"><a href="#"><span>More Details</span></a></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="hero-slider-img">--}}
{{--                        <img class="img-fluid" src="{{asset('storage/uploads/featured/Laptop.jpg')}}" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="single-hero-slider slider-height d-flex single-animation-wrap slider-animated">--}}
{{--                    <div class="hero-slider-content">--}}
{{--                        <div>--}}
{{--                            <h5>Item Lost</h5>--}}
{{--                            <h1>Laptop Lenovo Ideapad 530s</h1>--}}
{{--                            <p class="content">A laptop was found at Itahari near Vishwa Adarsha college.A laptop was found at Itahari near Vishwa Adarsha college. Adarsha college.</p>--}}
{{--                            <p class="more"><a href="#"><span>More Details</span></a></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="hero-slider-img">--}}
{{--                        <img class="img-fluid" src="{{asset('storage/uploads/featured/h.jfif')}}" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="checkout-main-area pb-50">
        <div class="container">
            <div class="row">
                <div class="report-lost-title d-flex">
                    <h2>Report Details</h2>
                </div>
            </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('report-lost.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="report-form-container">
                                    <div class="report-form-product-details">
                                        <div class="row mb-20">
                                            <div class="col-lg-6">
                                                <label class="form-label">Item name<abbr class="required" title="required">*</abbr></label>
                                                <div class="input-div">
                                                    <span class="input-div-icon"><i class="fas fa-people-carry"></i></span>
                                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label">Brand</label>
                                                <div class="input-div">
                                                    <span class="input-div-icon"><i class="fas fa-building"></i></span>
                                                    <input class="form-control @error('brand') is-invalid @enderror" type="text" name="brand" value="{{old('brand')}}">
                                                    @error('brand')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{$message}}
                                                    </span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mb-20">
                                            <div class="col-lg-6">
                                                <label class="form-label">Contact Email</label>
                                                <div class="input-div">
                                                    <span class="input-div-icon"><i class="fas fa-envelope"></i></span>
                                                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{old('email',auth()->user()->email)}}">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                            {{$message}}
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mt-lg-0">
                                                <label class="form-label">Contact Phone</label>
                                                <div class="input-div">
                                                    <span class="input-div-icon"><i class="fas fa-phone"></i></span>
                                                    <input class="numeric form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{old('phone')}}">
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                            {{$message}}
                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-20">
                                            <div class="col-lg-12">
                                                <label class="form-label">Category</label>
                                                <div class="input-div">
                                                    <span class="input-div-icon"><i class="fas fa-braille"></i></span>
                                                    <select class="@error('category') is-invalid @enderror" name="category">
                                                        <option>Select a category</option>
                                                        @foreach ($categories as $category)
                                                            <?php
                                                            if(old('category') == $category->id){
                                                                $selected = 'selected';
                                                            }else{
                                                                $selected = '';
                                                            }
                                                            ?>
                                                            <option value="{{ $category->id }}" {{ $selected }}>{{ ucwords($category->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category')
                                                    <span class="invalid-feedback" role="alert">
                                            {{$message}}
                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-20">
                                            <div class="col-lg-12">
                                                <label class="form-label">Images</label>
                                                <div class="input-images @error('product_photo') is-invalid @enderror"></div>
                                                @error('product_photo')
                                                <span class="invalid-feedback" role="alert">
                                                        {{$message}}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mb-20">
                                                <label>Product Description<abbr class="required" title="required">*</abbr></label>
                                                <textarea class="form-control @error('description')is-invalid @enderror" placeholder="Give more details about your product" name="description">{{old('description')}}</textarea>
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        @include('front._google-map')
                                        <div class="row mb-20">
                                            <div class="col-lg-6">
                                                <div class="form-check mb-10">
                                                    <input type="checkbox" id="rewardCheckBox" name="rewardCheckBox" value="true" {{old('rewardCheckBox')? 'checked' : ''}}>
                                                    <label for="rewardCheckBox">Reward</label>
                                                </div>
                                                <div class="input-div rewardInput">
                                                    <span class="input-div-icon"><i class="fas fa-dollar-sign"></i></span>
                                                    <input class="form-control @error('reward_amount') is-invalid @enderror" type="text" placeholder="Reward Amount in USD" name="reward_amount" value="{{old('reward_amount')}}">
                                                    @error('reward_amount')
                                                    <span class="invalid-feedback" role="alert">
                                                    {{$message}}
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check mb-10">
                                                    <input type="checkbox" id="featureCheckBox" name="featureCheckBox" value="true" {{old('featureCheckBox') ? 'checked' : ''}}>
                                                    <label for="featureCheckBox">Feature Report</label>
                                                    <span  data-toggle="tooltip" data-placement="top" title="$3/day"><i class="fas fa-info-circle"></i></span>
                                                </div>
                                                <div class="input-div featureReportInput">
                                                    <span class="input-div-icon"><i class="fas fa-funnel-dollar"></i></span>
                                                    <input class="form-control @error('feature_report_duration') is-invalid @enderror " type="text" placeholder="No of days" name="feature_report_duration" value="{{old('feature_report_duration')}}">
                                                    @error('feature_report_duration')
                                                    <span class="invalid-feedback" role="alert">
                                                    {{$message}}
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Place-order">
                                            <button type="submit">Proceed To Payment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

        </div>
    </div>

@endsection()
