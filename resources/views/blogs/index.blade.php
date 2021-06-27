@extends('layouts.frontend.layout')
@section('header')

<header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5" data-image-src="{{asset('frontend/assets/img/bg/img-bg-17.jpg')}}" data-positiony="1000">
    <div class="intro-body text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pt50">
                    <h1 class="brand-heading font-montserrat text-uppercase color-light" data-in-effect="fadeInDown">
                        Pen-It
                        <small class="color-light alpha7">Heaven for Blogger!</small>
                    </h1>
                </div>
            </div>
        </div>

    </div>
</header>
@endsection
@section('content')
            <div class="col-md-9 mt25">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 mb50" >
                        <h4 class="blog-title"><a href="#">Amazing Blog Post One</a></h4>
                        <div class="blog-three-attrib">
                            <span class="icon-calendar"></span> Dec 15 2019 |
                            <span class=" icon-pencil"></span><a href="#">John Doe</a>
                        </div>
                        <img src="{{asset('frontend/assets/img/blog/img-blog-1.jpg')}}" class="img-responsive" alt="image blog">
                        <p class="mt25">
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                            consequuntur magni dolores eos.
                        </p>
                        <a href="#" class="button button-gray button-xs">Read More <i class="fa fa-long-arrow-right"></i></a>

                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 mb50 " >
                        <h4 class="blog-title"><a href="#">Amazing Blog Post Two</a></h4>
                        <div class="blog-three-attrib">
                            <span class="icon-calendar"></span>Dec 15 2019 |
                            <span class=" icon-pencil"></span> <a href="#"> John Doe</a>
                        </div>
                        <img src="{{asset('frontend/assets/img/blog/img-blog-2.jpg')}}" class="img-responsive" alt="image blog">
                        <p class="mt25">
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                            consequuntur magni dolores eos.
                        </p>
                        <a href="#" class="button button-gray button-xs">Read More <i
                                class="fa fa-long-arrow-right"></i></a>

                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 mb50 " >
                        <h4 class="blog-title"><a href="#">Amazing Blog Post Two</a></h4>
                        <div class="blog-three-attrib">
                            <span class="icon-calendar"></span>Dec 15 2019 |
                            <span class=" icon-pencil"></span> <a href="#"> John Doe</a>
                        </div>
                        <img src="{{asset('frontend/assets/img/blog/img-blog-2.jpg')}}" class="img-responsive" alt="image blog">
                        <p class="mt25">
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                            consequuntur magni dolores eos.
                        </p>
                        <a href="#" class="button button-gray button-xs">Read More <i
                                class="fa fa-long-arrow-right"></i></a>

                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 mb50 " >
                        <h4 class="blog-title"><a href="#">Amazing Blog Post Two</a></h4>
                        <div class="blog-three-attrib">
                            <span class="icon-calendar"></span>Dec 15 2019 |
                            <span class=" icon-pencil"></span> <a href="#"> John Doe</a>
                        </div>
                        <img src="{{asset('frontend/assets/img/blog/img-blog-2.jpg')}}" class="img-responsive" alt="image blog">
                        <p class="mt25">
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                            consequuntur magni dolores eos.
                        </p>
                        <a href="#" class="button button-gray button-xs">Read More <i
                                class="fa fa-long-arrow-right"></i></a>

                    </div>



                </div>
                <div class="row mt25 animated" data-animation="fadeInUp" data-animation-delay="100">
                    <div class="col-md-6">
                        <a href="#" class="button button-sm button-pasific pull-left hover-skew-backward">
                            Old Entries
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="button button-sm button-pasific pull-right hover-skew-forward">New Entries</a>
                    </div>
                </div>
                </div>
@endsection

