@extends('home.parent')

@section('content')
    ini halaman profile {{ Auth::user()->name }}
@endsection