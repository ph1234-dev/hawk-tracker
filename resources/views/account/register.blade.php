@extends('template')
{{-- this means if null or the status was no tset --}}
@if(!@isset($status))
    @section('content')

    {{-- how to perform erros --}}
    {{-- https://laravel.com/docs/9.x/validation#introduction --}}

        <form 
            {{--turn auto complete off para mawala iyong mga annoying na saved data  --}}
        autocomplete="off"
            id="new-account-form"
            class="form" 
            style="margin: auto"
            action=" {{route('create.user')}} " 
            method="post"
            >
            @csrf
            <span class="form-title">Create Account</span>
            <small class="form-details"> It's free, but your data is our product</small>
            
            @if($errors->any())
                {{-- {{$errors}} --}}
                <span class="form-error">There are some errors in your form</span>
            @endif

            {{-- do not forget to add csrf --}}
            <label class="form-label"  for="name">Name</label>
            {{-- to retain value after validation failed.. you just need to sset
                attribute value={{old('[name of the input placed]')}} --}}
            <input type="text" name="name" placeholder="" value="{{old('name')}}" >
            @error('name')
                <i class="form-error">{{$message}}</i>
            @enderror

            <label class="form-label" for="username">Username</label>
            <input id="reg-username" type="text" name="username" placeholder=""  value="{{old('username')}}" >
            <span id="reg-username-warning" class="show-warning"></span>
            @error('username')
                <i class="form-error">{{$message}}</i>
            @enderror

            <label class="form-label"  for="password">Password  &nbsp;<i class="icon icon-lock"></i></label>
            <input id="reg-password" type="password" name="password" placeholder="" value="{{old('password')}}">
            @error('password')
                <i class="form-error">{{$message}}</i>
            @enderror

            <label class="form-label"  required>Confirm Password</label>
            <input id="reg-confirm-password" type="password" name="password_confirmation" placeholder="">
            <span id="password-confirmation"></span>
            @error('password_confirmation')
                <i class="form-error">{{$message}}</i>
            @enderror
               

            <label class="form-label" for="" required>Daily Calories</label>
            <input id="reg-calories" type="number" name="calories" placeholder="" value="{{old('calories')}}">
            <span id=""></span>
            @error('calories')
                <i class="form-error">{{$message}}</i>
            @enderror

            <div class="checkbox-container">
                <input id="reg-agree" class="checkbox-container-checkbox" type="checkbox" name="agree" placeholder="">
                <label class="checkbox-container-label" for="reg-agree">
                    <small>
                        I certify that I am 18 years old and read and understand
                        data privacy.
                    </small> 
                    <br>
                    @error('agree')
                        <i class="form-error">{{$message}}</i>
                    @enderror
                </label>
            </div>
            
            <input id="reg-submit" type="submit" class="form-submit" value="Register">
            &nbsp;
        </form>
    @endsection
@else

    @section('content')
        <div class="component-container">
            @if($status == "pass")     
                <div class="component-container">
                    <h1>Account has been created</h1>
                    <span>you can now login to tracker</span>
                    <a class="button" href="{{route('show.login.form')}}">Login Now</a>
                </div>
            @else
                <h1>Problem occurred Creating account {{$status}}</h1>  
            @endif
        </div>
    @endsection

@endif
