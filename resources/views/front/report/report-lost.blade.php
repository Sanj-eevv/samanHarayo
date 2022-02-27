@extends('layouts.front')
@section('content')
{{--    @include('utils._error_all')--}}
    <div class="checkout-main-area pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="report-lost-title d-flex pb-3">
                    <h3 class="sh-title">Report Details</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('report-lost.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('front.report._form', ['buttonText' => "Proceed To Payment", 'show' => true])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()
