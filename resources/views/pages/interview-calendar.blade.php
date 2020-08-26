@extends('layouts.default-vacancy')

@section('title')
    <title> Interviews Calendar </title>
@endsection

@section('description')
    <meta name="description" content="Interviews Calendar">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/interview/interview.min.css')}}">
@endsection

@section('sidebar')

    <div class="col-md-3 col-lg-2" id="sidebar">

        @include('pages.base.sidebar-base')

    </div>

@endsection

@section('main')

    <main class="col-md-9 col-lg-10">

        @include('pages.base.main-heder')

        <div class="main-content">
            @include('pages.interview.calendar-content')
        </div>

    </main>

@endsection

@section('page-js')

    <script src="{{asset('js/interview.js')}}"></script>

@endsection