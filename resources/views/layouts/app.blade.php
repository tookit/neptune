<!DOCTYPE html>
<!--
Theme: The Optical Fiber
Version: 2.0.1
Author: Albertsongroup
Site: http://www.isocked.com
-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->


<html lang="en">
<head>
    <meta charset="utf-8" />
{{--    <title>The best manufacture of The Optical Fiber -  {{ this.page.title }} </title>--}}
{{--    <meta name="description" content="{{ this.page.meta_description }}">--}}
{{--    <meta name="title" content="{{ this.page.meta_title }}">--}}
{{--    <meta name="keywords" content="{{ this.page.meta_keywords }}">--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="michaelwang" name="author" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Theme Core CSS -->
    <link href="{{ asset('/css/theme.css')  }}" rel="stylesheet">
    <link href="{{ asset('/external/message/message.css')  }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css')  }}" rel="stylesheet">
    <link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
</head>

<body>
<div id="loader-wrapper">
    <div id="loader">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</div>

<!-- BEGIN: HEADER -->
@include('layouts.header')

<!-- END: HEADER -->

<!-- BEGIN: PAGE CONTAINER -->
@yield('content')
<!-- END: PAGE CONTAINER -->

<!-- BEGIN: Footer-->
@include('layouts.footer')

<!-- END: Footer -->

<a href="#" class="tt-back-to-top">BACK TO TOP</a>

<!-- modal (quickViewModal) -->
<div class="modal  fade"  id="ModalquickView" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body" id="productQuickView">
            </div>
        </div>
    </div>
</div>

<!-- Modal (Quote) -->
<div class="modal  fade"  id="Modalquote" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true"  data-pause=2000>
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="tt-modal-quote">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- BEGIN: LAYOUT/BASE/BOTTOM -->



<!-- END: CORE PLUGINS -->

<!-- BEGIN: LAYOUT PLUGINS -->
<script src="{{ asset('/external/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/external/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/external/slick/slick.min.js') }}"></script>
<script src="{{ asset('/external/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('/external/panelmenu/panelmenu.js') }}"></script>
<script src="{{ asset('/external/instafeed/instafeed.min.js') }}"></script>
<script src="{{ asset('/external/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('/external/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('/external/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('/external/countdown/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('/external/countdown/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('/external/elevatezoom/jquery.elevatezoom.js') }}"></script>
<script src="{{ asset('/external/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('external/lazyLoad/lazyload.min.js') }}"></script>
<script src="{{ asset('external/message/message.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

{{--</script>--}}

<!-- END: THEME SCRIPTS -->

<!-- form validation and sending to mail -->
{{--<script src="{{ [--}}
{{--            'assets/external/form/jquery.form.js',--}}
{{--            'assets/external/form/jquery.validate.min.js',--}}
{{--            'assets/external/form/jquery.form-init.js',--}}
{{--        ]|theme }}">--}}
{{--</script>--}}



<!-- END: PAGE SCRIPTS -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134541321-2"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-134541321-2');
</script>


</body>

</html>
