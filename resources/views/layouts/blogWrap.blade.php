{{-- this is the main layout file that wraps the full front-end of the blog portal --}}
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
</head>

<body>
    {{-- main body --}}
    <div id="app">
        @include('includes.frontEnd.topbar')

        <div class="header-bottom">
            <div class="container">
                <div class="logo wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                    <h1><a href="#">Blogs</a></h1>
                    <p><label class="of"></label>LET'S MAKE A PERFECT BLOG<label class="on"></label></p>
                </div>
            </div>
        </div>
        {{-- category slider        --}}
        <div>
            @yield('categorySlider')
        </div>
        {{-- end of category slider --}}
        {{-- all blog index --}}
        <div class="technology">
            <div class="container">
                <div class="col-md-9">
                    <div class="tech-no">
                        @yield('bodyContent')
                    </div>
                </div>
                <div class="col-md-3 ">

                    <blog-sidebar></blog-sidebar>

                </div>
            </div>
        </div>
        {{-- end of all blog index --}}
        @include('includes.frontEnd.footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('frontEnd/js/jquery.sticky.js')}}"></script>
</body>

</html>
