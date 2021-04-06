<!DOCTYPE html>
<html lang="es">
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <title>OHSD</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="/front/css/bootstrap.css" rel="stylesheet">
    <!-- FontAwesome Icons core CSS -->
    <link href="/front/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/front/style.css" rel="stylesheet">
    <!-- Responsive styles for this template -->
    <link href="/front/css/responsive.css" rel="stylesheet">
    <!-- Colors for this template -->
    <link href="/front/css/colors.css" rel="stylesheet">
    <!-- Version Tech CSS for this template -->
    <link href="/front/css/tech.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
               @include('partials.nav')
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->

        <section class="section first-section">
            <div class="container-fluid">
            </div>
        </section>
        <section class="section">
            <div class="container">
                <div class="row">
@yield('content')
                    @include('partials.lateralderecha')
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
<div class="footer">
    <center><p>Copyright &copy; 2021 - <a href="#">Observatorio de drogas</a> &middot; All Rights Reserved</p></center>
  </div>
    </div><!-- end wrapper -->
    <!-- Core JavaScript
    ================================================== -->
    <script src="/front/js/jquery.min.js"></script>
    <script src="/front/js/tether.min.js"></script>
    <script src="/front/js/bootstrap.min.js"></script>
    <script src="/front/js/custom.js"></script>
</body>
</html>
