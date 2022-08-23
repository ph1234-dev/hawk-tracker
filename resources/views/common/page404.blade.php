@extends('..template')

@section('content')
    <div class="container container-centered" >
        <img style="margin-top: 2rem" src="{{url('svg/day52-autumn.svg')}}">
        <span class="title-biggest">
            Error <span class="highlight-warning">404</span>
        </span>
        <p class="title">
            The page does not exist it seems.  
        </p>
        <button class="btn-primary" style="margin-top: 2rem">Go back home</button>
     </div>
@endsection