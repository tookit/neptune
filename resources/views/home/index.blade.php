@extends('layouts.app')

@section('content')
    <div id="tt-pageContent">
        <div class="tt-offset-35 container-indent">
            <div class="container">
                <div class="row tt-services-listing">
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <a href="faq.html" class="tt-services-block">
                            <div class="tt-col-icon">
                                <i class="icon-f-48"></i>
                            </div>
                            <div class="tt-col-description">
                                <h4 class="tt-title">FREE SHIPPING</h4>
                                <p>Free shipping on all US order or order above $99</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <a href="faq.html" class="tt-services-block">
                            <div class="tt-col-icon">
                                <i class="icon-f-35"></i>
                            </div>
                            <div class="tt-col-description">
                                <h4 class="tt-title">SUPPORT 24/7</h4>
                                <p>Contact us 24 hours a day, 7 days a week</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <a href="faq.html" class="tt-services-block">
                            <div class="tt-col-icon">
                                <i class="icon-e-09"></i>
                            </div>
                            <div class="tt-col-description">
                                <h4 class="tt-title">30 DAYS RETURN</h4>
                                <p>Simply return it within 24 days for an exchange.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-indent0">
            <div class="container">
                <div class="row flex-sm-row-reverse tt-layout-promo-box">
                    <div class="col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="#" class="tt-promo-box tt-one-child hover-type-2">
                                    <img src="{{asset('/images/loader.svg')}}" data-src="{{asset('/images/promo/index04-promo-img-02.jpg')}}" alt="">
                                    <div class="tt-description">
                                        <div class="tt-description-wrapper">
                                            <div class="tt-background"></div>
                                            <div class="tt-title-small">Promotion</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="#" class="tt-promo-box tt-one-child hover-type-2">
                                    <img src="{{asset('/images/loader.svg')}}" data-src="{{asset('/images/promo/index04-promo-img-03.jpg')}}" alt="">
                                    <div class="tt-description">
                                        <div class="tt-description-wrapper">
                                            <div class="tt-background"></div>
                                            <div class="tt-title-small">Promotion</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12">
                                <a href="#" class="tt-promo-box tt-one-child">
                                    <img src="{{asset('/images/loader.svg')}}" data-src="{{asset('/images/promo/index04-promo-img-04.jpg')}}" alt="">
                                    <div class="tt-description">
                                        <div class="tt-description-wrapper">
                                            <div class="tt-background"></div>
                                            <div class="tt-title-small">READY TO</div>
                                            <div class="tt-title-large">Promotion</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="#" class="tt-promo-box">
                            <img src="{{asset('/images/loader.svg')}}" data-src="{{asset('/images/promo/index04-promo-img-01.jpg')}}" alt="">
                            <div class="tt-description">
                                <div class="tt-description-wrapper">
                                    <div class="tt-background"></div>
                                    <div class="tt-title-small">Promotion</div>
                                    <div class="tt-title-large">Promotion</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-indent1">
            <div class="container container-fluid-custom-mobile-padding">
                <div class="tt-block-title text-left">
                    <h1 class="tt-title">Fiber Optical Cables</h1>
                </div>
                <div class="tt-tab-wrapper">
                    <ul class="nav nav-tabs tt-tabs-default" role="tablist">
                        @foreach ($fiber->children->take(4) as $item)
                            <li class="nav-item">
                                <a class="nav-link show" data-toggle="tab" href="#tt-tab-{{$item->id}}" role="tab">{{$item->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach ($fiber->children->take(4) as $cat)
                        <div class="tab-pane fade {{$loop->first ? 'active':''}}" id="tt-tab-{{$cat->id}}" role="tabpanel">
                            <div class="tt-carousel-products row arrow-location-tab tt-alignment-img tt-collection-listing slick-animated-show-js">
                                @foreach( $cat->products as $item)
                                <div class="col-2 col-md-4 col-lg-3">
                                    <a href="/products/items/{{$item->slug}}" class="tt-collection-item">
                                        <div class="tt-image-box"><img src="{{asset('/images/product/product-26.jpg')}}" alt="{{$item->name}}"></div>
                                        <div class="tt-description">
                                            <h2 class="tt-title">{{$item->name}}</h2>
                                            <ul class="tt-add-info">
                                                <!--<li>22 PRODUCTS</li>-->
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="container-indent1">
            <div class="container container-fluid-custom-mobile-padding">
                <div class="tt-block-title text-left">
                    <h2 class="tt-title">MEN’S</h2>
                </div>
                <div class="tt-tab-wrapper">
                    <ul class="nav nav-tabs tt-tabs-default" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tt-tab01-01">NEW ARRIVALS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tt-tab01-02">SPECIALS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tt-tab01-03">BESTSELLERS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tt-tab01-04">MOST VIEWED</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tt-tab01-05">FEATURED PRODUCTS</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tt-tab01-01">
                            <div class="tt-carousel-products row arrow-location-tab tt-alignment-img tt-layout-product-item slick-animated-show-js">
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-20.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-20-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-new">New</span>
                                                </span>
                                            </a>
                                            <div class="tt-countdown_box">
                                                <div class="tt-countdown_inner">
                                                    <div class="tt-countdown"
                                                         data-date="2018-11-01"
                                                         data-year="Yrs"
                                                         data-month="Mths"
                                                         data-week="Wk"
                                                         data-day="Day"
                                                         data-hour="Hrs"
                                                         data-minute="Min"
                                                         data-second="Sec"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-price">
                                                $12
                                            </div>
                                            <div class="tt-option-block">
                                                <ul class="tt-options-swatch">
                                                    <li><a class="options-color tt-color-bg-01" href="#"></a></li>
                                                    <li><a class="options-color tt-color-bg-02" href="#"></a></li>
                                                </ul>
                                            </div>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-02.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-02-02.jpg" alt=""></span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-price">
                                                $124
                                            </div>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-22.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-22-01.jpg" alt=""></span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-price">
                                                $12
                                            </div>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-24.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-24-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-sale">Sale 15%</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#" tabindex="0">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-price">
                                                $12
                                            </div>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-17.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-17-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-new">New</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-price">
                                                $12
                                            </div>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tt-tab01-02">
                            <div class="tt-carousel-products row arrow-location-tab tt-alignment-img tt-layout-product-item slick-animated-show-js">
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-24.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-24-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-sale">Sale 15%</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-17.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-17-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-new">New</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-20.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-20-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-new">New</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-02.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-02-02.jpg" alt=""></span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-22.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-22-02.jpg" alt=""></span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tt-tab01-03">
                            <div class="tt-carousel-products row arrow-location-tab tt-alignment-img tt-layout-product-item slick-animated-show-js">
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-02.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-02-02.jpg" alt=""></span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-22.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-22-02.jpg" alt=""></span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-24.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-24-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-sale">Sale 15%</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-17.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-17-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-new">New</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-20.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-20-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-new">New</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tt-tab01-04">
                            <div class="tt-carousel-products row arrow-location-tab tt-alignment-img tt-layout-product-item slick-animated-show-js">
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-22.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-22-02.jpg" alt=""></span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-02.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-02-02.jpg" alt=""></span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-24.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-24-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-sale">Sale 15%</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-20.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-20-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-new">New</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-17.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-17-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-new">New</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tt-tab01-05">
                            <div class="tt-carousel-products row arrow-location-tab tt-alignment-img tt-layout-product-item slick-animated-show-js">
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-02.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-02-02.jpg" alt=""></span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-22.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-22-02.jpg" alt=""></span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-24.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-24-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-sale">Sale 15%</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-20.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-20-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-new">New</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-md-4 col-lg-3">
                                    <div class="tt-product thumbprod-center">
                                        <div class="tt-image-box">
                                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                                            <a href="product.html">
                                                <span class="tt-img"><img src="images/product/product-17.jpg" alt=""></span>
                                                <span class="tt-img-roll-over"><img src="images/product/product-17-01.jpg" alt=""></span>
                                                <span class="tt-label-location">
                                                    <span class="tt-label-new">New</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="tt-description">
                                            <div class="tt-row">
                                                <ul class="tt-add-info">
                                                    <li><a href="#">T-SHIRTS</a></li>
                                                </ul>
                                                <div class="tt-rating">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-half"></i>
                                                    <i class="icon-star-empty"></i>
                                                </div>
                                            </div>
                                            <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                            <div class="tt-product-inside-hover">
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                                </div>
                                                <div class="tt-row-btn">
                                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                                    <a href="#" class="tt-btn-wishlist"></a>
                                                    <a href="#" class="tt-btn-compare"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <div class="container-indent" style="margin-bottom: 35px">
            <div class="container">
                <div class="row tt-layout-promo-box">
                    <div class="col-md-6">
                        <a href="#" class="tt-promo-box tt-one-child">
                            <img src="{{asset('/images/loader.svg')}}" data-src="{{asset('/images/promo/index04-promo-img-05.jpg')}}" alt="">
                            <div class="tt-description">
                                <div class="tt-description-wrapper">
                                    <div class="tt-background"></div>
                                    <div class="tt-title-small">NEW IN:</div>
                                    <div class="tt-title-large">Category</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="listing-left-column.html" class="tt-promo-box tt-one-child">
                            <img src="{{asset('/images/loader.svg')}}" data-src="{{asset('/images/promo/index04-promo-img-06.jpg')}}" alt="">
                            <div class="tt-description">
                                <div class="tt-description-wrapper">
                                    <div class="tt-background"></div>
                                    <div class="tt-title-small">CLEARANCE SALES</div>
                                    <div class="tt-title-large">GET UP TO <span class="tt-base-color">20% OFF</span></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3 col products
        <div class="container-indent">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <h6 class="tt-title-sub">NEW PRODUCTS</h6>
                        <div class="tt-layout-vertical-listing">
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-18.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-18-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            $24
                                        </div>
                                        <div class="tt-option-block">
                                            <ul class="tt-options-swatch">
                                                <li><a class="options-color tt-color-bg-01" href="#"></a></li>
                                                <li><a class="options-color tt-color-bg-02" href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-19.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-19-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            $84
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-20.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-20-01.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            $78
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider visible-xs"></div>
                    <div class="col-sm-6 col-md-4">
                        <h6 class="tt-title-sub">SPECIAL PRODUCTS</h6>
                        <div class="tt-layout-vertical-listing">
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-22.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-22-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            <span class="new-price">$14</span>
                                            <span class="old-price">$24</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-23.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-23-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            <span class="new-price">$14</span>
                                            <span class="old-price">$24</span>
                                        </div>
                                        <div class="tt-option-block">
                                            <ul class="tt-options-swatch">
                                                <li><a class="options-color tt-color-bg-03" href="#"></a></li>
                                                <li><a class="options-color tt-color-bg-04" href="#"></a></li>
                                                <li><a class="options-color tt-color-bg-05" href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-21.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-21-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            <span class="new-price">$34</span>
                                            <span class="old-price">$74</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider visible-sm visible-xs"></div>
                    <div class="col-sm-6 col-md-4">
                        <h6 class="tt-title-sub">FEATURED PRODUCTS</h6>
                        <div class="tt-layout-vertical-listing">
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-16.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-16-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <div class="tt-rating">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            $24
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-12.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-12-01.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <div class="tt-rating">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            $178
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-layout-vertical">
                                    <div class="tt-img">
                                        <a href="listing-collection.html">
                                            <span class="tt-img-default"><img src="images/loader.svg" data-src="images/product/product-13.jpg" alt=""></span>
                                            <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-13-02.jpg" alt=""></span>
                                        </a>
                                    </div>
                                    <div class="tt-description">
                                        <div class="tt-rating">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <ul class="tt-add-info">
                                            <li><a href="#">T-SHIRTS</a></li>
                                        </ul>
                                        <h6 class="tt-title"><a href="#">Flared Shift Dress</a></h6>
                                        <div class="tt-price">
                                            $54
                                        </div>
                                        <div class="tt-option-block">
                                            <ul class="tt-options-swatch">
                                                <li><a class="options-color tt-color-bg-01" href="#"></a></li>
                                                <li><a class="options-color tt-color-bg-02" href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <!-- brand
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <div class="tt-block-title">
                    <h2 class="tt-title">POPULAR</h2>
                    <div class="tt-description">CLOTHING BRANDS</div>
                </div>
                <div class="row tt-img-box-listing">
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-01.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-02.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-03.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-04.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-05.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-06.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-07.png" alt="">
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="tt-img-box">
                            <img src="images/loader.svg" data-src="images/custom/brand-img-08.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        -->
        <!--
        <div class="container-indent">
            <div class="container-fluid">
                <div class="tt-block-title">
                    <h2 class="tt-title"><a href="https://www.instagram.com/">@ FOLLOW</a> US ON</h2>
                    <div class="tt-description">INSTAGRAM</div>
                </div>
                <div class="row">
                    <div id="instafeed" class="instafeed-fluid"
                         data-accessToken="8626857013.dd09515.0fcd8351c65140d48f5a340693af1c3f"
                         data-clientId="dd095157744c4bd0a67181fc4906e5b6"
                         data-userId="8626857013"
                         data-limitImg="6">
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>

@endsection
