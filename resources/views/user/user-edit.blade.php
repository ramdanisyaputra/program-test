@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="padding-top:5px">Edit User</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('user.update') }}" method="post" autocomplete="off">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                @error('name')
                    <strong style="color:red">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" autocomplete="new-email" required>
                @error('email')
                    <strong style="color:red">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Fill this input if you want to edit password" autocomplete="new-password">
                @error('password')
                    <strong style="color:red">{{ $message }}</strong>
                @enderror
            </div>
            <input type="hidden" name="id" value="{{ $user->id }}">
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection
