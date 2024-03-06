@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3>Category Index</h3>


            <div class="d-flex justify-content-end">
                <a href="{{ route('category.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i>
                    Create Category</a>
            </div>

            {{-- menampilkan alert success --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Category</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- menampilkan data dengan
                                     perulangan forelse dari category model --}}

                                @forelse ($category as $row)
                                    <tr>
                                        {{-- numbering menggunakan loop->iteration --}}
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- menampilkan data name --}}
                                        <td>{{ $row->name }}</td>
                                        {{-- menampilkan data slug --}}
                                        <td>{{ $row->slug }}</td>
                                        {{-- menampilkan data image --}}
                                        {{-- fungsi accessor image pada model category 
                                        adalah untuk menampilkan image 
                                        tanpa harus menulis path secara manual
                                        --}}
                                        <td>
                                            <img src="{{ $row->image }}" alt="image" width="100px">
                                        </td>
                                        <td>
                                            {{-- show using modal with id {{ row->id }} --}}
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#basicModal{{ $row->id }}" data-bs-placement="bottom" title="Show Category">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            {{-- // modal dari modal-show.blade.php --}}
                                            @include('home.category.include.modal-show')

                                            {{-- button edit with 
                                                route category.edit {{ row->id }} --}}
                                            <a href="{{ route('category.edit', $row->id) }}" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Category">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            {{-- button delete with 
                                                route category.destroy {{ row->id }} --}}
                                                <form action="{{ route('category.destroy', $row->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <p>data masih kosong</p>
                                @endforelse

                            </tbody>
                        </table>
                        {{-- //pagination diambil dari category model --}}
                        {{-- // paginate berfungsi untuk membatasi jumlah data yang ditampilkan --}}
                        {{ $category->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
