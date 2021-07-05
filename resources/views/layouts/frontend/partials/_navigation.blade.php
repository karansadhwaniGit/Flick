<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pen-It | Bloggers Heaven</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="John Doe">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('frontend/assets/img/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('frontend/assets/img/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('frontend/assets/img/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('frontend/assets/img/apple-touch-icon-114x114.png')}}">

    <!-- Load Core CSS
    =====================================-->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/core/bootstrap-3.3.7.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/core/animate.min.css')}}">

    <!-- Load Main CSS
    =====================================-->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main/setting.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main/hover.css')}}">


    <link rel="stylesheet" href="{{asset('frontend/assets/css/color/pasific.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/icon/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/icon/et-line-font.css')}}">

    <!-- Load JS
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    WARNING: Respond.js doesn't work if you view the page via file://
    =====================================-->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="topPage" data-spy="scroll" data-target=".navbar" data-offset="100">



<!-- Page Loader
===================================== -->
<div id="pageloader" class="bg-grad-animation-1">
    <div class="loader-item">
        <img src="{{asset('frontend/assets/img/other/oval.svg')}}" alt="page loader">
    </div>
</div>

<a href="#page-top" class="go-to-top">
    <i class="fa fa-long-arrow-up"></i>
</a>


<!-- Navigation Area
===================================== -->
<nav class="navbar navbar-pasific navbar-mp megamenu navbar-fixed-top bg-dark3 text-light">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <img src="{{asset('frontend/assets/img/logo/logo-default.png')}}" alt="logo">
                Pen-It
            </a>
        </div>

        <div class="navbar-collapse collapse navbar-main-collapse">
            <ul class="nav navbar-nav">
                    @if(auth()->check())
                        <li><a href="{{route('dashboard')}}" class="py30 color-light">Dashboard</a></li>
                        <li><a class="color-light"><strong>Welcome {{auth()->user()->name}}</strong></a></li>
                        <li><a href="">Sign Out</a></li>
                    @else
                       <li><a href="{{route('login')}}"  class="dropdown-toggle color-light">Login/Signin</a></li>
                    @endif
            </ul>

        </div>
    </div>
</nav>

