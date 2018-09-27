<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="fr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Weather Dashboard - @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="favicon.ico">

    <!--Google Font link-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="css/swiper.min.css"/>
    <link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/iconfont.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootsnav.css"/>


    <link rel="stylesheet" href="css/responsive.css" />

    <!-- Open Weather Map -->
    <link rel="stylesheet" href="css/weather-icons.min.css"/>

    <link rel="stylesheet" href="css/style.css"/>


    <script src="js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body data-spy="scroll" data-target=".navbar-collapse">

    <!-- Preloader -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div><!--End Preloader -->

    <div class="container text-center">
        <h1 class="text-light">
            Weather Dashboard
        </h1>
    </div>

        <nav class="navbar navbar-default bootsnav navbar-fixed white no-background">

                  <!-- Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <!-- End Navigation -->

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-center">
                        <li><a href="/">Widgets</a></li>
                        <li><a href="/settings">Settings</a></li>
                    </ul>
                </div>
            <div class="clearfix"></div>
        </nav>


        <section class="home">
            <div class="main_home">
                <h1 class="text-white col-md-3">@yield('title')</h1>
                <div class="col-md-9">@yield('content')</div>
            </div>
        </section>

    <!-- JS includes -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/jquery.collapse.js"></script>
    <script src="js/bootsnav.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>