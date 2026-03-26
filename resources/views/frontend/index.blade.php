@extends('frontend.layouts.master')

@section('title', 'ProcodeBlogs - A Simple Blog System Build in Laravel')

@section('content')

    <!-- Page header with logo and tagline-->
    @include('frontend.layouts.header')

    <!-- Page content-->
    <section class="py-5">
        <div class="container">
            <div class="row gy-5">
                <!-- Blog entries-->
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-7">
                    @include('frontend.components.feature-blog')

                    @include('frontend.components.non-featured-blogs')

                    @include('frontend.components.pagination')

                    <!-- Pagination Links -->
                    {{-- <div class="pagination justify-content-center">
                        {{ $blogs->links() }}
                    </div> --}}
                </div>
                <!-- Side widgets-->
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5">
                    @include('frontend.components.sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
