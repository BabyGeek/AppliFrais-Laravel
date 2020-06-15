<!DOCTYPE html>
<html lang="fr">

    @include('layouts.partials.head')


<body class="nav-md">
    {!! laraflash()->render() !!}
    <div class="container body">
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

    <!-- jQuery -->
    <script src="/css/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/css/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/css/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/css/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/css/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/css/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/css/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/css/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/css/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="/css/Flot/jquery.flot.js"></script>
    <script src="/css/Flot/jquery.flot.pie.js"></script>
    <script src="/css/Flot/jquery.flot.time.js"></script>
    <script src="/css/Flot/jquery.flot.stack.js"></script>
    <script src="/css/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/css/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/css/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/css/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/css/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="/css/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/css/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/css/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/css/moment/min/moment.min.js"></script>
    <script src="/css/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/js/custom.min.js"></script>

    <!-- Flatpickr -->
    <script src="/js/flatpickr/dist/flatpickr.js"></script>
    <script src="/js/flatpickr/dist/l10n/fr.js"></script>

    @yield('script')
</body>

</html>
