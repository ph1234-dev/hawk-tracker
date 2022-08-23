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
    <link rel="stylesheet" href="{{ url('css/utility.css') }}">
    <link rel="stylesheet" href="{{ url('css/icomoon/style.css') }}">

    
    @routes
    @vite('/resources/js/app.js')
    @vite([
        'resources/scss/app.scss',
        'resources/css/inter/inter.css',
        'resources/css/app.css',
        'resources/js/app.js'])

</head>
<body >

    <div id="app" class="template" > 

        <div class="template-header">
            @include("common/nav")
        </div>
                    
        <div class="template-body util-element-padding-large" >
            @yield('content')  
        </div>
        <div class="template-footer">
            @include("common/footer")
        </div>
    </div>
</body>

</html>
{{-- <script type="text/javascript" src="{{ url('js/jquery-3.6.0.min.js' )}}"></script>
<script type="text/javascript" src="{{ url('js/app.js' )}}"></script> --}}
