@extends('layouts.front')
@section('content')
    <div class="checkout-main-area pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="d-flex pb-3">
                    <h3 class="sh-title">Report Details</h3>
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
