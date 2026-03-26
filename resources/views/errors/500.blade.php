@extends('frontend.layouts.errors-layout')

@section('title', 'Internal Server Error')

@section('content')
    <section class="py-5 mt-5">
        <div class="container text-center py-5 mt-5">
            <h1 class="display-1 fw-bold">500</h1>
            <h4>Internal Server Error</h4>
            <p>Oops! Something went wrong on our end.</p>
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary rounded-0 shadow-sm">Go back</a>
        </div>
    </section>
@endsection
