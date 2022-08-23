@extends("template")

@section("content")
    <div class="container">
        
        <span class="title">Record last date</span>
        
        <div class="actionbar">
            <span class="actionbar-info">Summary</span>
            <span class="actionbar-info">Total Calories {{$calories}}</span>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Food</th>
                    <th>Calories</th>
                    <th>Pieces</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $val)
                    <tr>
                        <td>{{$val->food}}</td>
                        <td>{{$val->calories}}</td>
                        <td>{{$val->pieces}}</td>
                        <td>{{$val->comment}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection