@extends('layouts.front')
@section('content')
    <div class="checkout-main-area pb-50">
        <div class="container">
            <div class="row">
                <div class="report-lost-title d-flex">
                    <h2>Report Details</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{route('report-found.store')}}" method="POST" enctype="multipart/form-data">
                        @include('front.report._form', ['buttonText' => 'Submit', 'show' => false])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()
