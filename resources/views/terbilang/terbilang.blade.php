@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="padding-top:5px">Terbilang</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('angka.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="angka">Number</label>
                <input type="text" name="angka" class="form-control" placeholder="Input Number" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection
