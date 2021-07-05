<div id="sidebar" class="col-md-3 mt80 animated" data-animation="fadeInRight" data-animation-delay="250">


    <!-- Search
    ===================================== -->
    <div class="pr25 pl25 clearfix">
        <form action="{{route('blogs.index')}}" method="GET">
            <div class="blog-sidebar-form-search">
                <input type="text" name="search" class="bg-dark3" placeholder="e.g. Javascript" value="{{request('search')}}">
                <button type="submit" name="submit" value="" class="pull-right"><i class="fa fa-search"></i></button>
            </div>
        </form>

    </div>


    <!-- Categories
    ===================================== -->
    <div class="mt25 pr25 pl25 clearfix">
        <h5 class="mt25" style="color: white">
            Categories
            <span class="heading-divider mt10"></span>
        </h5>
        <ul class="blog-sidebar pl25">
            @foreach ($categories as $category)
                <li><a href="{{route('blogs.categories',$category->id)}}">{{$category->name}}<span class="badge badge-pasific pull-right">{{$category->posts->count()}}</span></a>
            @endforeach
        </ul>

    </div>


    <!-- Tags
    ===================================== -->
    <div class="pr25 pl25 clearfix">
        <h5 class="mt25" style="color: white">
            Popular Tags
            <span class="heading-divider mt10"></span>
        </h5>
        <ul class="tag">
            @foreach($tags as $tag)
                <li><a href="{{route('blogs.tags',$tag->id)}}">{{$tag->name}}</a></li>
            @endforeach
        </ul>

    </div>
</div>
