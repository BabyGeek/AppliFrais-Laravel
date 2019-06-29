<!DOCTYPE html>
<html lang="fe">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> AppliFrais </title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/css/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-check-square-o"></i> <span> AppliFrais </span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    @include('layouts.partials.profileInfo')
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    @include('layouts.menu.main')
                    <!-- /sidebar menu -->

                </div>
            </div>

            <!-- top navigation -->
            @include('layouts.partials.topbar')
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3> {{ $page_name }} </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            @include('layouts.partials.footer')
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="/css/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/css/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/css/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/css/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/js/custom.min.js"></script>
</body>

</html>
