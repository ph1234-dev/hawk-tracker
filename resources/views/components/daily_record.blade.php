@extends('template')


@section('content')

<div class="component-container" >

    {{-- error --}}
    @if(count($records) > 0)

        <section>
            <span class="text-title">Daily Record</span>
            <p>Heres what you have taken today <strong> {{$date}}</strong> so far</p>
        </section> 

        <span class="breadcrumb">
            <span class="breadcrumb-info">
                <span>Food consumed <span class="tag"> {{$total_food}}</span> </span>
                <span>Consumed <i class="icon icon-spoon-knife"></i> <span class="tag">{{$total_calories}} cal</span> </span> 
                <span>Target<i class="icon icon-target"></i> <span class="tag">{{$target_calories}} cal</span>  </span>
            </span>
            <span class="breadcrumb-actions">
                <span>
                    <a href="{{route('show.paginated.food.record')}}"><i class="icon icon-fire"></i>&nbsp;Entire Record</a>
                </span>
                <span class="breadcrumb-actions-icon-primary">
                    <a href="{{route('show.food.form')}}">Add More</a>
                </span>
            </span>
        </span>
        
        <table>
            <thead>
                <tr>
                    <th>Food</th>
                    <th>Calorie </th>
                    <th>Pieces</th>
                    <th>Comments</th>
                    {{-- <th>Date</th> --}}
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $data)
                    <tr>
                        <td>{{$data->food}}</td>
                        <td>{{number_format($data->calories)}}</td>
                        <td>{{$data->pieces}}</td>
                        <td>{{$data->comment}}</td>
                        {{-- <td >{{$data->date}}</td> --}}
                        <td style="display: flex; gap: var(--padding-left);">
                            <a class="" href="{{route('delete.stored.food',$data->id)}}">
                                <i class="icon icon-bin"></i>
                                &nbsp;Delete
                            </a>
                            <a class="" href="{{route('show.food.update.page',$data->id)}}">
                                <i class="icon icon-pencil"></i>
                                &nbsp;Update
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    

    @else
        <div style="margin: auto; text-align: center">
            <div class="text-title" style="margin-top: 10rem !important">You have no record today</div>
            <div class="" style="margin-bottom: 3ch !important">Start adding what you consumed today!<br></div>
            <a class="button" href="{{route('show.food.form')}}">Add</a>
        </div>
    @endif

</div>
@endsection