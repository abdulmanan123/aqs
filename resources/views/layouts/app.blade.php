<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
    <head>
        <!-- Basic Page Needs -->
        <meta charset="UTF-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->


        <title>@yield('title')</title>
        <meta name="google-site-verification" content="KfzyleiRDQ_CWIXC6T7dNfUqcbUxdX2DbHz657-VAOo" />
        <meta name="description" content="@yield('description')">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="CreativeLayers">
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Boostrap style -->
        <link rel="stylesheet" type="text/css" href="{{url('front_assets/stylesheets/bootstrap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" type="text/css" href="{{url('front_assets/stylesheets/style.css')}}">
        <!-- Reponsive -->
        <link rel="stylesheet" type="text/css" href="{{url('front_assets/stylesheets/responsive.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('front_assets/css/style.css')}}">
        <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">

        <script>
        var base_url = '{{ url("") }}';
        var admin_url = '{{ url("admin") }}';
    </script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5dfb9b29f3c77900129a7017&product=sticky-share-buttons&cms=sop' async='async'></script>
    </head>
    <body class="header_sticky {{@$class}}">
        <div class="boxed">

            <div class="overlay"></div>

            <!-- Preloader -->
            <div class="preloader">
                <div class="clear-loading loading-effect-2">
                    <span></span>
                </div>
            </div><!-- /.preloader -->

            @include('sections.header')

            @yield('content')

            @include('sections.footer')

        </div><!-- /.boxed -->

        <!-- Javascript -->
        <!-- <script
        src="https://www.paypal.com/sdk/js?client-id=AcVSOYnBQbk_DCYhIzXQ_KrcqxVMeOuZDED5JQdEItaBvHTNcDxRzJYdiJCIlp1XzVc0r1UKs3DBXHXe">
        </script> -->
        <script type="text/javascript" src="{{url('front_assets/javascript/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{url('front_assets/javascript/owl.carousel.js')}}"></script>
        <script type="text/javascript" src="{{url('front_assets/javascript/tether.min.js')}}"></script>
        <script type="text/javascript" src="{{url('front_assets/javascript/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{url('front_assets/javascript/waypoints.min.js')}}"></script>
        <!-- <script type="text/javascript" src="{{url('front_assets/javascript/jquery.circlechart.js')}}"></script> -->
        <script type="text/javascript" src="{{url('front_assets/javascript/easing.js')}}"></script>
        <script type="text/javascript" src="{{url('front_assets/javascript/jquery.zoom.min.js')}}"></script>
        <script type="text/javascript" src="{{url('front_assets/javascript/jquery.flexslider-min.js')}}"></script>


        <script type="text/javascript" src="{{url('front_assets/javascript/jquery-ui.js')}}"></script>
        <script type="text/javascript" src="{{url('front_assets/javascript/jquery.mCustomScrollbar.js')}}"></script>
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHH2WyrHbuChuvGc1zkbY3LwiODEF8zGI&libraries=places"></script>


        <script type="text/javascript" src="{{url('front_assets/javascript/gmap3.min.js')}}"></script>
        <script type="text/javascript" src="{{url('front_assets/javascript/waves.min.js')}}"></script>
        <script type="text/javascript" src="{{url('front_assets/javascript/jquery.countdown.js')}}"></script>

        <script type="text/javascript" src="{{url('front_assets/javascript/main.js')}}"></script>
        <!-- Bootstrap Validator-->
        <script src="{{ asset('js/validator.min.js') }}"></script>

        <script type="text/javascript" src="{{url('front_assets/js/scripts.js')}}"></script>

        <script type="text/javascript" src="{{url('js/loadingoverlay.min.js')}}"></script>
        <script>
            $(document).ready(function () {
                $("a[title ~= 'BotDetect']").css('visibility', 'hidden');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            })

        </script>

        @include('admin.sections.notification')
        @yield('scripts')

    </body>
</html>
