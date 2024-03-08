@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3>News Create</h3>

            @if ($errors->any())
                @foreach ($errors->all() as $e)
                    {{ $e }}
                @endforeach
            @endif

            <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="md-2">
                    <label for="inputTitle" class="form-label">News Title</label>
                    <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $news->title }}">
                </div>

                <div class="md-2">
                    <label for="inputimage" class="form-label">News image</label>
                    <input type="file" class="form-control" id="inputimage" name="image" value="{{ old('image') }}">
                </div>

                <div class="mb-2">
                    <label class="col-sm-2 col-form-label">select</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select explane" name="category_id">
                            <option selected value="{{ $news->category->name }}">{{ $news->category->name }}</option>
                            <option selected>===== choose Category =====</option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="md-2">
                    <label class="col col-form-label">Content News</label>
                    <textarea id="editor" name="content">
                        {!! $news->content !!}
                    </textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-plus"></i>
                        Crate News
                    </button>
                </div>
            </form>
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
        </div>
    </div>
@endsection