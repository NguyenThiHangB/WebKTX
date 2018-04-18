<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ __('Quản lý Ký túc xá Mỏ - Địa Chất') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}">
        <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <style>
            /* Remove the navbar's default rounded borders and increase the bottom margin */ 
            .navbar {
            margin-bottom: 50px;
            border-radius: 0;
            }

            /* Remove the jumbotron's default bottom margin */ 
            .jumbotron {
            margin-bottom: 0;
            }

            /* Add a gray background color and some padding to the footer */
            footer {
            background-color: #f2f2f2;
            padding: 25px;
            }
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <div class="container text-center">
                <h2>{{ __('Quản lý Ký túc xá Mỏ - Địa Chất') }}</h2>      
            </div>
        </div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#">Logo</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">{{ __('Giới thiệu') }}</a></li>
                        <li><a href="{{ route('admin') }}">{{ __('Quản lý ký túc xá') }}</a></li>
                        <li><a href="#">{{ __('Quản lý tin tức') }}</a></li>
                        <li><a href="#">{{ __('Liên hệ') }}</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span>  {{ __('Đăng xuất') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">    
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">{{ __('Giới thiệu') }}</div>
                        <div class="panel-footer">{{ __('Phần mềm quản lý ký túc xá là....') }}</div>
                    </div>
                </div>
            </div>
        </div><br><br>
    </body>
</html>