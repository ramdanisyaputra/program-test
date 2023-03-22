@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="padding-top:5px">Product Stock</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('product-stock.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="bank_id">Bank ID</label>
                <input type="text" name="bank_id" class="form-control" value="2" readonly required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection
