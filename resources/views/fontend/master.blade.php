<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
Back End By Sharifur Rahman (ROBIN);
Email: Robinmedia7@gmail.com
Facebook: www.fb.com/sharifur.rahman

-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Voguish a Blogging Category Flat Bootstarp Responsive Website Template | Home :: w3layouts</title>
        <link href="{{url('/')}}/fontend/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
        <link href="{{url('/')}}/fontend/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Voguish Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700' rel='stylesheet' type='text/css'>

        <script src="{{url('/')}}/fontend/js/jquery.min.js"></script>
        <script src="{{url('/')}}/fontend/js/responsiveslides.min.js"></script>

        <script>
$(function () {
    $("#slider").responsiveSlides({
        auto: true,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
    });
});

        </script>

    </head>
    <style>
        .login-right input[type="email"] {
            border: 1px solid #26313b;
            outline-color: #26313b;
            width: 96%;
            font-size: 1em;
            padding: 0.5em;
        }
    </style>
    <body>
        <!-- header -->
        <div class="header">
            <div class="container">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{url('/')}}/fontend/images/logo.png" class="img-responsive" alt=""></a>
                </div>

                <div class="head-nav">
                    <span class="menu"> </span>
                    <ul class="cl-effect-1">
                        <li class="active"><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/blog')}}">Blog</a></li>
                        <li><a href="{{url('contact')}}">Contact</a></li>
                        @if(Auth::guest())
                        <li><a href="{{route('login')}}">Login</a></li>
                        @else
                        <li>
                            <a href="{{ route('user.logout') }}"
                               onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @endif


                        <div class="clearfix"></div>
                    </ul>
                </div>
                <!-- script-for-nav -->
                <script>
                    $("span.menu").click(function () {
                        $(".head-nav ul").slideToggle(300, function () {
                            // Animation complete.
                        });
                    });
                </script>
                <!-- script-for-nav -->



                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- header -->
        <div class="container">
            @yield('content')
            </div>
        <div class="container">
            <div class="footer">
                <div class="col-md-3 foot-1">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{route('blog')}}">Blog</a></li>
                        <li><a href="{{route('contact.index')}}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 foot-1">
                    <h4>Favorite Resources</h4>
                    <ul>
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('contact.index')}}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 foot-1">
                    <h4>About Us</h4>
                    <ul>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="https://www.facebook.com/sharifur.rahman">Facebook</a></li>
                        <li><a href="#">Youtube</a></li>
                    </ul>
                </div>
                <div class="col-md-3 foot-1">
                    <h4>Custom Menu</h4>
                    <ul>
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('blog')}}">Blog</a></li>
                        <li><a href="{{route('contact.index')}}">Contact</a></li>
                    </ul>
                </div>

                <div class="clearfix"> </div>
                <div class="copyright">
                    <p>Copyrights © 2017 Voguish All rights reserved | Template by W3layouts | Developed By Sharifur Rahman</a></p>
                </div>
            </div>
        </div>
        
    </body>
</html>