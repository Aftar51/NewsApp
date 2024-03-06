@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3>Category Update</h3>

            <hr>

            {{-- // menampilkan alert error --}}
            @if ($errors->any())
                <div class="alert   alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- // menampilkan form update category --}}
            {{-- // form menggunakan method put --}}
            {{-- // form menggunakan enctype="multipart/form-data" --}}
            {{-- // form menggunakan action route category.update dengan parameter id --}}
            {{-- // kenapa menggunakan enctype="multipart/form-data"? --}}
            {{-- // karena kita akan mengupload file image --}}
            {{-- // kenapa menggunakan method put? --}}
            {{-- // karena kita akan mengupdate data --}}

            <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <label for="inputName" class="form-label">Category Name</label>
                    {{-- // fungsi name pada input adalah untuk menentukan nama field --}}
                    {{-- // value pada input adalah untuk menampilkan data --}}
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ $category->name }}">
                </div>

                <div class="col-12">
                    <label for="inputImage" class="form-label">Category Image</label>
                    <input type="file" class="form-control" id="inputImage" name="image">
                </div>

                <div class="d-flex justify-content-end mt-2">
                    {{-- //button a untuk kembali ke halaman category.index --}}
                    <a href="{{ route('category.index') }}" class="btn btn-primary mx-2">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    {{-- //button type submit untuk mengirimkan data --}}
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                        Update Category
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection
