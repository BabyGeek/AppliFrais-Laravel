<!DOCTYPE html>
<html lang="fr">

    @include('layouts.partials.head')

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ route('dashboard') }}" class="site_title"><i class="fa fa-check-square-o"></i> <span> AppliFrais </span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    @include('layouts.menu.profileInfo')
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
                            <div class="col-md-7 col-sm-7 col-xs-12 form-group pull-right">
                                    <div class="input-group">
                                        @yield('heading-buttons')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        @yield('content')
                    </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            @include('layouts.partials.footer')
            <!-- /footer content -->
        </div>
    </div>

    <!-- JQuery -->
    <script src="/vendor/jquery/dist/jquery.min.js" type="text/javascript"></script>

    <!-- Google Analytics -->
    <script async="" src="https://www.google-analytics.com/analytics.js"></script>

    <!-- Bootstrap -->
    <script src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- FastClick -->
    <script src="/vendor/fastclick/lib/fastclick.js"></script>

    <!-- NProgress -->
    <script src="/vendor/nprogress/nprogress.js"></script>

    <!-- Chart JS -->
    <script src="/vendor/Chart.js/dist/Chart.min.js" type="text/javascript"></script>

    <!-- Gauge -->
    <script src="/vendor/gauge.js/dist/gauge.min.js" type="text/javascript"></script>

    <!-- ProgressBar -->
    <script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js" type="text/javascript"></script>

    <!-- iCheck -->
    <script src="/vendor/iCheck/icheck.min.js" type="text/javascript"></script>

    <!-- Skycons -->
    <script src="/vendor/skycons/skycons.js" type="text/javascript"></script>

    <!-- Flot -->
    <script src="/vendor/Flot/jquery.flot.js" type="text/javascript"></script>

    <!-- FlotPie -->
    <script src="/vendor/Flot/jquery.flot.pie.js" type="text/javascript"></script>

    <!-- FlotTime -->
    <script src="/vendor/Flot/jquery.flot.time.js" type="text/javascript"></script>

    <!-- FlotStack -->
    <script src="/vendor/Flot/jquery.flot.stack.js" type="text/javascript"></script>

    <!-- FlotResize -->
    <script src="/vendor/Flot/jquery.flot.resize.js" type="text/javascript"></script>

    <!-- FlotOrderBars -->
    <script src="/vendor/flot.orderbars/js/jquery.flot.orderBars.js" type="text/javascript"></script>

    <!-- FlotSpline -->
    <script src="/vendor/flot-spline/js/jquery.flot.spline.min.js" type="text/javascript"></script>

    <!-- CurvedLines -->
    <script src="/vendor/flot.curvedlines/curvedLines.js" type="text/javascript"></script>

    <!-- Date -->
    <script src="/vendor/DateJS/build/date.js" type="text/javascript"></script>

    <!-- Moment -->
    <script src="/vendor/moment/min/moment.min.js" type="text/javascript"></script>

    <!-- DateRangePicker -->
    <script src="/vendor/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <!-- AwesomeFontIcons -->
    <script src="https://kit.fontawesome.com/4b992502df.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/js/custom.min.js"></script>

    <!-- Alert -->
    @include('layouts.partials.toast')
    <!-- /Alert -->

    @yield('script')
</body>

</html>
