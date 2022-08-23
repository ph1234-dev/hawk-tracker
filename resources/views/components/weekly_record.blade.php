@extends('template')

@section('content')

<div class="container">
    <span class="text-title">Weekly Record</span>
    <span class="breadcrumb">
        <span class="breadcrumb-info">
            <span>Summary of your weekly records</span>
        </span>
        <span class="breadcrumb-actions">
            <input type="date">
        </span>
    </span>
    <table>
        <thead>
            <tr>
                {{-- <th>Food</th> --}}
                <th>Food taken</th>
                <th>Calories Consumed</th>
                <th>Week</th>
                <th>Actions</th>
                {{-- <th>Comments</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{number_format($record->food_count)}}</td>
                    <td>{{number_format($record->total_calories_eaten_that_week)}}</td>
                    <td>{{$record->week}}</td>
                    <td>
                        {{-- <a href="{{route('show.weekly.report.specific', $record->start_day_of_week)}}">
                            <i class="icon icon-circle-right"></i>
                        </a> --}}
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection