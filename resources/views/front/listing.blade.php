@extends('layouts.front')
@section('content')
    <div class="listing-area pt-25">
        <div class="container overflow-hidden">
            <div class="row gx-5">
                <div class="col-lg-9">
                    <div class="topbar-wrapper">
                        <div class="topbar-left">
                            <p>Showing <span id="current-count">0</span> - 20 of <span id="total-count">0</span> results </p>
                        </div>
                        <div class="product-sorting-wrapper">
                            <div class="product-show sorting-style">
                                <label>Sort by :</label>
                                <select id="listing-sort">
                                    <option value="0">Reported Date</option>
                                    <option value="1">Name</option>
                                </select>
                            </div>
                            <div class="product-direction sorting-style">
                                <label>Direction :</label>
                                <select id="listing-dir">
                                    <option value="desc">Desc</option>
                                    <option value="asc">Asc</option>
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
                <div class="col-lg-3">
                        <div class="sidebar-widget pb-40">
                            <h4 class="sidebar-widget-title">Refine By </h4>
                            <div class="sidebar-widget-list">
                                <ul>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" name="sf" id="hero">
                                            <label for="hero">On Sale</label>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value="" id="sfsf">
                                            <label for="sfsf">New</label>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value="" id="a">
                                                <label for="a">In Stock</label>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget shop-sidebar-border pt-40">
                            <h4 class="sidebar-widget-title">Popular Tags</h4>
                            <div class="tag-wrap sidebar-widget-tag">
                                <a href="#">Clothing</a>
                                <a href="#">Accessories</a>
                                <a href="#">For Men</a>
                                <a href="#">Women</a>
                                <a href="#">Fashion</a>
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
            let view_more = $('#listing-view-more');
            let sorting = $('#listing-sort');
            let direction = $('#listing-dir');
            let total_count = $('#total-count');
            let current_count = $('#total-count');
            let order;
            let dir;
            let page;
            let perPage;
            let offset;
            let search;
            let total;

            view_more.on('click', function (){
                getListing();
            });

            sorting.change(function () {
                sort_by = this.value;
                getListing(true);
            });

            direction.change(function () {
                dir = this.value;
                getListing(true);
            });

            getListing(true);
            function getListing(showLoader=false){
                if(!showLoader){
                    page = page + 1;
                    console.log(page);
                }
                    $.ajax({
                        url: BASE_URL+ '/listing',
                        method: "GET",
                        dataType: "html",
                        "tryCount" : 0,
                        "retryLimit" : 3,
                        data:{
                            "order" : order,
                            "direction": dir,
                            "page": page,
                        },
                        beforeSend(){
                            if(showLoader){
                                listing_container.html('');
                                listing_container.append("<div class='justify-content-center' id='loader'><div class='spinner-border text-primary text-center' role='status'></div></div>");
                                view_more.removeClass('active');
                            }else{
                                view_more.prop('disabled', true);
                                view_more.text('Loading...');
                            }
                        },
                        success: function(resp){
                            $('#loader').hide();
                            let obj = JSON.parse(resp);
                            listing_container.append(obj.results);
                            order = obj.meta.order;
                            direction = obj.meta.dir;
                            page = obj.meta.page;
                            total = obj.meta.total;
                            total_count.text(total);
                            // perPage = obj.meta.perPage;

                            if(obj.meta.hasMorePages){
                            //     nextPageUrl = obj.nextPageUrl;
                                view_more.prop('disabled', false);
                                view_more.text('View More');
                                view_more.addClass('active');
                            }else{
                            //     view_more.text('No More Data');
                                view_more.closest('div').hide();
                                view_more.prop('disabled',true);
                                view_more.removeClass('active');
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
                            view_more.text('View More');
                            view_more.prop('disabled', false);
                            let obj = JSON.parse(xhr.responseText);
                            if(obj.message){
                                toastError(obj.message);
                            }else{
                                toastError("Something went wrong !!!");
                            }
                        }
                    });
            }
            // let upcomingCheckBox = $('#upcomingCheckBox');
            // let launchedCheckBox = $('#launchedCheckBox');
            // let todayCheckBox = $('#todayCheckBox');
            //
            // let search_field = $('#search_field');
            // let curated_container = $('#curated-container');
            // filterCollection('all', "", true);
            //
            // upcomingCheckBox.on('change', function (e){
            //     let filter = getFiltredOption();
            //     let search_key = search_field.val();
            //     filterCollection(filter,search_key)
            // });
            //
            // todayCheckBox.on('change', function (e){
            //     let filter = getFiltredOption();
            //     let search_key = search_field.val();
            //     filterCollection(filter,search_key)
            // });
            //
            // launchedCheckBox.on('change',function (){
            //     let filter = getFiltredOption();
            //     let search_key = search_field.val();
            //     filterCollection(filter,search_key)
            // });

            // search_field.on('keyup', _.debounce(function (e) {
            //     let filter = getFiltredOption();
            //     let search_key = search_field.val();
            //     filterCollection(filter, search_key)
            // }, 300)); //

            // function getFiltredOption(that){
            //     let filter="all";
            //     let upcomingStatus =    upcomingCheckBox.is(':checked');
            //     let launchedStatus=     launchedCheckBox.is(':checked');
            //     let todayStatus=        todayCheckBox.is(':checked');
            //
            //     if(upcomingStatus && launchedStatus && todayStatus){
            //         filter="all";
            //     }else if(upcomingStatus && launchedStatus  ){
            //         filter = 'upcoming&launched' ;
            //     }else if(upcomingStatus && todayStatus){
            //         filter = 'upcoming&today' ;
            //     }else if(launchedStatus && todayStatus){
            //         filter = 'launched&today' ;
            //     }else if(upcomingStatus){
            //         filter = 'upcoming' ;
            //     }else if(launchedStatus){
            //         filter = 'launched' ;
            //     }else if(todayStatus){
            //         filter = 'today' ;
            //     }
            //     return filter;
            // }

            // function filterCollection(filter, search_key="", initial=false){
            //     $.ajax({
            //         url: BASE_URL+'/curated-drops',
            //         method: "GET",
            //         dataType: "html",
            //         data:{
            //             "filter" : filter,
            //             "search_key": search_key,
            //         },
            //         beforeSend(){
            //             curated_container.html('');
            //             curated_container.append("<svg class='inline m-auto animate-spin h-10 w-10 text-theme-blue' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24'>"+
            //                 "<circle class='opacity-25' cx='12' cy='12' r='10' stroke='currentColor' stroke-width='4'></circle>"+
            //                 "<path class='opacity-75' fill='currentColor' d='M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z'></path>"+
            //                 "</svg>");
            //         },
            //         success:function (resp){
            //             curated_container.html('');
            //             curated_container.append(resp);
            //         },
            //         error:function (){
            //             $('#curated-container .animate-spin').addClass('hidden');
            //             toastError('Something went wrong !!!');
            //         }
            //     });
            // }
        });
    </script>
@endsection
