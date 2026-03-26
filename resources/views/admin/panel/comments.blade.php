@extends('admin.layouts.app')

@section('title', 'Comments')

@section('content')
    <div id="page-content">
        <div class="card border-0 rounded-0">
            <div class="card-body py-2">
                <h3>{{ __('Comments') }}</h3>
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
                                        <th>Blog</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>RepliedTo</th>
                                        <th>Approved</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count=1; @endphp
                                    {{-- {{ $blogs }} --}}
                                    @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $count++; }}</td>
                                        <td><img src="{{ asset('assets/img/blog/'.$comment->blog->img) }}" alt="{{ $comment->blog->img }}" width="100" class="img-fluid shadow"></td>
                                        <td>{{ $comment->name }}</td>
                                        <td>{{ $comment->email }}</td>
                                        <td>{{ strlen($comment->description) > 80 ? substr($comment->description, 0, 80).'...' : $comment->description }}</td>
                                        <td>
                                            @if ($comment->parent_id)
                                                @if (strlen($comment->parent->description) > 80)
                                                    <i class="bi bi-arrow-return-right"></i>
                                                    <span class="fw-bold">{{ $comment->parent->name }}</span>: {{ substr($comment->parent->description, 0, 80).'...' }}
                                                @else
                                                    <i class="bi bi-arrow-return-right"></i>
                                                    <span class="fw-bold">{{ $comment->parent->name }}</span>: {{ $comment->parent->description }}
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if ($comment->approved == 'yes')
                                                <span class="badge text-bg-success">YES</span>
                                            @else
                                                <span class="badge text-bg-danger">NO</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.comments.edit', $comment->id) }}" class="btn btn-sm btn-primary border-0 rounded-0 shadow-sm"><i class="bi bi-pencil"></i></a>
                                            <a href="#DeleteCommentRecordModal_{{ $comment->id }}" data-bs-toggle="modal" data-bs-target="#DeleteCommentRecordModal_{{ $comment->id }}" class="btn btn-sm btn-danger border-0 rounded-0 shadow-sm"><i class="bi bi-trash"></i></a>

                                            <x-delete-record-modal title="DeleteCommentRecordModal_{{ $comment->id }}" url="{{ route('admin.comments.delete', $comment->id) }}"/>
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
