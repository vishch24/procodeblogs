@extends('author.layouts.app')

@section('title', 'Add Blog')

@section('content')
    <div id="page-content">
        <div class="card border-0 rounded-0">
            <div class="card-body py-2">
                <h3>{{ __('Add Blog') }}</h3>
            </div>
        </div>
        <div class="px-2 py-4">
            <div class="container">
                <form action="{{ route('author.dashboard.blogs.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p>Required fields are marked <span class="text-danger">*</span></p>
                    <div class="row">
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control shadow-sm" id="floatingFile" name="img" accept=".jpeg,.png,.jpg"
                                    placeholder="Enter Blog Image" required>
                                <label for="floatingFile">{{ __('Blog Image') }} <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-5 col-lg-6 col-md-8">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control shadow-sm" id="floatingTitle" name="name"
                                    placeholder="Enter Blog Title" required>
                                <label for="floatingTitle">{{ __('Blog Title') }} <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                            <select class="form-select select2 shadow-sm" id="floatingCat" name="cat_id[]" multiple="multiple" placeholder="Select Categories" required>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }} <span class="text-danger">*</span></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                            <select class="form-select select2 shadow-sm" id="floatingTag" name="tag_id[]" multiple="multiple" placeholder="Select Tags" required>
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }} <span class="text-danger">*</span></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control shadow-sm" id="floatingSlug" name="slug"
                                    placeholder="Enter URL Slug" required>
                                <label for="floatingSlug">{{ __('URL Slug') }} <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                            <div class="form-floating mb-3">
                                <textarea type="text" class="form-control h-auto shadow-sm" id="floatingMeta" name="post_meta"
                                    placeholder="Enter Post Meta" rows="8" required></textarea>
                                <label for="floatingMeta">{{ __('Post Meta') }} <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-5 col-lg-6 col-md-8">
                            <div class="zform-floating mb-3">
                                <textarea type="text" class="form-control h-auto shadow-sm editor" id="post_desc" name="post_desc"
                                    placeholder="Enter Post Description" rows="8"></textarea>
                                {{-- <label for="floatingDesc">{{ __('Post Description') }} <span class="text-danger">*</span></label> --}}
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" value="Submit" class="btn btn-success px-4 py-2 border-0 rounded-0 shadow-sm">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
