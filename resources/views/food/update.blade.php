@extends('template')

@section('content')
<div class="component-container">
    {{-- id comes from the view since its passed from the controller --}}
    <form action="{{route('update.food.record',$food_id)}}" class="form" method=post>
        @csrf
        {{-- dont forget csrf --}}

        <span class="form-title">Food update</span>
        <small>
            <span class="form-subtitle">Please write the new values</span>
        </small>
        
        <label for="" class="form-label">Food</label>
        <input type="text" name="food" id="" class="form-input" value="{{$food}}">
        @error('food')
            <span>{{$message}}</span>
        @enderror

        <label for="" class="form-label">Calories</label>
        <input type="number" name="calories" id="" class="form-input" value="{{$calories}}" ">
        @error('calories')
            <span>{{$message}}</span>
        @enderror

        <label for="" class="form-label">Pieces</label>
        <input type="number" name="pieces" id="" class="form-input" value="{{$pieces}}"" > 
        @error('pieces')
            <span>{{$message}}</span>
        @enderror
        
        <label for="" class="form-label">Additional Info</label>
        <textarea name="comment">{{$comment}}</textarea>
        @error('comment')
            <span>{{$message}}</span>
        @enderror

        <input class="form-submit" type="submit" value="Update">
    </form>
</div>
@endsection