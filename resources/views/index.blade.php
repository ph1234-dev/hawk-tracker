@extends("template")

@section("content")

<div class="component-container">
    <h1>Data</h1>
    {{-- <a href="{{route('show.list.food')}}">Show Record</a> --}}
</div>

@include('components/daily_record')

@endsection