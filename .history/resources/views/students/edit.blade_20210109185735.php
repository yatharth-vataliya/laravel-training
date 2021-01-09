@extends('layouts.app')

@section('title')
Edit Student
@endsection

@push('styles')
<style>
    .legend {
        font-size: 0.9rem;
        font-weight: 400;
    }
</style>
<link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
@endpush

@section('content')

<div class="container-fluid bg-white rounded">

    @if ($errors->any())
    <div class="rounded shadow my-2 alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="border border-primary py-2">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row p-2">
        <div class="col-md-12">
            <form action="{{ route('students.update') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="student_id" value="{{ $student->id }}">
                <input type="hidden" name="is_image_delete" value="no" id="is_image_delete">
                @csrf
                @include('students._form');
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
<script>
    $("#student_profile_picture").on('change', function() {
        let src = window.URL.createObjectURL(this.files[0]);
        $("#preview_image").attr('src', src);
    });

    $("#delet_image").click(function() {
        $("#is_image_delete").val('yes');
    });
</script>
@endpush