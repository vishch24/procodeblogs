@extends('author.layouts.app')

@section('title', 'Add Category')

@section('content')
    <div id="page-content">
        <div class="card border-0 rounded-0">
            <div class="card-body py-2">
                <h3>{{ __('Add Category') }}</h3>
            </div>
        </div>
        <div class="px-2 py-4">
            <div class="container">
                <p>Required fields are marked <span class="text-danger">*</span></p>
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                        <form action="{{ route('author.dashboard.categories.insert') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control shadow-sm" id="floatingName" name="name" placeholder="Enter Category Name" required autofocus autocomplete="name">
                                <label for="floatingName">{{ __('Category Name') }} <span class="text-danger">*</span></label>
                            </div>
                            <input type="submit" value="Submit" class="btn btn-success px-4 py-2 border-0 rounded-0 shadow-sm">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

