@extends('layouts.default-vacancy')

@section('title')
    <title> Company Subscription </title>
@endsection

@section('description')
    <meta name="description" content="Company Subscription">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/company/company-subscription.min.css')}}">
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

            @include('pages.company.company-subscription')

        </div>

    </main>

@endsection

@section('page-js')

    <script src="{{asset('js/company.js')}}"></script>

@endsection