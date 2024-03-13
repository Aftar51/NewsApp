@extends('home.parent')

@section('content')

<div class="row">
    <div class="card p-4">
        <h3 class="card-title">Change Password</h3>
        <form action="" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Current Password</label>
                <div class="col-sm-10">
                    <input name="current" type="password" class="form-control" placeholder="Current Password">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input name="Password" type="password" class="form-control" placeholder="New Password">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Confirmation Password</label>
                <div class="col-sm-10">
                    <input name="confirmation_password" type="password" class="form-control" placeholder="Confirmation Password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Change Password</button>
        </form>
    </div>
</div>

@endsection
