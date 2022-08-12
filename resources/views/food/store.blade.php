@extends("template")
@section("content")

<div class="component-container" style="justify-content: center; align-items: center ">
    
        {{-- check if stored --}}

        {{-- @if ( @isset($status) == $is_stored)  --}}

        @if ( isset($status)  )
            
            <span class="text-notification">
                <i class="icon icon-spoon-knife"></i>&nbsp;{{$food}} ({{number_format($calories)}} cal) has been added
            </span>
            @if ( $status == 1)
               <p>You have now consumed {{$total_calories}} calories</p>
            @endif


        @endif 

        <form class="form" action="{{route('store.food')}}" method="post">    
            {{-- always add csrf --}}
            @csrf
            <span class="form-title">Store Food</span>
            <small>
                <span class="form-subtitle">Add your food here</span>
            </small>
            @if($errors->any())
                {{-- {{$errors}} --}}
                <span class="form-error">Please specify the information</span>
            @endif

            <label class="form-label" for="">Food</label>
            <input type="text" name="food" id="" >
            @error('food')
                <span class="form-error">Please specify the information</span>
            @enderror

            <label class="form-label" for="">Approximate Calories</label>
            <input type="number" name="calories" id="" >
            @error('calories')
                <span class="form-error">Please specify the information</span>
            @enderror

            <label class="form-label" for="">Pieces </label>
            <input type="text" name="pieces" id="" >
            @error('pieces')
                <span class="form-error">Please specify the information</span>
            @enderror
            
            <label class="form-label" for="comment">Additional info</label>
            <textarea name="comment" ></textarea>
            
            <input class="form-submit" type="submit" value="Store">
        </form>
    </div>
</div>

@endsection