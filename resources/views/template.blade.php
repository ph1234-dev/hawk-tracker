<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="{{ url('css/spectre.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/spectre-exp.min.css' )}}">
    <link rel="stylesheet" href="{{ url('css/spectre-icons.min.css' )}}"> --}}
    {{-- <link rel="stylesheet" href="{{ url('css/reset.css' )}}"> --}}
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/media.css') }}">
    <link rel="stylesheet" href="{{ url('css/custom.css') }}">
    <link rel="stylesheet" href="{{ url('css/icomoon/style.css') }}">
</head>
<body>
    
    @include("common/nav")
    &nbsp;

        @if(Route::is('landing'))
            <div class="root-content" >
                @yield('content')  
            </div>
        @else
            <div class="root-content" style="padding: var(--padding)">
                @yield('content')   
            </div>
        @endif

    &nbsp;
    <div style="padding: var(--padding)">
        @include("common/footer")
    </div>
</body>

</html>
<script type="text/javascript" src="{{ url('js/jquery-3.6.0.min.js' )}}"></script>
<script type="text/javascript" src="{{ url('js/app.js' )}}"></script>
