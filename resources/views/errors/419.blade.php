@extends('frontend.layouts.errors-layout')

@section('title', 'Session Expired')

@section('content')
    <section class="py-5 mt-5">
        <div class="container text-center py-5 mt-5">
            <h1 class="display-1 fw-bold">419</h1>
            <h4>Session Expired</h4>
            <p>Your session has expired. Please refresh the page and try again.</p>
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary rounded-0 shadow-sm">Go back</a>
        </div>
    </section>
@endsection
