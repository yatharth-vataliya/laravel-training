@extends('layouts.app')

@section('title')
    Student Section
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-outline-primary" href="{{ route('students.create') }}" id="add_student">Add
                    Student</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover table-bordered text-break" style="word-break: break-word;" id="student_table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Stream</th>
                        <th style="width: 80px;">Address</th>
                        <th>Gender</th>
                        <th>Hobbies</th>
                        <th>Mobile</th>
                        <th>Profile Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <script>
        const student_table = $("#student_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('ajax-students-data') }}',
            },
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'student_name'},
                {data: 'student_email'},
                {data: 'student_birth_date'},
                {data: 'student_stream'},
                {data: 'student_address'},
                {data: 'student_gender'},
                {data: 'student_hobbies'},
                {data: 'student_mobile'},
                {
                    data: 'student_profile_picture',
                    searchable: false,
                    orderable: false,
                    render: function (data, type, row, meta) {
                        return `
                            <img src="${data}" style="width:40px; height: 40px;" alt="Profile image">
                        `;
                    }
                },
                {
                    data: null,
                    searchable: false,
                    orderable: false,
                    render: function (data, type, row, meta) {
                        return `
                            <a href="{{ url('students/') }}/${row.id}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <button type="button" class="delete btn btn-danger" id="${row.id}"><i class="fas fa-trash"></i></button>
                        `;
                    }
                }
            ]
        });

        $(document).on('click','.delete',function(){
            let id = $(this).attr('id');
            res = confirm('Are you sure you want to delete this student ?');
            if(res){
                axios.delete('{{ route('students.destroy',['student' => 0]) }}',{
                    student_id : id
                }).then(function (response){
                    window.location.reload();
                });
            }
        });

    </script>

@endpush
