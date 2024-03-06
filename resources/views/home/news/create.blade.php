@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3>News Create</h3>

            <form action="{{ 'news.store' }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="md-2">
                    <label for="inputTitle" class="form-label">News Title</label>
                    <input type="text" class="form-control" id="inputTitle" name="Title" value="{{ old('title') }}">
                </div>

                <div class="md-2">
                    <label for="inputimage" class="form-label">News image</label>
                    <input type="file" class="form-control" id="inputimage" name="image" value="{{ old('image') }}">
                </div>

                @foreach ($category as $row)
                    <div class="col">
                        ID = {{ $row->id }}
                        NAME = {{ $row->name }}
                    </div>
                @endforeach

                <div class="md-2">
                    <label class="col col-form-label">Content News</label>
                    <textarea id="editor" name="content"></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-plus"></i>
                        Crate News
                    </button>
                </div>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            console.log(editor);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>
            </form>
        </div>
    </div>
@endsection
