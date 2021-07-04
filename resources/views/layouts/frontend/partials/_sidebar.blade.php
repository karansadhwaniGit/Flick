<div id="sidebar" class="col-md-3 mt80 animated" data-animation="fadeInRight" data-animation-delay="250">


    <!-- Search
    ===================================== -->
    <div class="pr25 pl25 clearfix">
        <form action="#">
            <div class="blog-sidebar-form-search">
                <input type="text" name="search" class="bg-dark3" placeholder="e.g. Javascript">
                <button type="submit" name="submit" class="pull-right"><i class="fa fa-search"></i></button>
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
                <li><a href="#">{{$category->name}}<span class="badge badge-pasific pull-right">{{$category->posts->count()}}</span></a>
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
                <li><a href="#">{{$tag->name}}</a></li>
            @endforeach
        </ul>

    </div>
</div>
