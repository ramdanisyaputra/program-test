@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="padding-top:5px">User</h3>
        <div class="card-tools">
            <a href="{{ route('user.add') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Add</a>
        </div>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('user.edit', ['userId' => $user->id]) }}" class="btn btn-warning btn-sm text-light"><i class="fas fa-pen"></i> Edit</a>
                                @if(auth()->user()->id != $user->id)
                                    <a href="{{ route('user.delete', ['userId' => $user->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')"><i class="fas fa-trash"></i> Delete</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection
