@extends('layout')
  <!-- BEGIN content -->
  @section('content')
  <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
    <div class="page-wrapper">
        <div class="blog-top clearfix">
            <h4 class="pull-left">
                @if (isset($title))
                {{ $title }}
                @else
                Ultimas Noticias
                @endif
                <a href="#"><i class="fa fa-rss"></i></a></h4>
        </div><!-- end blog-top -->
        <div class="blog-list clearfix">
            @foreach ($posts as $post )
            <div class="blog-box row">
                <div class="col-md-4">
                    <div class="post-media">
                        <a href="" title="">
                            <img src="/storage/{{ $post->photos->first()?$post->photos->first()->url:''}}}}" alt="" class="img-fluid">
                            <div class="hovereffect"></div>
                        </a>
                    </div><!-- end media -->
                </div><!-- end col -->
                <div class="blog-meta big-meta col-md-8">
                    <h4><a href="blog/{{$post->id}}" title="">{{ $post->title}}</a></h4>
                        <p>{{ $post->excerpt}}...</p>
                    <small class="firstsmall"><a class="bg-orange" href="{{route('categories.show',$post->category)}}" title="">{{$post->category->name}}</a></small>
                    <small><a href="tech-single.html" title="">{{ $post->published_at->format('M d Y')}}</a></small>
                    <small><a href="tech-author.html" title="">por : OHSD</a></small><br>
                    @foreach ($post->tags as $tag )
            <small><a href="{{ route('tags.show', $tag)}}">#{{ $tag->name}}</a></small>
            @endforeach
                </div><!-- end meta -->
            </div><!-- end blog-box -->
            <hr class="invis">
            @endforeach
        </div><!-- end blog-list -->
    </div><!-- end page-wrapper -->
    <hr class="invis">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-start">
                    <!--<li class="page-item"><a class="page-link" href="#">1</a></li>-->
                    <li class="page-item">
                         {{$posts->links()}}
                    </li>
                </ul>
            </nav>
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end col -->
@stop
