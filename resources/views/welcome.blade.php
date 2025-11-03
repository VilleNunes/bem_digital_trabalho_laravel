@extends('frontend.layouts.app')

@section('content')
<!-- Navbar -->
@include('frontend.layouts.partials.header')

<!-- Carousel-->
@include('frontend.layouts.partials.carousel')
 
<!-- Hero Section -->
@include('frontend.layouts.partials.hero-section')


    <!-- Campaigns Section -->

    
    <!-- About Us Section -->
    @include('frontend.layouts.partials.about')

    @include('frontend.layouts.partials.footer')


@endsection