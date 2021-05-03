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
                Acciones y logros en materia de drogas
                @endif
                <a href="#"><i class="fa fa-rss"></i></a></h4>
        </div><!-- end blog-top -->
        <div class="blog-list clearfix">
            @foreach ($reports as $report )
            <div class="blog-box row">
                <div class="col-md-4">
                    <div class="post-media">
                        <a href="/storage/{{$report->attached}}" title="Informe" target="_blank">
                            <img src="/img/pdfreport.png" alt="Portada informe" width="80" height="200" class="fluid">
                            <div class="hovereffect"></div>
                        </a>
                    </div><!-- end media -->
                </div><!-- end col -->
                <div class="blog-meta big-meta col-md-8">
                    <h4><a href="/storage/{{$report->attached}}" title="">{{$report->title}}</a></h4>
                        <p>{{$report->description}}</p>
                    <small><a class="bg-orange" href="" title="">{{$report->created_at->format('Y')}}</a></small>
                    <small>by OHSD</small><br>
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
                        {{--}} {{$posts->links()}}--}}
                    </li>
                </ul>
            </nav>
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end col -->
@stop
