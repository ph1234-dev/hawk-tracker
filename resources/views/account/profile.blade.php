@extends('template')

@section('content')
    <div class="component-container">
        <h2>Personal Information</h2>
        <table>
            <tbody>
                <tr>
                    <td><b>Username</b></td>
                    <td>{{$username}}</td>
                </tr>
                <tr>
                    <td><b>Name</b></td>
                    <td>{{$name}}</td>
                </tr>
                <tr>
                    <td><b>Password</b></td>
                    <td>{{$password}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <a class="button" href="{{route('retrieve.account')}}"><i class="pencil"></i>&nbsp; Update Profile</a>
    </div>
@endsection