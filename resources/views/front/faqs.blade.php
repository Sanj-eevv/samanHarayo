@extends('layouts.front')
@section('content')
    <div class="section-faqs pt-25">
        <div class="container">
            <div>
                <h3 class="sh-title">Faq</h3>
            </div>
            <div class="faq-container pt-25">
                <div class="accordion" id="faqAccordion">
                    @foreach($faqs as $faq)
                        <div class="accordion-content">
                            <h4 class="accordion-title">
                                <a href="#">
                                    <span class="icon-container"><i class="fas fa-plus fa-xs sh-plus"></i><i class="fas fa-minus fa-xs sh-minus"></i></span>
                                    <p>{{$faq->question}}</p>
                                </a>
                            </h4>
                            <div class="accordion-inner">
                                {{$faq->answer}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
