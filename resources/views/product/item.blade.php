@extends('layouts.app')

@section('content')
<div class="tt-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/products">Products</a></li>

            <li>{{$item->name}}</li>

        </ul>
    </div>
</div>

<div id="tt-pageContent">
    <div class="container-indent">
        <!-- mobile product slider  -->
        <div class="tt-mobile-product-layout visible-xs">
            <div class="tt-mobile-product-slider arrow-location-center slick-animated-show-js">
                <!--{% for image in item.all_images %}-->
                <!--{% endfor %}-->

                <!--<div>-->
                <!--<div class="embed-responsive embed-responsive-16by9">-->
                <!--<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/GhyKqj_P2E4" allowfullscreen></iframe>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div>-->
                <!--<div class="tt-video-block">-->
                <!--<a href="#" class="link-video"></a>-->
                <!--<video class="movie" src="video/video.mp4" poster="video/video_img.jpg"></video>-->
                <!--</div>-->
                <!--</div>-->
            </div>
        </div>
        <!-- /mobile product slider  -->
        <div class="container container-fluid-mobile">
            <div class="row">
                <div class="col-6 hidden-xs">
                    <div class="tt-product-vertical-layout">
                        <div class="tt-product-single-img">
                            <div>
                                <button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button>
                                @if ($item->media)
                                    <img class="zoom-product" src="{{ $item->getFirstMediaUrl('fiber')}}" data-zoom-image="{{$item->getFirstMediaUrl('fiber')}}" alt="{{$item->name}}">
                                @else
                                    <img class="zoom-product" src="{{asset('/images/product/product-01.jpg') }}" data-zoom-image="{{asset('/images/product/product-01.jpg') }}" alt="{{$item->name}}">
                                @endif
                            </div>
                        </div>
                        <div class="tt-product-single-carousel-vertical">
                            <ul id="smallGallery" class="tt-slick-button-vertical  slick-animated-show-js">
                                @if ($item->media)
                                    @foreach ($item->media as $media)
                                        <li><a href="#" data-image="{{$media->getUrl()}}" data-zoom-image="{{$media->getUrl()}}"><img src="{{$media->getUrl()}}" alt=""></a></li>
                                    @endforeach
                                @else
                                    <li><a href="#" data-image="{{'assets/images/product/product-01.jpg'|theme }}" data-zoom-image="{{'assets/images/product/product-01.jpg'|theme }}"><img src="{{'assets/images/product/product-01.jpg'|theme }}" alt=""></a></li>
                                @endif
                                <!--<li>-->
                                <!--<div class="video-link-product" data-toggle="modal" data-type="youtube" data-target="#modalVideoProduct" data-value="http://www.youtube.com/embed/GhyKqj_P2E4">-->
                                <!--<img src="images/product/product-small-empty.png" alt="">-->
                                <!--<div>-->
                                <!--<i class="icon-f-32"></i>-->
                                <!--</div>-->
                                <!--</div>-->
                                <!--</li>-->
                                <!--<li>-->
                                <!--<div class="video-link-product" data-toggle="modal" data-type="video" data-target="#modalVideoProduct" data-value="video/video.mp4" data-poster="video/video_img.jpg">-->
                                <!--<img src="images/product/product-small-empty.png" alt="" >-->
                                <!--<div>-->
                                <!--<i class="icon-f-32"></i>-->
                                <!--</div>-->
                                <!--</div>-->
                                <!--</li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="tt-product-single-info">
                        <!--<div class="tt-add-info">-->
                        <!--<ul>-->
                        <!--<li><span>SKU:</span> 001</li>-->
                        <!--<li><span>Availability:</span> 40 in Stock</li>-->
                        <!--</ul>-->
                        <!--</div>-->
                        <h1 class="tt-title">{{$item->name}}</h1>
                        <div class="tt-price">
                            <!--<span class="new-price">$29</span>-->
                        </div>
                        <div class="tt-review">
                            <div class="tt-rating">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-half"></i>
                                <i class="icon-star-empty"></i>
                            </div>
                            <a class="product-page-gotocomments-js" href="#">(1 Customer Review)</a>
                        </div>
                        <div class="tt-wrapper">
                            Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </div>
                        <div class="tt-wrapper">
                            <div class="tt-countdown_box_02">
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
                        <div class="tt-wrapper">
                            <div class="tt-row-custom-01">
                                <div class="col-item">
                                    <div class="tt-input-counter style-01">
                                        <span class="minus-btn"></span>
                                        <input type="text" value="1" size="5">
                                        <span class="plus-btn"></span>
                                    </div>
                                </div>
                                <div class="col-item">
                                    <a href="#" class="btn btn-lg tt-btn-quote" data-pid="{{$item->id}}"><i class="icon-f-39"></i>Quote</a>
                                </div>
                            </div>
                        </div>
                        <div class="tt-wrapper">
                            <ul class="tt-list-btn">
                                <!--<li><a class="btn-link" href="#"><i class="icon-n-072"></i>ADD TO WISH LIST</a></li>-->
                                <!--<li><a class="btn-link" href="#"><i class="icon-n-08"></i>ADD TO COMPARE</a></li>-->
                            </ul>
                        </div>
                        <div class="tt-wrapper">
                            <div class="tt-add-info">
                                <ul>
                                    <li><span>Vendor:</span> The Optic Fiber </li>
                                    <li><span>Product Type:</span> </li>
                                    <li><span>Tag:</span> <a href="#"></a>, <a href="#">a</a>, <a href="#">Top</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-indent">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tt-title-border"></div>
                    <h3 class="tt-title-border mt-3">Description</h3>
                    <div>
                        {!! $item->description !!}
                    </div>
                    <h3 class="tt-title-border mt-3">Features</h3>
                    <div style="margin-bottom: 25px">
                        {!! $item->featrue !!}
                    </div>
                    <h3 class="tt-title-border mt-3">Specs</h3>
                    <div>
                        {!! $item->specs !!}
                    </div>
                    <h3 class="tt-title-border mt-3">Quality Certification</h3>
                    <div>
                        Quality and standards are the foundation of <strong>theopticalfiber.com</strong> We are dedicated to providing customers with outstanding, standards-compliant products and services. <strong>theopticalfiber.com</strong> has passed many quality system verifications, like CE, RoHS, FCC, established an internationally standardized quality assurance system and strictly implemented standardized management and control in the course of design, development, production, installation and service.
                    </div>
                <!--
                    <div class="tt-collapse-block">
                        <div class="tt-item">
                            <div class="tt-collapse-title">DESCRIPTION</div>
                            <div class="tt-collapse-content">

                    </div>
                </div>
                <div class="tt-item">
                    <div class="tt-collapse-title">ADDITIONAL INFORMATION</div>
                    <div class="tt-collapse-content">
                        <table class="tt-table-03">
                            <tbody>
                            <tr>
                                <td>Color:</td>
                                <td>Blue, Purple, White</td>
                            </tr>
                            <tr>
                                <td>Size:</td>
                                <td>20, 24</td>
                            </tr>
                            <tr>
                                <td>Material:</td>
                                <td>100% Polyester</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tt-item">
                    <div class="tt-collapse-title tt-poin-comments">REVIEWS (3)</div>
                    <div class="tt-collapse-content">
                        <div class="tt-review-block">
                            <div class="tt-row-custom-02">
                                <div class="col-item">
                                    <h2 class="tt-title">
                                        1 REVIEW FOR VARIABLE PRODUCT
                                    </h2>
                                </div>
                                <div class="col-item">
                                    <a href="#">Write a review</a>
                                </div>
                            </div>
                            <div class="tt-review-comments">
                                <div class="tt-item">
                                    <div class="tt-avatar">
                                        <a href="#"><img src="images/product/single/review-comments-img-01.jpg" alt=""></a>
                                    </div>
                                    <div class="tt-content">
                                        <div class="tt-rating">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-half"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                        <div class="tt-comments-info">
                                            <span class="username">by <span>ADRIAN</span></span>
                                            <span class="time">on January 14, 2017</span>
                                        </div>
                                        <div class="tt-comments-title">Very Good!</div>
                                        <p>
                                            Ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
                                        </p>
                                    </div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-avatar">
                                        <a href="#"><img src="images/product/single/review-comments-img-02.jpg" alt=""></a>
                                    </div>
                                    <div class="tt-content">
                                        <div class="tt-rating">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-half"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                        <div class="tt-comments-info">
                                            <span class="username">by <span>JESICA</span></span>
                                            <span class="time">on January 14, 2017</span>
                                        </div>
                                        <div class="tt-comments-title">Bad!</div>
                                        <p>
                                            Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-avatar">
                                        <a href="#"></a>
                                    </div>
                                    <div class="tt-content">
                                        <div class="tt-rating">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-half"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                        <div class="tt-comments-info">
                                            <span class="username">by <span>ADAM</span></span>
                                            <span class="time">on January 14, 2017</span>
                                        </div>
                                        <div class="tt-comments-title">Very Good!</div>
                                        <p>
                                            Diusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-review-form">
                                <div class="tt-message-info">
                                    BE THE FIRST TO REVIEW <span>“BLOUSE WITH SHEER &AMP; SOLID PANELS”</span>
                                        </div>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <div class="tt-rating-indicator">
                                            <div class="tt-title">
                                                YOUR RATING *
                                            </div>
                                            <div class="tt-rating">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star-half"></i>
                                                <i class="icon-star-empty"></i>
                                            </div>
                                        </div>
                                        <form class="form-default">
                                            <div class="form-group">
                                                <label for="inputName" class="control-label">YOUR NAME *</label>
                                                <input type="email" class="form-control" id="inputName" placeholder="Enter your name">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class="control-label">COUPONE E-MAIL *</label>
                                                <input type="password" class="form-control" id="inputEmail" placeholder="Enter your e-mail">
                                            </div>
                                            <div class="form-group">
                                                <label for="textarea" class="control-label">YOUR REVIEW *</label>
                                                <textarea class="form-control"  id="textarea" placeholder="Enter your review" rows="8"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn">SUBMIT</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
    <div class="container-indent wrapper-social-icon">
        <div class="container">
            <ul class="tt-social-icon justify-content-center">
                <li><a class="icon-g-64" href="http://www.facebook.com/"></a></li>
                <li><a class="icon-h-58" href="http://www.facebook.com/"></a></li>
                <li><a class="icon-g-66" href="http://www.twitter.com/"></a></li>
                <li><a class="icon-g-67" href="http://www.google.com/"></a></li>
                <li><a class="icon-g-70" href="https://instagram.com/"></a></li>
            </ul>
        </div>
    </div>
{{--    <div class="container-indent" style="margin-bottom: 45px">--}}
{{--        <div class="container container-fluid-custom-mobile-padding">--}}
{{--            <div class="tt-block-title text-left">--}}
{{--                <h3 class="tt-title-small">RELATED PRODUCT</h3>--}}
{{--            </div>--}}
{{--            <div class="tt-carousel-products row arrow-location-right-top tt-alignment-img tt-layout-product-item slick-animated-show-js">--}}
{{--                <div class="col-2 col-md-4 col-lg-3">--}}
{{--                    <div class="tt-product thumbprod-center">--}}
{{--                        <div class="tt-image-box">--}}
{{--                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-tooltip="Quick View" data-tposition="left"></a>--}}
{{--                            <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>--}}
{{--                            <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>--}}
{{--                            <a href="#">--}}
{{--                                {% if item.all_images %}--}}
{{--                                <span class="tt-img"><img src="{{ item.all_images[0].getThumb(280,350,{mode:'crop'})}}" alt="{{item.name}}"></span>--}}
{{--                                <span class="tt-img-roll-over"><img src="{{'assets/images/product/product-17-01.jpg'|theme}}" alt="{{item.name}}"></span>--}}
{{--                                {% else %}--}}
{{--                                <span class="tt-img"><img src="{{'assets/images/product/product-17.jpg'|theme}}" alt="{{item.name}}"></span>--}}
{{--                                <span class="tt-img-roll-over"><img src="{{'assets/images/product/product-17-01.jpg'|theme}}" alt="{{item.name}}"></span>--}}
{{--                                {% endif %}--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="tt-description">--}}
{{--                            <div class="tt-row">--}}
{{--                                <ul class="tt-add-info">--}}
{{--                                    <li><a href="#">Category</a></li>--}}
{{--                                </ul>--}}
{{--                                <div class="tt-rating">--}}
{{--                                    <i class="icon-star"></i>--}}
{{--                                    <i class="icon-star"></i>--}}
{{--                                    <i class="icon-star"></i>--}}
{{--                                    <i class="icon-star-half"></i>--}}
{{--                                    <i class="icon-star-empty"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <h2 class="tt-title"><a href="/product/item/{{$item->slug}}">{{$item->name}}</a></h2>--}}
{{--                            <div class="tt-price">--}}
{{--                            </div>--}}
{{--                            <div class="tt-product-inside-hover">--}}
{{--                                <div class="tt-row-btn">--}}
{{--                                    <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>--}}
{{--                                </div>--}}
{{--                                <div class="tt-row-btn">--}}
{{--                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>--}}
{{--                                    <a href="#" class="tt-btn-wishlist"></a>--}}
{{--                                    <a href="#" class="tt-btn-compare"></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

@endsection
