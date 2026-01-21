<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
    .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color:#000000;
    color: white;
    text-align: center;
    }
    </style>
    @stack('addCSS')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="{{ auth()->check() ? route('dashboard') : route('login') }}">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
                @if(Auth::check())
                    @if(auth()->user()->role=="admin")
                        <li><a href="#">Users</a></li>
                    @endif
                    @if(auth()->user()->role=="admin" || auth()->user()->role=="manager")    
                        <li><a href="{{route('tasks.index')}}">Tasks</a></li>
                    @endif
                    @if(auth()->user()->role=="employee")
                        <li><a href="{{route('task.assigned.list')}}">Assigned Task</a></li>
                    @endif
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @endif
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <!-- Content -->
        @yield('content')
    </div>

    <div class="footer">
        <p>Footer</p>
    </div>

    @stack('addJS')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</body>
</html>