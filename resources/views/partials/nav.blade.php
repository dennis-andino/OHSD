<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="tech-index.html"><img src="images/logo.png" alt=""></a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">INICIO</a>
            </li>
           <!-- <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORIAS</a>
            </li> -->
            <li class="nav-item dropdown has-submenu ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  CATEGORIAS
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($categories as $category)
                    <li><a class="dropdown-item" href="{{ route('categories.show',$category)}}">{{$category->name}}</a></li>
                    <li><hr class="dropdown-divider"></li>
                    @endforeach
                </ul>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pages.archive')}}">INFORMES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pages.contact')}}">¿QUIENES SOMOS?</a>
            </li>
        </ul>
        <ul class="navbar-nav mr-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login')}}"><i class="fa fa-rss"></i></a>
            </li>
        </ul>
    </div>
</nav>
