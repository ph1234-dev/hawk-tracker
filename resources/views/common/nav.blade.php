<nav class="nav">
    <span class="nav-content">
        @if(session()->has('user'))
            <a href="{{route('home')}}" class="nav-link">
                {{-- <span class="icon-hawk "><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span> --}}
                <i class="icon icon-home3"></i>Home
            </a>
            <a href="{{route('show.food.form')}}" class="nav-link">Store</a>
            {{-- <a href="{{route('show.paginated.food.record')}}" class="nav-link">Record</a> --}}
            <a href="{{route('report.daily')}}">Daily Report</a>
            <a href="{{route('report.calendar')}}" class="nav-link">Monthly Summary</a>
            {{-- <a href="{{route('show.weekly.report')}}" class="nav-link">Report</a> --}}
            <span class="nav-link nav-link-push-left">{{session("user")}}</span>
            <a href="{{route('retrieve.account')}}" class="nav-link">Profile</a>
            <a href="{{route('logout.user')}}" class="nav-link">
                <i class="icon icon-exit"></i>
                Log Out
            </a>
        @else
            <a href="{{route('landing')}}" class="nav-link">
                <span class="icon icon-hawk"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
                Tracker
            </a>
            <a href="{{route('show.register.form')}}" class="nav-link nav-link-push-left"> Sign Up</a>
            <a href="{{route('show.login.form')}}" class="nav-link"> <i class="icon icon-enter"></i>Sign In</a>


        @endif
    </span>
</nav>