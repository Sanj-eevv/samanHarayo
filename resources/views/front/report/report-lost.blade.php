@extends('layouts.front')
@section('content')
    @include('utils._error_all')
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
                        @include('front.report._form', ['buttonText' => "Proceed To Payment", 'show' => true])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()
