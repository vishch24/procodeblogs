@extends('author.layouts.app')

@section('title', 'Edit Comment')

@section('content')
    <div id="page-content">
        <div class="card border-0 rounded-0">
            <div class="card-body py-2">
                <h3>{{ __('Edit Comment') }}</h3>
            </div>
        </div>
        <div class="px-2 py-4">
            <div class="container">
                <p>Required fields are marked <span class="text-danger">*</span></p>
                <div class="row">
                    <div class="col-xxl-5 col-xl-5 col-lg-12 col-md-12">
                        <table class="table w-100">
                            <tbody>
                                <tr>
                                    <th>Blog</th>
                                    <td>
                                        <img src="{{ asset('assets/img/blog/' . $comment->blog->img) }}"
                                            alt="{{ $comment->blog->img }}" width="100" class="img-fluid mb-2 shadow">
                                        <p>{{ $comment->blog->name }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $comment->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $comment->email }}</td>
                                </tr>
                                <tr>
                                    <th>Comment</th>
                                    <td>{{ (strlen($comment->description) > 80) ? substr($comment->description, 0, 80).'...' : $comment->description }}</td>
                                </tr>
                                @if ($comment->parent_id)
                                    <tr>
                                        <th>RepliedTo</th>
                                        <td>
                                            <i class="bi bi-arrow-return-right"></i>
                                            <span class="fw-bold">{{ $comment->parent->name }}</span>:
                                            {{ (strlen($comment->parent->description) > 80) ? substr($comment->parent->description, 0, 80).'...' : $comment->parent->description }}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xxl-7 col-xl-7 col-lg-12 col-md-12">
                        <form action="{{ route('author.dashboard.comments.update', $comment->id) }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <textarea type="text" class="form-control h-auto shadow-sm" id="floatingComment" name="description"
                                    placeholder="Edit Comment" rows="5" required="">{{ $comment->description }}</textarea>
                                <label for="floatingComment">Edit Comment <span class="text-danger">*</span></label>
                            </div>
                            <input type="submit" value="Submit"
                                class="btn btn-success px-4 py-2 border-0 rounded-0 shadow-sm">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
