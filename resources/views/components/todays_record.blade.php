@extends('template')


@section('content')

<div class="container" >

    {{-- error --}}
    @if(count($records) > 0)

        <span class="title-big">Today's Record</span>
        <p>Here is what you have recorded today.</p>
        {{-- <script>alert("wtf")</script> --}}
        {{-- inject vue js component here --}}

        <span class="actionbar">
            {{-- <span>Summary <b>&#187;</b></span> <b>&#187;</b>  --}}
            <span class="actionbar-info">Consumed {{$total_calories}} cal</span>
            <span class="actionbar-info">Target {{$target_calories}} cal</span>
            <a class="actionbar-action" href="{{route('show.food.form')}}"> 
                <b>+</b>&nbsp;Add Record
            </a>
        </span> 
        
        <table>
            <caption>Food Record</caption>
            <thead>
                <tr>
                    <th width="25%">Food</th>
                    <th width="10%">Calories</th>
                    <th width="15%">Pieces</th>
                    <th >Comments</th>
                    {{-- <th>Date</th> --}}
                    <th width="5%" >Delete</th>
                    <th width="5%" >Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $data)
                    <tr>
                        <td class="">{{$data->food}}</td>
                        <td class="">{{number_format($data->calories)}} </td>
                        <td class="">{{$data->pieces}}</td>
                        <td>{{$data->comment}}</td>
                        {{-- <td >{{$data->date}}</td> --}}
                        {{-- <td class="table-col-action">
                            <a class="table-col-action-button" href="{{route('delete.stored.food',$data->id)}}">
                                <i class="icon icon-bin"></i>
                            </a>
                            <a class="table-col-action-button" href="{{route('show.food.update.page',$data->id)}}">
                                <i class="icon icon-pencil"></i>
                            </a>
                        </td> --}}

                        <td class="td-centered">
                            <a class="table-col-action-button" href="{{route('delete.stored.food',$data->id)}}">
                                <i class="icon icon-bin"></i>
                            </a>
                        </td>
                        <td class="td-centered">
                            <a class="table-col-action-button" href="{{route('show.food.update.page',$data->id)}}">
                                <i class="icon icon-pencil"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    

    @else
        <div class="container container-centered" >
            <img  src="{{url('svg/107-healthy.svg')}}">
            <span class="title">Have you eated already?</span>
            <a class="btn btn-primary" style="margin-top: 2rem;" href="{{route('show.food.form')}}">Add Record</a>
        </div>
    @endif

</div>
@endsection