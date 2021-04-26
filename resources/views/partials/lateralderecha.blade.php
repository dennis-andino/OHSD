<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">
            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <img src="upload/banner_07.jpg" alt="" class="img-fluid">
                </div><!-- end banner-img -->
            </div><!-- end banner -->
        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title">Videos</h2>
            <div class="trend-videos">
                <div class="blog-box">
                    <div class="post-media">
                        <a href="tech-single.html" title="">
                            <img src="/front/upload/tech_video_01.jpg" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span class="videohover"></span>
                            </div><!-- end hover -->
                        </a>
                    </div><!-- end media -->
                    <div class="blog-meta">
                        <h4><a href="tech-single.html" title="">¿Qué es el OHSD?</a></h4>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->
            </div><!-- end videos -->
        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title">Archivo</h2>
            <hr>
            <div class="blog-list-widget">
                <div class="list-group">
                    @if(isset($archive))
                    @foreach ($archive as $date )
                    <a href="{{ route('pages.home',['month'=>$date->month , 'year'=>$date->year]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <h5 class="mb-1">{{$date->monthname}}-{{$date->year}} ({{$date->posts}})</h5>
                        </div>
                    </a>
                    @endforeach
                    @endif
                </div>
            </div><!-- end blog-list -->
        </div><!-- end widget -->
    </div><!-- end sidebar -->
</div><!-- end col -->
