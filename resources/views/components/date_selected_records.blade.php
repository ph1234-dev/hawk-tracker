@extends('template')


@section('content')

<div class="container" >

    {{-- error --}}
    @if(count($records) > 0)

        <section>
            <span class="text-title">Previous Record</span>
            <p class="">Heres what you logged last <i>{{$date}}</i> </p>
        </section> 

        <span class="breadcrumb">
            <span class="breadcrumb-info">
                <span>Food consumed <span class="tag"> {{$total_food}}</span> </span>
                <span>Calories Consumed <span class="tag">{{$total_calories}}</span> </span> 
                <span>Target Calories <span class="tag">{{$target_calories}}</span>  </span>
            </span>
            {{-- <span class="breadcrumb-actions">
                <span>
                    <a href="{{route('show.paginated.food.record')}}"><i class="icon icon-fire"></i>&nbsp;Entire Record</a>
                </span>
                <span class="breadcrumb-actions-icon-primary">
                    <a href="{{route('show.food.form')}}"><i class="icon icon-box-add"></i>&nbsp;Add More</a>
                </span>
            </span> --}}
        </span>
        
        <table>
            <thead>
                <tr>
                    <th>Food</th>
                    <th>Calorie </th>
                    <th>Pieces</th>
                    <th>Comments</th>
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