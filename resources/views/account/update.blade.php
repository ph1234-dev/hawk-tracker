@extends("template")
@section('content')
<div class="container">
    @if ( $update == true )
        <div class="container-form">
            <div class="container-form-info">
                <span class="title">Account Update</span>
                <img class="form-svg" src="{{url('svg/day72-designer-tool-war.svg')}}">
            </div>
            <form class="form" action="{{route('update.account')}}" method="post">
                @csrf
                <span class="title">Details</span>
                <small>You can write your new personal details here</small>
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
        </div>
    @else
        <div class="panel panel-vertical">
            <img src="{{url('svg/day79-coffee.svg')}}">
            <span class="title">Account has been updated</span> 

            <a class="btn btn-primary" href="{{route('home')}}">Go back home</a>
        </div>
    @endif

    
</div>
@endsection