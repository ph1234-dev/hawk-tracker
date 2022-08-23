@extends("template")
@section("content")

<div class="container">

    <div class="container-form" >
        <div class="container-form-info">
 
            <p class="title">Store Record</p>
            <img class="form-svg" src="{{url('svg/day79-coffee.svg')}}">
            {{-- <img class="svg" src="{{url('svg/day80-tea.svg')}}"> --}}
        </div>
        {{-- <div>
            <p class="title">Store food</p>
            <small>Provide the details below</small>
        </div> --}}
        <form 
            action="{{route('store.food')}}" 
            method="post">    
                {{-- always add csrf --}}
            @csrf
            @if ( isset($status)  )
                <small class="">
                    {{$food}} ({{number_format($calories)}} cal)
                    has been added <i class="icon-checkmark"></i>
                </small>
            @endif 

                {{-- @if($errors->any())
                    <span class="">Please specify the information</span>
                @endif --}}

            <p class="title">Food Information</p>
            <small>Provide the details below</small>

            <label class=" for=">Food</label>
            <input type="text" name="food" id="" >
            @error('food')
                <span class="error">Please specify the information</span>
            @enderror

            <label class="" for="">Approximate Calories</label>
            <input type="number" name="calories" id="" >
            @error('calories')
                <span class="error">Please specify the information</span>
            @enderror

            <label class="" for="">Pieces </label>
            <input type="text" name="pieces" id="" >
            @error('pieces')
                <span class="error">Please specify the information</span>
            @enderror
                
            <label class="" for="comment">Additional info</label>
            <textarea name="comment" ></textarea>
                
            <input type="submit" value="Store">
        </form>
    </div>

</div>
@endsection