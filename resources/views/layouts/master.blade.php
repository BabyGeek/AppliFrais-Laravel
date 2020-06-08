<!DOCTYPE html>
<html lang="fr">

    @include('layouts.partials.head')


<body class="nav-md">
    <div class="container body">
    {!! laraflash()->render() !!}
        <div class="main_container">
            @if(Auth::user())
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="{{ route('dashboard', ['user_id' => Auth::user()->id]) }}" class="site_title"><i class="fa fa-check-square-o"></i> <span> AppliFrais </span></a>
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
            @endif

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3> {{ $page_name }} @if (isset($month)) {{ Carbon\Carbon::now()->format('m/Y') }} @endif</h3>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Google Analytics -->
    <script async="" src="https://www.google-analytics.com/analytics.js"></script>

    <!-- Bootstrap -->
    <script src="/js/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- FastClick -->
    <script src="/js/fastclick/lib/fastclick.js"></script>

    <!-- NProgress -->
    <script src="/js/nprogress/nprogress.js"></script>

    <!-- Chart JS -->
    <script src="/js/chart.js/dist/Chart.min.js" type="text/javascript"></script>

    <!-- Gauge -->
    <script src="/js/gauge.js/dist/gauge.min.js" type="text/javascript"></script>

    <!-- iCheck -->
    <script src="/js/iCheck/icheck.min.js" type="text/javascript"></script>

    <!-- Skycons -->
    <script src="/js/skycons/skycons.js" type="text/javascript"></script>

    <!-- Flot -->
    <script src="/js/flot/source/jquery.flot.js" type="text/javascript"></script>

    <!-- FlotPie -->
    <script src="/js/flot/source/jquery.flot.pie.js" type="text/javascript"></script>

    <!-- FlotTime -->
    <script src="/js/flot/source/jquery.flot.time.js" type="text/javascript"></script>

    <!-- FlotStack -->
    <script src="/js/flot/source/jquery.flot.stack.js" type="text/javascript"></script>

    <!-- FlotResize -->
    <script src="/js/flot/source/jquery.flot.resize.js" type="text/javascript"></script>

    <!-- Date -->
    <script src="/js/Datejs/build/date.js" type="text/javascript"></script>

    <!-- Moment -->
    <script src="/js/moment/min/moment.min.js" type="text/javascript"></script>

    <!-- DateRangePicker -->
    <script src="/js/daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <!-- AwesomeFontIcons -->
    <script src="https://kit.fontawesome.com/4b992502df.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/js/custom.min.js"></script>

    <!-- Flatpickr -->
    <script src="/js/flatpickr/dist/flatpickr.js"></script>
    <script src="/js/flatpickr/dist/l10n/fr.js"></script>

    @yield('script')

</body>

</html>
