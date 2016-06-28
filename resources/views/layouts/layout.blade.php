<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Blog</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<!-- css -->
<link href="/css/bootstrap.min.css" rel="stylesheet" />
<link href="/css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="/css/flexslider.css" rel="stylesheet" />
<link href="/css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="/css/sweetalert.css" type="text/css" />


<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
    <!-- start header -->
    <header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/blogs"><span>B</span>LAGGERS</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav navbar-right">
                         @if (Auth::check())
                            <li>
                                <a href="{{ url('/blogs') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ url('/blogs/create') }}">Create Post</a>
                            </li>
                             <li>
                                @if(Auth::user()->isAdmin())
                                    <a href="{{ url('/admin') }}">Admin Dashboard</a>
                                @endif
                            </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    <section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li class="active">Blog</li>
                </ul>
            </div>
        </div>
    </div>
    </section>
    <section id="content">
        <div class="container">
            @yield('content')
        </div>
    </section>
    <footer>
    </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/jquery.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.fancybox.pack.js"></script>
<script src="/js/jquery.fancybox-media.js"></script>
<script src="/js/google-code-prettify/prettify.js"></script>
<script src="/js/portfolio/jquery.quicksand.js"></script>
<script src="/js/portfolio/setting.js"></script>
<script src="/js/jquery.flexslider.js"></script>
<script src="/js/animate.js"></script>
<script src="/js/custom.js"></script>

<script src="/js/sweetalert-dev.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
<script src="/js/readmore.min.js"></script>
<script>
    $('.textarea').ckeditor();
    // $('.textarea').ckeditor(); // if class is prefered.
    $('.read').readmore({
      speed: 75,
      lessLink: '<a href="/blogs/asd">Read less</a>'
    });
</script>

@include('flash.flash')
</body>
</html>