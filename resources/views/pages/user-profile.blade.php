@extends('layouts.default-vacancy')

@section('title')
    <title> User Profile </title>
@endsection

@section('description')
    <meta name="description" content="User Profile">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/user-profile/user-profile.min.css')}}">
    <link rel="stylesheet" href="{{asset('libs/select2/select2.css')}}">
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
            @include('pages.user-profile.user-profile')
        </div>

    </main>

@endsection

@section('page-js')

    <script src="{{asset('js/user-profile.js')}}"></script>

    <script>
        userProfileManager.init({!! $configDataJson !!});
    </script>

@endsection