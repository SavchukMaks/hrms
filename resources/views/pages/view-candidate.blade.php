@extends('layouts.default-vacancy')

@section('title')
    <title> View candidate </title>
@endsection

@section('description')
    <meta name="description" content="Edit candidate page description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/candidate/view-candidate/view-candidate.min.css')}}">
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
            @include('pages.candidate.view-candidate-content')
        </div>

    </main>

@endsection

@section('page-js')
    <script src="{{asset('js/add-candidate.js')}}"></script>
    <script src="{{asset('js/edit-candidate.js')}}"></script>
@endsection