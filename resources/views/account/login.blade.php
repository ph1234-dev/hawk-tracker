@extends("template")
@section("content")

    {{-- @if()
    @endif --}}
    <div class="container container-centered" >

        <span class="icon-big icon-hawk"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
        <span class="title" >
            Tracker Login
        </span>
        <small class="">Already have an account? Sign in</small>
        
        <form action="{{route('authenticate.user')}}" method="get" 
            class="form">
            @csrf

            @isset($error)
                <span class="error">{{$message}}</span>
            @endisset

            <label class="" for="username">Username</label>
            <input class="" type="text" name="username" placeholder="" value="{{old('username')}}">
            @error('username')
                <span class="error">{{$message}}</span>
            @enderror

            <label class="" for="username">Password &nbsp;<i class="icon icon-lock"></i></label>
            <input class="" type="password" name="password" placeholder="" >
            @error('password')
                <span class="error">{{$message}}</span>
            @enderror

            <input class="" type="submit" value="Login">
            
        </form>

        <small class="">
            <p class="">
                Don't have account yet? click <b>
                    <a href="{{route('show.register.form')}}">here</a></b>
                    to Register
            </p>
        </small>
        
    </div>
@endsection