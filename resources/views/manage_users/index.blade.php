@extends('layouts.app')

@section('title')
    Manage User
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <style>

    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row my-2">
            <div class="col-md-4">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date">
            </div>
            <div class="col-md-4">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" id="end_date">
            </div>
        </div>
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
                        <th>Date</th>
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
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script>
        var start_date = end_date = '';
        const data_table = $("#manage_user_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('ajax-manage-users-data') }}',
                type: "GET",
                data: function(data){
                    data.start_date = start_date;
                    data.end_date = end_date;
                }
            },
            columns: [
                {data: 'id'},
                {data: 'user_name'},
                {data: 'user_email'},
                {data: 'user_address'},
                {data: 'user_mobile'},
                {data: 'gender'},
                {data: 'date'}
            ]
        });

        $("#start_date").on('input', function () {
            start_date = $("#start_date").val();
            end_date = $("#end_date").val();
            data_table.ajax.reload();
        });

        $("#end_date").on('input', function () {
            start_date = $("#start_date").val();
            end_date = $("#end_date").val();
            data_table.ajax.reload();
        });

    </script>
@endpush
