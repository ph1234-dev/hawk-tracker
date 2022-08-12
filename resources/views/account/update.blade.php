@extends("template")
@section('content')
<div class="component-container">

{{-- https://laravel.com/docs/9.x/blade#if-statements 
    for @unless --}}
    @if ( $update == true )
        <form class="form" action="{{route('update.account')}}" method="post">
            @csrf
            <span class="form-title">Update Account</span>
            <small>
                <p class="form-details">You can write your new personal details here</p>
            </small>
            <label class="form-label">Name </label>
            <input type="text" name="name" id="" value={{$name}}>
            @error('name')
                <i class="form-error">{{message}}</i>
            @enderror 

            <label class="form-label">Username</label>
            <input type="text" name="username" id="" value={{$username}}>
            @error('username')
                <i class="form-error">{{message}}</i>
            @enderror 
            
            <label class="form-label">Target Calories</label>
            <input type="number" name="calories" id="" value={{$target_calories}}>
            @error('calories')
                <i class="form-error">{{message}}</i>
            @enderror 
            <div>
                <input class="form-submit " type="submit">
            </div>
        </form>
    @else
        <h1><i class="icon-checkmark"></i>&nbsp; Congratulations account has been updated</h1>
        <br>
        <a class="button" href="{{route('home')}}"><i class="icon-home3"></i> Go back home</a>
    @endif

    
</div>
@endsection