@extends('home.parent')

@section('content')
    <div class="card p-4">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center">
                @if (empty(Auth::user()->profile->image))
                <img class="w-75" src="https://ui-avatars.com/api/background=0D8ABC&color=fff&name={{ Auth::user()->name }}" alt="">
                @else
                <img src="{{ Auth::user()->profile->image }}" alt="ini profile image">
                @endif
            </div>
            <div class="col-md-6 text-center">
                <h3>Profile</h3>
                <ul class="list-group">
                    {{-- // untuk menampilkan detail account user yang sedang login --}}
                    <li class="list-group-item">Name Account = <strong>{{ Auth::user()->name }}</strong></li>
                    {{-- // untuk menampilkan email account user yang sedang login --}}
                    <li class="list-group-item">E-Mail Account = <strong>{{ Auth::user()->email }}</strong></li>
                    {{-- // untuk menampilkan role account user yang sedang login --}}
                    <li class="list-group-item">Role Account = <strong>{{ Auth::user()->role }}</strong></li>
                </ul>
                <a href="{{ route('createProfile') }}" class="btn btn-info m-2">
                    <i class="bi bi-plus"></i>
                    Create Profile
                </a>
            </div>
        </div>
    </div>
@endsection