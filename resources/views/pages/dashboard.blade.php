@extends('layouts.only-sidebar')

@section('title')
    <title>Dashboard</title>
@endsection

@section('description')
    <meta name="description" content="Vacancy page description">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/dashboard/dashboard-page.min.css')}}">
@endsection

@section('sidebar')

    <div class="col-md-3 col-lg-2" id="sidebar">
        @include('pages.base.sidebar-base')
    </div>

@endsection

@section('main')

    <main class="col-md-9 col-lg-10">

        <div id="dashboard">

            @include('pages.dashboard.welcome-message')

            @include('pages.dashboard.dashboard-blocks')

        </div>

    </main>

@endsection

@section('page-js')
@endsection
