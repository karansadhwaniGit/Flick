
@include('layouts.frontend.partials._navigation')

@yield('header')
<!-- Blog Area
===================================== -->
<div id="blog" class="pt20 pb50 bg-dark3 text-light">
    <div class="container text-light">
        <div class="row">
            @yield('content')
<!-- Blog Sidebar===================================== -->
             @include('layouts.frontend.partials._sidebar')

        </div>
    </div>
</div>
<!-- Newsletter Area=====================================-->
@include('layouts.frontend.partials._newsletter')

<!-- Footer Area=====================================-->
@include('layouts.frontend.partials._footer')
