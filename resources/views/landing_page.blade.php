@extends('template')
@section('content')

    {{-- <div style="margin: auto"> --}}
        {{--  --}}

        {{-- free illustrations --}}
        {{-- https://illlustrations.co/ --}}
         {{-- load image in laravel with vite--}}
            {{-- https://laravel-vite.dev/guide/essentials/working-with-assets.html#references-in-code --}}
            
        <div class="container">
            <div class="panel">
                <img  src="{{url('svg/day79-coffee.svg')}}">
                <div class="panel panel-vertical ">
                    <span class="title-bigger">
                        Tracker &#169;
                    </span>   
                    <p class="">
                            No need to use paper to 
                            track what you eat separately. 
                    </p>
                    <p class="">
                        <strong>Tracker</strong> is a " free online toolbox" created to 
                        simplify the way you keep track of what you eat.
                    </p>
                    
                    <button id="landing-page-main-button" 
                    class="btn-primary btn-round btn-scale-up">
                        Explore Tool <i class="icon icon-arrow-right2"></i>
                    </button>
                </div>
                {{-- <img  src="{{url('svg/day79-coffee.svg')}}"> --}}
                    
            </div>

        </div>
        
    {{-- </div> --}}
    
    <div class="panel panel-vertical panel-centered" style="background: gold">
        <div class="util-text-align-center">
            <span class="title-big">Application Features</span>
            <p>These are whay you can do in the application</p>
        </div>
        <div class="panel ">
            <div class="container container-split-2" >
                <div class="block">
                    {{-- <img  src="{{url('svg/day80-tea.svg')}}"> --}}
                    <i class="icon-big icon-spoon-knife"></i>
                    <span class="title">Daily Entries</span>
                    <p class="subtitle">Log your daily consumption to track what you eat</p>
                </div >
                <div class="block">
                    <i class="icon-big icon-stats-bars2"></i>
                    <span class="title">Weekly Report</span>
                     <p class="subtitle">Show summary of what you at this week</p>
                </div>
                <div class="block">
                    <i class="icon-big icon-books"></i>
                    <span class="title">Summary Report</span>
                    <p class="subtitle">Show all the entries you took</p>
                </div >
                <div class="block">
                    <i class="icon-big icon-box-add"></i>
                    <span class="title">Etc.</span>
                     <p class="subtitle">New exciting features will be added soon.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-vertical panel-centered" >
        <div class="util-text-align-center">
            <span class="title-big">Device Support</span>
            <p>These application can run in various operating systems</p>
        </div>
        <div class="panel ">
            <div class="block">
                <i class="icon-big icon-android"></i>
                <span class="title">Android</span>
            </div>
            <div class="block">
                <i class="icon-big icon-windows8"></i>
                <span class="title">Windows</span>
            </div >
            <div class="block"  >
                <i class="icon-big icon-finder"></i>
                <span class="title">Macintosh</span>
            </div>
        </div>
        
    </div> 

    <div class="panel panel-vertical panel-centered" style="background: rgba(231,231,231)">
        <div class="util-text-align-center">
            <span class="title-big ">Browser Support</span>
            <p>The application can run in most of the modern browsers out there</p>
        </div>
        <div class="panel">
            <div class="block">
                <i class="icon-big icon-chrome"></i>
                <span class="title">Chrome</span>
            </div>
            
            <div class="block">
                <i class="icon-big icon-firefox"></i>
                <span class="title">Firefox</span>
            </div>
            
            <div class="block">
                <i class="icon-big icon-edge"></i>
                <span class="title">Edge</span>
            </div>
        </div>
    </div>

@endsection