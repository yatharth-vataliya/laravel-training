@extends('layouts.app')

@section('title')
    Manage User
@endsection

@push('styles')
    <style>

    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-striped" id="manage_user_table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>User Email</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Gender</th>
                    </tr>
                    </thead>
                   {{-- <tbody>
                    @foreach($manage_users as $user)
                        <tr>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->user_email }}</td>
                            <td>{{ $user->user_address }}</td>
                            <td>{{ $user->user_mobile }}</td>
                            <td>{{ $user->gender }}</td>
                        </tr>
                    @endforeach
                    </tbody>--}}
                </table>
                {{--<div class="text-center">
                    {{ $manage_users->links() }}
                </div>--}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $("#manage_user_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('ajax-manage-users-data') }}',
            columns:[
                {data: 'id'},
                {data: 'user_name'},
                {data: 'user_email'},
                {data: 'user_address'},
                {data: 'user_mobile'},
                {data: 'gender'}
            ]
        });
    </script>
@endpush
