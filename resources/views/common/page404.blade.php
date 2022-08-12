@extends('..template')

@section('content')
    <div 
        class="component-container" 
        style="display: flex; flex-direction: column; gap: 2rem; align-items: center; text-align: center">
        <span class="text-giant-title-max">404</span>
        <span class="text-hero-subtitle">PAGE NOT FOUND!</span>
        <p>The page you were looking for could not be found.</p>
        <button class="button-primary">GO TO HOME PAGE</button>
        <span>&copy; 2019. All rights reserved</span>
    </div>
@endsection