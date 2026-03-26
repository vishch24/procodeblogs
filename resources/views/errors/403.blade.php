@extends('frontend.layouts.errors-layout')

@section('title', 'Access Denied')

@section('content')
    <section class="py-5 mt-5">
        <div class="container text-center py-5 mt-5">
            <h1 class="display-1 fw-bold">403</h1>
            <h4>Forbidden Error</h4>
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary rounded-0 shadow-sm">Go back</a>
        </div>
    </section>
@endsection
