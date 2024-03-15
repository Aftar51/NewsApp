@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3 class="card-title">
                Update Profile {{ Auth::user()->name }}
                <form action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="col mb-3 mt-3">
                        <label for="" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ $user->profile->first_name }}">
                    </div>
                    <div class="col mb-3">
                        <label for="" class="form-label">Image Profile</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <button type="submit" class="btn btn-warning ">
                        <i class="bi bi-plus"></i>
                        Update Profile
                    </button>
                </form>
            </h3>
        </div>
    </div>
@endsection
