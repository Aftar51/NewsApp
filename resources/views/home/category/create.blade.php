@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3>Create Category</h3>
            <hr>

            {{-- menampilkan error validasi --}}

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {{-- menampilkan error validasi --}}
                        {{-- jika terjadi error validasi --}}
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        {{-- menampilkan error validasi --}}
                        {{-- jika terjadi error validasi --}}
                    </ul>
                </div>
            @endif

            {{-- route store --}}
            {{-- untuk melakukan penambahan data --}}
            {{-- untuk enctype 
                melakukan input 
                karena ada upload berupa file --}}
            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                {{-- csrf sebagai token authentikasi --}}
                @csrf
                {{-- method jenis yang digunakan --}}
                @method('POST')

                <div class="col-12">
                    <label for="inputName" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name') }}">
                </div>

                <div class="col-12">
                    <label for="inputImage" class="form-label">Category Image</label>
                    <input type="file" class="form-control" id="inputImage" name="image">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mt-2">
                        <i class="bi bi-plus"></i>
                        Create Category
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
