@extends('author.layouts.app')

@section('title', 'Blogs')

@section('content')
    <div id="page-content">
        <div class="card border-0 rounded-0">
            <div class="card-body d-flex justify-content-between py-2">
                <h3>{{ __('Blogs') }}</h3>
                <a href="{{ route('author.dashboard.blogs.add') }}" class="btn btn-primary px-4 py-2 border-0 rounded-0 shadow-sm">Add New</a>
            </div>
        </div>
        <div class="px-2 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-body">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Meta</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count=1; @endphp
                                    {{-- {{ $blogs }} --}}
                                    @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $count++; }}</td>
                                        <td><img src="{{ asset('assets/img/blog/'.$blog->img) }}" alt="{{ $blog->img }}" width="100" class="img-fluid shadow"></td>
                                        <td>{{ $blog->name }}</td>
                                        <td>{{ substr($blog->post_meta, 0, 80).'...' }}</td>
                                        <td>
                                            <a href="{{ route('author.dashboard.blogs.edit', $blog->id) }}" class="btn btn-sm btn-primary border-0 rounded-0 shadow-sm"><i class="bi bi-pencil"></i></a>
                                            <a href="#DeleteBlogRecordModal_{{ $blog->id }}" data-bs-toggle="modal" data-bs-target="#DeleteBlogRecordModal_{{ $blog->id }}" class="btn btn-sm btn-danger border-0 rounded-0 shadow-sm"><i class="bi bi-trash"></i></a>

                                            <x-delete-record-modal title="DeleteBlogRecordModal_{{ $blog->id }}" url="{{ route('author.dashboard.blogs.delete', $blog->id) }}"/>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
