@extends('home.parent')

@section('content')

<div class="row">
    <div class="card p-4">
        <h1>News Index</h1>

        <div class="d-flex justify-content-end">
            <a href="{{ route('news.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                Create News
            </a>
        </div>

        <hr>

        <div class="container mt-3">
            <div class="card p-3">
                <h5 class="card-title">News Data</h5>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Category</td>
                            <td>News image</td>
                            <td>Category image</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($news as $row)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $row->title }} </td>
                            <td> {{ $row->category->name }} </td>
                            <td>
                                <img src="{{ $row->image }}" alt="images" width="150px" class="rounded">
                            </td>
                            <td>
                                <img src="{{ $row->category->image }}" alt="" width="150px" class="rounded">
                            </td>
                            <td>
                                <a href="{{ route('news.show', $row->id) }}" class="btn btn-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('news.edit', $row->id) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <button class="btn btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                            <h5 class="text-center">
                                Data masih kosong
                            </h5>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection