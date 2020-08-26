@extends('layouts.default-vacancy')

@section('title')
    <title> Message List </title>
@endsection

@section('description')
    <meta name="description" content="Message List">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/email/email.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/templates/email/email-history.min.css')}}">
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
            @include('pages.email.email-history')
        </div>
    </main>

@endsection

@section('page-js')
    <script src="{{asset('js/email.js')}}"></script>
@endsection


