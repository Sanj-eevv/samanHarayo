@extends('layouts.front')
@section('content')
    <div class="listing-area pt-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="topbar-wrapper">
                        <div class="topbar-left">
                            <p>Showing 1 - 20 of 30 results </p>
                        </div>
                        <div class="product-sorting-wrapper">
                            <div class="product-sorting sorting-style">
                                <label>View :</label>
                                <select>
                                    <option value=""> 20</option>
                                    <option value=""> 23</option>
                                    <option value=""> 30</option>
                                </select>
                            </div>
                            <div class="product-show sorting-style">
                                <label>Sort by :</label>
                                <select>
                                    <option value="">Default</option>
                                    <option value=""> Name</option>
                                    <option value=""> price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="shop-list-wrap mb-30">
                            <div class="row">
                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                    <div class="product-list-img">
                                        <a href="">
                                            <img src="{{asset('assets/images/common/placeholder.jpg')}}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                    <div class="shop-list-content">
                                        <h3><a href="">Basic Joggin Shorts</a></h3>
                                        <span>$35.45</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination-style pb-20 pt-10">
                            <ul>
                                <li><a class="prev" href="#"><i class="icon-arrow-left"></i></a></li>
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a class="next" href="#"><i class="icon-arrow-right"></i></a></li>
                            </ul>
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
