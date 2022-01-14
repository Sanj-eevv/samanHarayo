@extends('layouts.front')
@section('content')
    @include('utils._error_all')
    <div class="checkout-main-area pb-50 mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <form action="{{route('report-lost.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="report-form-container">
                            <div class="report-form-product-details">
                                <div class="row mb-20">
                                    <div class="col-lg-12">
                                        <label class="form-label">Item name<abbr class="required" title="required">*</abbr></label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-20">
                                    <div class="col-lg-12">
                                        <label class="form-label">Brand</label>
                                        <input class="form-control @error('brand') is-invalid @enderror" type="text" name="brand" value="{{old('brand')}}">
                                        @error('brand')
                                        <span class="invalid-feedback" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
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
                                <div class="row  mb-20">
                                    <div class="col-lg-12">
                                     <label class="form-label">Category</label>
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
                                <div class="row mb-20">
                                    <div class="col-lg-6">
                                        <label class="form-label">Contact Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{old('email',auth()->user()->email)}}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mt-20 mt-lg-0">
                                        <label class="form-label">Contact Phone</label>
                                        <input class="numeric form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{old('phone')}}">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-20">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" id="rewardCheckBox" name="rewardCheckBox" value="{{old('rewardCheckBox')}}">
                                            <label for="rewardCheckBox">Reward</label>
                                        </div>
                                        <input class="rewardInput form-control @error('reward_amount') is-invalid @enderror mt-10" type="text" placeholder="Reward Amount" name="reward_amount" value="{{old('reward_amount')}}">
                                    </div>
                                </div>
                                <div class="row mb-20">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" id="featureCheckBox" name="featureCheckBox" value="{{old('rewardCheckBox')}}">
                                            <label for="featureCheckBox">Feature Report</label>
                                            <span  data-toggle="tooltip" data-placement="top" title="$3/day"><i class="fas fa-info-circle"></i></span>
                                        </div>
                                        <input class="featureReportInput form-control @error('feature_report_duration') is-invalid @enderror mt-10" type="text" placeholder="No of days" name="feature_report_duration" value="{{old('feature_report_duration')}}">
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
                                <div class="Place-order">
                                    <button type="submit">Report Product</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="report-form-payment-container mt-20">
                        <h3>Your order</h3>
                        <div class="payment-details-wrap">
                                <div class="payment-title">
                                    <ul>
                                        <li>Product <span>Total</span></li>
                                    </ul>
                                </div>
                                <div class="payment-value">
                                    <ul>
                                        <li>Product Name X 1 <span>$329 </span></li>
                                        <li>Product Name X 1 <span>$329 </span></li>
                                    </ul>
                                </div>
                                <div class="payment-subtotal">
                                    <ul>
                                        <li>Subtotal <span>$329 </span></li>
                                    </ul>
                                </div>
                        </div>
                        <div class="payment-method-container">
                                <div class="sin-payment payment-method">
                                    <input id="payment_method_1" class="input-radio" type="radio" value="cheque" checked="checked" name="payment_method">
                                    <label for="payment_method_1"> Direct Bank Transfer </label>
                                    <div class="payment-box payment_method_bacs">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                    </div>
                                </div>
                                <div class="sin-payment sin-payment-3 payment-method">
                                    <input id="payment-method-4" class="input-radio" type="radio" value="cheque" name="payment_method">
                                    <label for="payment-method-4">PayPal <img alt="" src="assets/images/icon-img/payment.png"></label>
                                    <div class="payment-box payment_method_bacs">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection()
