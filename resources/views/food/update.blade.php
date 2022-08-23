@extends('template')

@section('content')
    <div class="container">
        <div class="container-form">
            <div class="container-form-info">
                <span class="title">Update Food</span>
                <img class="form-svg" src="{{url('svg/day80-tea.svg')}}">
            </div>
                <form 
                {{-- action="{{route('update.food.record',$food_id)}}"  --}}
                class="form" 
                method=post >
                @csrf
                
                <span class="title">Details</span>
                <small>Please write the new information below</small>
                
                <label for="" class="">Food</label>
                <input type="text" name="food" id="" class="form-input" value="{{$food}}">
                @error('food')
                    <span>{{$message}}</span>
                @enderror

                <label for="" class="">Calories</label>
                <input type="number" name="calories" id="" class="form-input" value="{{$calories}}" >
                @error('calories')
                    <span>{{$message}}</span>
                @enderror

                <label for="" class="">Pieces</label>
                <input type="number" name="pieces" id="" class="form-input" value="{{$pieces}}"> 
                @error('pieces')
                    <span>{{$message}}</span>
                @enderror
                
                <label for="" class="">Additional Info</label>
                <textarea name="comment">{{$comment}}</textarea>
                @error('comment')
                    <span>{{$message}}</span>
                @enderror 

                <input type="submit" value="Update">
            </form>
        </div>
        {{-- id comes from the view since its passed from the controller --}}
        
    </div>
@endsection