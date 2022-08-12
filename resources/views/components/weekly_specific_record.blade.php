@extends('template')

@section('content')
    <div class="component-container">
        <span class="text-title">Record</span>
        <span><strong>Information</strong></span>
        <ul class="breadcrumbs-info" style="margin-top: var(--padding-top)">
            <li>Target Calories <span class="tag">{{$target_calories}}</span></li>
            <li>Total Calories <span class="tag">{{$total_calories}}</span></li>
        </ul>
        <table>
            <thead>
                <tr>
                    <td>Food</td>
                    <td>Calories</td>
                    <td>Pieces</td>
                    <td>Comment</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr>
                        <td>{{$record->food}}</td>
                        <td>{{number_format($record->calories)}}</td>
                        <td>{{$record->pieces}}</td>
                        <td>{{$record->comment}}</td>
                        <td>
                            <span>
                                <a href="{{route('delete.stored.food',$record->id)}}"><i class="icon-bin"></i></a>
                                &nbsp;
                                <a href="{{route('show.food.update.page',$record->id)}}"><i class="icon-pencil"></i></a>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection