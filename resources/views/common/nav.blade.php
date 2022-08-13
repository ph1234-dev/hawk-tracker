<div class="parent-container" >
    <nav class="navbar">
        <ul class="navbar-left">
            @if(session()->has('user'))
                <li class="navbar-link" > 
                    <a href="{{route('home')}}" > 
                        Home
                    </a>
                </li>
                <li class="navbar-link">
                    <a href="{{route('show.food.form')}}">
                        Add
                    </a>
                </li>
                <li class="navbar-link">
                    <a href="{{route('show.paginated.food.record')}}">
                        Record
                    </a>
                </li>
                <li class="navbar-link">
                    <a href="{{route('show.weekly.report')}}">
                        Report
                    </a>
                </li>
            @else
                <li class="navbar-link">
                    <a  href="{{route('landing')}}"> 
                        <span class="icon icon-hawk"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
                        Tracker
                    </a>
                </li>
            @endif
        </ul>
        <ul class="navbar-right">
            @if(session()->has('user'))
                <li class="navbar-link"><span>{{session("user")}}</span></li>
                <li class="navbar-link">
                    <a href="{{route('retrieve.account')}}">
                        <i class="icon icon-cog"></i>
                        Update
                    </a>
                </li>
                {{-- <li class="navbar-link"><a href="{{route('retrieve.account')}}"><i class="icon-pencil"></i>&nbsp;Update</a></li> --}}
                <li class="navbar-link">
                    <a href="{{route('logout.user')}}">
                        <i class="icon icon-exit"></i>
                        Log Out
                    </a>
                </li>
            @else
                <li class="navbar-link">
                    <a href="{{route('show.register.form')}}">
                        <i class="icon icon-pencil"></i>
                        Sign Up
                    </a>
                </li>
                <li class="navbar-link">
                    <a href="{{route('show.login.form')}}">
                        <i class="icon icon-enter"></i>
                        Sign In
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</div>