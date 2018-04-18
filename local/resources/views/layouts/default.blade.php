<!DOCTYPE html>
<html lang="en">
    @include('layouts.partials.head')
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="clearfix"></div>
                        <!-- menu profile quick info -->
                        @include('layouts.partials.menuProfile')
                        <!-- /menu profile quick info -->
                        <br />
                        <!-- sidebar menu -->
                        @include('layouts.partials.sidebar')
                        <!-- /sidebar menu -->
                        <!-- /menu footer buttons -->
                        @include('layouts.partials.footerButton')
                        <!-- /menu footer buttons -->
                    </div>
                </div>
                <!-- top navigation -->
                @include('layouts.partials.topNavigation')
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main">
                    <!-- top tiles -->
                    <div class="page-title">
                        <div class="title_left">
                            <h3>@yield('title')</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- /top tiles -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>@yield('title_content')</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    @yield('content')
                                </div>
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
        @include('layouts.partials.javascript') 
    </body>
</html>
