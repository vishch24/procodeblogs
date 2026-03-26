@extends('frontend.layouts.errors-layout')

@section('title', 'Service Unavailable')

@section('content')
    <section class="py-5 mt-5">
        <div class="container text-center">
            <h1 class="display-1 fw-bold">503</h1>
            <h4>Service Unavailable</h4>
            <p>We're down for maintenance. Please check back later.</p>
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary rounded-0 shadow-sm">Go back</a>
        </div>
    </section>
@endsection
