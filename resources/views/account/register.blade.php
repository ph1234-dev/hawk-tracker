@extends('template')

@section('content')
<div class="container">
    <div class="container-form">
        <div class="container-form-info">
            <span class="title">New Account</span>
            <img class="form-svg" src="{{url('svg/day69-dotted-notebook.svg')}}">
        </div>
        <form 
            {{--turn auto complete off para mawala iyong mga annoying na saved data  --}}
            autocomplete="off"
            action=" {{route('create.user')}} " 
            method="post"
            >
            @csrf {{-- do not forget to --}}
            
            <span class="title">Personal Details</span>   
            <small>Please fill up the form below. </small>
            @if($errors->any()) @endif
             
            <label class=""  for="name">Name</label>
            <input type="text" name="name" placeholder="" value="{{old('name')}}" >
            @error('name')
                <span class="error">{{$message}}</span>
            @enderror

            <label for="username">Username</label>
            <input id="reg-username" type="text" name="username" placeholder=""  value="{{old('username')}}" >
            @error('username')
                <span class="error">{{$message}}</span>
            @enderror

            <label  for="password">Password  &nbsp;<i class="icon icon-lock"></i></label>
            <input id="reg-password" type="password" name="password" placeholder="" value="{{old('password')}}">
            @error('password')
                <span class="error">{{$message}}</span>
            @enderror

            <label >Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="">
            @error('password_confirmation')
                <span class="error">{{$message}}</span>
            @enderror
                
            <label class="" for="" required>Daily Calories</label>
            <input type="number" name="calories" placeholder="" value="{{old('calories')}}">
            @error('calories')
                <span class="error">{{$message}}</span>
            @enderror

            <div class="container-checkbox">
                <input id="cb-agree-terms" type="checkbox" name="agree" placeholder="">
                <label class="checkbox-container-label" for="cb-agree-terms">
                    <small>
                        I certify that I am 18 years old and read and understand
                        data privacy.
                    </small> 
                    @error('agree')
                        <span class="error">{{$message}}</span>
                    @enderror
                </label>
            </div>
                
            <input 
                type="submit"  
                value="Register">
                
        </form>
    </div>
</div>
        
@endsection
