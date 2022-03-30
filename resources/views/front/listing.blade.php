@extends('layouts.front')
@section('content')
    <div class="listing-area pt-25">
        <div class="container overflow-hidden">
            <div class="row gx-5">
                <div class="col-lg-12">
                    <div class="topbar-wrapper">
{{--                        <div class="topbar-left">--}}
{{--                            <p>Showing 1 - <span id="current-count">0</span> of <span id="total-count">0</span> results </p>--}}
{{--                        </div>--}}
                        <div class="product-sorting-wrapper">
                            <div class="product-show sorting-style">
                                <label>Sort by :</label>
                                <select id="listing-sort">
                                    <option value="1">Title</option>
                                    <option value="0">Reported Date</option>
                                </select>
                            </div>
                            <div class="product-filter sorting-style">
                                <label>Type :</label>
                                <select id="listing-type">
                                    <option value="0">Lost</option>
                                    <option value="1">Found</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="shop-list-wrap mb-30" id="listing-container">
                            {{--Data from the ajax would be loaded here--}}
                        </div>
                        <div class="pagination-style pb-30 text-center">
                           <button class="sh-view-more" id="listing-view-more">View More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_level_script')
    <script>
        let listing_container = $('#listing-container');
        $( document ).ready(function() {
            let _view_more = $('#listing-view-more');
            let _order = $('#listing-sort');
            let _type = $('#listing-type');
            let order;
            let page = 1;
            let report_type;

            _view_more.on('click', function (){
                page = page + 1;
                getValue();
                getListing();
            });

            _order.change(function () {
                getValue();
                page = 1;
                getListing(true);
            });

            _type.change(function () {
                getValue();
                page = 1;
                getListing(true);
            });
            getValue();
            getListing(true);
            function getListing(showLoader=false){
                $.ajax({
                        url: BASE_URL+ '/listing',
                        method: "GET",
                        dataType: "html",
                        "tryCount" : 0,
                        "retryLimit" : 3,
                        data:{
                            "order" : order,
                            "type": report_type,
                            "page": page,
                        },
                        beforeSend(){
                            if(showLoader){
                                listing_container.html('');
                                listing_container.append("<div class='justify-content-center' id='loader'><div class='spinner-border text-primary text-center' role='status'></div></div>");
                                _view_more.removeClass('active');
                            }else{
                                _view_more.prop('disabled', true);
                                _view_more.text('Loading...');
                            }
                        },
                        success: function(resp){
                            $('#loader').hide();
                            let obj = JSON.parse(resp);
                            listing_container.append(obj.results);
                            page = obj.meta.page;
                            if(obj.meta.hasMorePages){
                                _view_more.prop('disabled', false);
                                _view_more.text('View More');
                                _view_more.addClass('active');
                            }else{
                                _view_more.closest('div').hide();
                                _view_more.prop('disabled',true);
                                _view_more.removeClass('active');
                            }
                        },
                        error: function(xhr,ajaxOptions, thrownError){
                            if (xhr.status === 500) {
                                this.tryCount++;
                                if (this.tryCount <= this.retryLimit) {
                                    //try again
                                    $.ajax(this);
                                }
                            }
                            $('#loader').hide();
                            _view_more.text('View More');
                            _view_more.prop('disabled', false);
                            let obj = JSON.parse(xhr.responseText);
                            if(obj.message){
                                toastError(obj.message);
                            }else{
                                toastError("Something went wrong !!!");
                            }
                        }
                    });
            }

            function getValue(){
                order = _order.val();
                report_type  = _type.val();
            }
        });
    </script>
@endsection
