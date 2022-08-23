@extends("template")

@section("content")
    <div class="container container-centered">
        <span class="icon-hawk icon-biggest"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
        <span class="title">Account has been created</span>
        <p>You can now login to the application</p>
        <a href="{{route('logout.user')}}" class="btn btn-primary">Go to login page</a>
    </div>
@endsection