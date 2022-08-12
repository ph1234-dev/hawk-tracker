@extends("template")
@section("content")

    {{-- @if()
    @endif --}}
    <div class="component-container " >
        <form action="{{route('authenticate.user')}}" method="get" 
            class="form"
            style="margin:auto;">
            @csrf
            <span class="form-title">Login now!</span>
            <small>
                <p class="form-details">Don't have account yet? click <b><a href="{{route('show.register.form')}}">here</a></b> to register</p>
            </small>

            @isset($error)
                <span class="form-erro">{{$error}}</span>
            @endisset

            <label class="form-label" for="username">Username</label>
            <input class="form-input" type="text" name="username" placeholder="" value="{{old('username')}}">
            @error('username')
                <i class="form-error">{{$message}}</i>
            @enderror

            <label class="form-label" for="username">Password &nbsp;<i class="icon icon-lock"></i></label>
            <input class="form-input" type="password" name="password" placeholder="" >
            @error('password')
                <i class="form-error">{{$message}}</i>
            @enderror

            <input class="form-submit" type="submit" style="Login">
        </form>
    </div>
@endsection