@extends('layout')
@section('content')

<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
    <div class="page-wrapper">
        <div class="blog-title-area text-center">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $post->category->name}}</a></li>
                <li class="breadcrumb-item active">{{ $post->title}}</li>
            </ol>
            <span class="color-orange"><a href="" title="">{{ $post->category->name}}</a></span>
            <h3>{{ $post->title}}</h3>
            <div class="blog-meta big-meta">
                <small><a href="" title="">{{optional($post->published_at)->format('d M Y')}}</a></small>
                <small><a href="" title="">by OHSD</a></small>
            </div><!-- end meta -->
        </div><!-- end title -->
        <div class="single-post-media">
            <img src="/storage/{{$post->photos->first()?$post->photos->first()->url:''}}" alt="" class="img-fluid">
        </div><!-- end media -->
        <div class="blog-content">
            <div class="pp">
                {!! $post->body!!}
            </div><!-- end pp -->
        </div><!-- end content -->
        <div class="blog-title-area">
            <div class="tag-cloud-single">
                <span>Tags</span>
                @foreach ($post->tags as $tag )
                <small>#{{ $tag->name}}</small>
                @endforeach
            </div><!-- end meta -->
            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a href="http://www.facebook.com/sharer.php?u={{ request()->fullurl()}}" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Compartir en Facebook</span></a></li>
                    <li><a href="https://twitter.com/intent/tweet?url={{ request()->fullurl()}}&text={{$post->title}}&via={{"OHSD"}}&hashtags={{"OHSD"}}" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Compartir en Twitter</span></a></li>
                </ul>
            </div><!-- end post-sharing -->
        </div><!-- end title -->
        <hr class="invis1">
        <div class="custombox authorbox clearfix">
            <h4 class="small-title">Author</h4>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle">
                </div><!-- end col -->
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <h4><a href="#">OHSD</a></h4>
                    <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Tech Blog!</p>
                    <div class="topsocial">
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                    </div><!-- end social -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end author-box -->
        <hr class="invis1">
        <div class="custombox clearfix">
            <h4 class="small-title">3 Comentarios</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="comments-list">
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="upload/author.jpg" alt="" class="rounded-circle">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading user_name">Amanda Martines <small>5 days ago</small></h4>
                                <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean.</p>
                                <!--<a href="#" class="btn btn-primary btn-sm">Reply</a>-->
                            </div>
                        </div>
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="upload/author_01.jpg" alt="" class="rounded-circle">
                            </a>
                            <div class="media-body">

                                <h4 class="media-heading user_name">Baltej Singh <small>5 days ago</small></h4>

                                <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                <!--<a href="#" class="btn btn-primary btn-sm">Reply</a>-->
                            </div>
                        </div>
                        <div class="media last-child">
                            <a class="media-left" href="#">
                                <img src="upload/author_02.jpg" alt="" class="rounded-circle">
                            </a>
                            <div class="media-body">

                                <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small></h4>
                                <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                <!--<a href="#" class="btn btn-primary btn-sm">Reply</a>-->
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end custom-box -->

        <hr class="invis1">

        <div class="custombox clearfix">
            <h4 class="small-title">Agrega tu comentario</h4>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-wrapper">
                        <input type="text" class="form-control" placeholder="Nombre">
                        <input type="text" class="form-control" placeholder="Correo">
                        <textarea class="form-control" placeholder="Comentario"></textarea>
                        <button type="submit" class="btn btn-primary">Enviar comentario</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- end page-wrapper -->
</div><!-- end col -->

@endsection
