@extends('layouts.app')

@section('title')
Default Blank Page
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
@endpush

@section('content')

@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
@endpush
