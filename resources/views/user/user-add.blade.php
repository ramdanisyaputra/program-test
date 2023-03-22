@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="padding-top:5px">Add User</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
                @error('name')
                    <strong style="color:red">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" autocomplete="new-email" required>
                @error('email')
                    <strong style="color:red">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" autocomplete="new-password" required>
                @error('password')
                    <strong style="color:red">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection
