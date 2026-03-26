@extends('admin.layouts.app')

@section('title', 'Users - Admin Dashboard')

@section('content')
    <div id="page-content">
        <div class="card border-0 rounded-0">
            <div class="card-body d-flex justify-content-between py-2">
                <h3>{{ __('Users') }}</h3>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Description</th>
                                        <th>Social Links</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count=1; @endphp
                                    {{-- {{ $blogs }} --}}
                                    @foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $count++; }}</td>
                                        <td><img src="{{ $author->img ? asset('dashboard/assets/img/avatar/'.$author->img) : asset('dashboard/assets/img/avatar/avatar-1.png') }}" alt="{{ $author->img ?? 'avatar-1.png' }}" width="60" class="img-fluid shadow"></td>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->email }}</td>
                                        <td>{{ substr($author->description, 0, 30).'...' }}</td>
                                        <td>
                                            <?= $author->facebook ? '<a href="'.$author->facebook.'" class="btn btn-sm btn-primary rounded-circle" target="_blank"><i class="bi bi-facebook"></i></a>' : '' ?>
                                            <?= $author->instagram ? '<a href="'.$author->instagram.'" class="btn btn-sm btn-danger bg-gradient opacity-75 rounded-circle" target="_blank"><i class="bi bi-instagram"></i></a>' : '' ?>
                                            <?= $author->linkedin ? '<a href="'.$author->linkedin.'" class="btn btn-sm btn-primary rounded-circle" target="_blank"><i class="bi bi-linkedin"></i></a>' : '' ?>
                                            <?= $author->x_twitter ? '<a href="'.$author->x_twitter.'" class="btn btn-sm btn-light rounded-circle" target="_blank"><i class="bi bi-twitter-x"></i></a>' : '' ?>
                                        </td>
                                        <td>
                                            <a href="#DeleteAuthorRecordModal_{{ $author->id }}" data-bs-toggle="modal" data-bs-target="#DeleteAuthorRecordModal_{{ $author->id }}" class="btn btn-sm btn-danger border-0 rounded-0 shadow-sm"><i class="bi bi-trash"></i></a>
                                            <x-delete-record-modal title="DeleteAuthorRecordModal_{{ $author->id }}" url="{{ route('admin.authors.delete', $author->id) }}"/>
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
