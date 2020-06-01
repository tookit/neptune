@extends('layouts.app')

@section('content')
    <div class="tt-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="/">Home</a></li>
                <li>About</li>
            </ul>
        </div>
    </div>
    <div id="tt-pageContent">
        <div class="nomargin container-indent">
            <div class="tt-about-box" style="background-image: url({{asset('/images/custom/about-img-01.jpg')}});">
                <img class="img-mobile" src="images/custom/about-img-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="tt-title">YOUR STORE IS A GLOBAL FASHION DESTINATION FOR 20-SOMETHINGS.</h1>
                            <p>
                                Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor.
                            </p>
                            <blockquote class="tt-blockquote-02">
                                <i class="tt-icon icon-g-56"></i>
                                <div class="tt-title">We sell cutting-edge fashion and offer a wide variety of fashion-related content.</div>
                                <div class="tt-title-description">— DANIEL BROWN</div>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-indent">
            <div class="container">
                <div class="tt-about-col-list">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="tt-title">OUR STORES</h5>
                            <div class="width-90">
                                Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor.
                            </div>

                        </div>
                        <div class="col-md-6">
                            <h5 class="tt-title">CONTACTS</h5>
                            <div class="tt-box-info">
                                <p>
                                    <span class="tt-base-dark-color">Address:</span> 2548 Broaddus Maple Court Avenue, Madisonville KY 4783,<br>
                                    United States of America
                                </p>
                                <p>
                                    <span class="tt-base-dark-color">Phone:</span> +777 2345 7885:  +777 2345 7886
                                </p>
                                <p>
                                    <span class="tt-base-dark-color">Hours:</span> 7 Days a week from 10 am to 6 pm
                                </p>
                                <p>
                                    <span class="tt-base-dark-color">E-mail:</span> <a class="link" href="mailto:info@mydomain.com">info@mydomain.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
