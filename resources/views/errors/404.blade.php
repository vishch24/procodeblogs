@extends('frontend.layouts.errors-layout')

@section('title', 'Page Not Found')

@section('content')
    <section class="py-5 mt-5">
        <div class="container text-center py-5 mt-5">
            <h1 class="display-1 fw-bold">404</h1>
            <h4>Page Not Found</h4>
            <p>Sorry, the page you are looking for does not exist.</p>
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary rounded-0 shadow-sm">Go back</a>
        </div>
    </section>
@endsection
