@extends('layouts.app')

@section('content')
    <div class="tt-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container">
                <div class="contact-map">
                    <div id="map"></div>
                </div>
            </div>
        </div>
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <div class="tt-contact02-col-list">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 ml-sm-auto mr-sm-auto">
                            <div class="tt-contact-info">
                                <i class="tt-icon icon-f-93"></i>
                                <h6 class="tt-title">LET’S HAVE A CHAT!</h6>
                                <address>
                                    +777 2345 7885:<br>
                                    +777 2345 7886
                                </address>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="tt-contact-info">
                                <i class="tt-icon icon-f-24"></i>
                                <h6 class="tt-title">VISIT OUR LOCATION</h6>
                                <address>
                                    2548 Broaddus Maple Court Avenue,<br>
                                    Madisonville KY 4783,<br>
                                    United States of America
                                </address>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="tt-contact-info">
                                <i class="tt-icon icon-f-92"></i>
                                <h6 class="tt-title">WORK TIME</h6>
                                <address>
                                    7 Days a week<br>
                                    from 10 AM to 6 PM
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <form id="contactform" class="contact-form form-default" method="post" novalidate="novalidate" action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="inputName" placeholder="Your Name (required)">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Your Email (required)">
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" id="inputSubject" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea  name="message" class="form-control" rows="7" placeholder="Your Message"  id="textareaMessage"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn">SEND MESSAGE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection
