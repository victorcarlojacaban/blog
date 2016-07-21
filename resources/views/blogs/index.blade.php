@extends('layouts.layout')


@section('content')

    <!-- Main Content -->
        <div class="row">
            <div class="col-lg-8">
            	@foreach($blogs as $blog)
                <article class="read">
                        <div class="post-image">
                            <div class="post-heading">
                                <h3><a href="/blogs/{{ escape_url($blog->title) }}">{!! $blog->title !!}</a></h3>
                            </div>
                        <!--     <img src="../img/dummies/blog/img1.jpg" alt="" /> -->
                        </div>
                        <p>
                             {!! $blog->content !!}
                        </p>
                </article>
                <div class="container-fluid">
                 		 <div class="bottom-article">
                            <ul class="meta-post">
                                <li><i class="icon-calendar"></i><a href="#"> {!!  $blog->updated_at->diffForHumans() !!}</a></li>
                                <li><i class="icon-user"></i><a href="#"> {!!  $blog->user->name !!}</a></li>
  
                              <!--   <li><i class="icon-comments"></i><a href="#">4 Comments</a></li> -->
                            </ul>
                          
                           <a href="/blogs/{{ escape_url($blog->title) }}" class="pull-right">Visit Page <i class="icon-angle-right"></i></a>
                        </div>
                </div>
                @endforeach
                {{ $blogs->links() }}
            </div>
            <div class="col-lg-4">
                <aside class="right-sidebar">
                <div class="widget">
                    <form class="form-search">
                        <input class="form-control" type="text" placeholder="Search..">
                    </form>
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Latest posts</h5>
                    @foreach($blogs as $blog)
                    <ul class="recent">
                        <li>
	                        <!-- <img src="img/dummies/blog/65x65/thumb1.jpg" class="pull-left" alt="" /> -->
	                        <h6><a href="/blogs/{{ escape_url($blog->title) }}">{!! $blog->title !!}</a></h6>
	                        <p>
	                             Mazim alienum appellantur eu cu ullum officiis pro pri
	                        </p>
                        </li>
                    </ul>
                    @endforeach
                </div>
                </aside>
            </div>
        </div>
@stop

