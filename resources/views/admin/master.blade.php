<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - MyCms</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="routeName" content="{{Route::currentRouteName()}}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{url('/static/css/admin.css?v='.time())}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2dd01aae80.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="{{url('/static/libs/ckeditor/ckeditor.js')}}"></script>
    <script src="{{url('/static/js/admin.js?v='.time())}}"></script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="col1">@include('admin.sidebar')</div>
        <div class="col2">
            <nav class="navbar navbar-expand-lg shadow">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{url('/admin')}}" class="nav-link"><i class="fas fa-house-damage"></i> Dashboard</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="page">

                <div class="container-fluid">
                    <nav aria-label="breadcrumb shadow">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('/admin')}}"><i class="fas fa-house-damage"></i> Dashboard</a>
                            </li>
                            @section('breadcrumb')
                            @show
                        </ol>
                        <!-- /.breadcrumb -->
                    </nav>
                </div>

                @if(Session::has('message'))
                    <div class="container-fluid">
                        <div class="mtop16 alert alert-{{Session::get('typealert')}}" style="display:none;">
                            {{Session::get('message')}}
                            @if($errors->any())
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <script>
                                $('.alert').slideDown();
                                setTimeout(function () {
                                    $('.alert').slideUp();
                                }, 10000)
                            </script>
                        </div>
                    </div>
                @endif

                @section('content')
                @show

            </div>
            <!-- /.page -->
        </div>
    </div>
    <!-- /.wrapper -->
</body>
</html>
