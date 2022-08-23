@extends('template')

@section('content')
    <div class="container">

        {{-- <paginated-table :records="{{json_encode($data)}}"></paginated-table> --}}
        <paginated-table></paginated-table>
        {{-- <table>
            <thead>
                <tr>
                    <th width="20%">Date</th>
                    <th>Foods taken</th>
                    <th>Total Calories</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $instance)
                    <tr>
                        <td>{{$instance->date}}</td>
                        <td>{{number_format($instance->total_calories)}}</td>
                        <td>{{number_format($instance->total_foods)}}</td>
                        <td><a>View Record</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
    </div>
@endsection