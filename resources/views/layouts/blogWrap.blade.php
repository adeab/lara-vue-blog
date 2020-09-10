<!DOCTYPE HTML>
<html>

<head>
    <title>Blog Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="applijewelleryion/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <link href="{{asset('frontEnd/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,600,700' rel='stylesheet' type='text/css'>
    <link href="{{asset('frontEnd/css/style.css')}}" rel='stylesheet' type='text/css' />
    <script src="{{asset('frontEnd/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
    <!-- animation-effect -->
    <link href="{{asset('frontEnd/css/animate.min.css')}}" rel="stylesheet">
    <script src="{{asset('frontEnd/js/wow.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/scrollHandler.js')}}"></script>
    <script>
        new WOW().init();

    </script>
    <!-- //animation-effect -->
</head>

<body>
    @include('includes.frontEnd.topbar')
    <!--start-main-->
    <div class="header-bottom">
        <div class="container">
            <div class="logo wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                <h1><a href="#">Blogs</a></h1>
                <p><label class="of"></label>LET'S MAKE A PERFECT BLOG<label class="on"></label></p>
            </div>
        </div>
    </div>
    <!-- banner -->

    <div>
		@yield('categorySlider')
    </div>
    <!-- body  -->
    <div class="technology">
        <div class="container">
			
		
            <div class="clearfix"></div>
            <div class="col-md-9 technology-left">
                <div class="tech-no">
                    @yield('bodyContent')
                </div>
            </div>
            @include('includes.frontEnd.rightbar')
            <!-- end body -->
            <div class="clearfix"></div>
            <!-- technology-right -->
        </div>
    </div>
    @include('includes.frontEnd.footer')
</body>

</html>

