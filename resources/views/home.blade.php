@extends('home.parent')

@section('content')
    <div class="container">
        <div class="row card p-4">
            <h1>
                {{-- // untuk menampilkan nama user yang sedang login --}}
                Welcome {{ Auth::user()->name }}
            </h1>
            <hr>
            <div class="card p-3">
                <h3 class="text-center">Detail Account</h3>
                <ul class="list-group">
                    {{-- // untuk menampilkan detail account user yang sedang login --}}
                    <li class="list-group-item">Name Account = <strong>{{ Auth::user()->name }}</strong></li>
                    {{-- // untuk menampilkan email account user yang sedang login --}}
                    <li class="list-group-item">E-Mail Account = <strong>{{ Auth::user()->email }}</strong></li>
                    {{-- // untuk menampilkan role account user yang sedang login --}}
                    <li class="list-group-item">Role Account = <strong>{{ Auth::user()->role }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
