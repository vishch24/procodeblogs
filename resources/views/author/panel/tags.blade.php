@extends('author.layouts.app')

@section('title', 'Tags')

@section('content')
    <div id="page-content">
        <div class="card border-0 rounded-0">
            <div class="card-body d-flex justify-content-between py-2">
                <h3>{{ __('Tags') }}</h3>
                <a href="{{ route('author.dashboard.tags.add') }}" class="btn btn-primary px-4 py-2 border-0 rounded-0 shadow-sm">Add New</a>
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
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count=1; @endphp
                                    @foreach ($tags as $tg)
                                        <tr>
                                            <td>{{ $count++; }}</td>
                                            <td>{{ $tg->name }}</td>
                                            <td>
                                                <a href="{{ route('author.dashboard.tags.edit', $tg->id) }}" class="btn btn-sm btn-primary border-0 rounded-0 shadow-sm"><i class="bi bi-pencil"></i></a>
                                                <a href="#DeleteTagRecordModal_{{ $tg->id }}" data-bs-toggle="modal" data-bs-target="#DeleteTagRecordModal_{{ $tg->id }}" class="btn btn-sm btn-danger border-0 rounded-0 shadow-sm"><i class="bi bi-trash"></i></a>

                                                <x-delete-record-modal title="DeleteTagRecordModal_{{ $tg->id }}" url="{{ route('author.dashboard.tags.delete', $tg->id) }}"/>
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
