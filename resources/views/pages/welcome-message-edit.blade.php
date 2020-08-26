@extends('layouts.default-vacancy')

@section('title')
    <title> Welcome messages(edit) </title>
@endsection

@section('description')
    <meta name="description" content="Welcome messages description">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/vacancies-page/vacancies-page.min.css')}}">
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
            @include('pages.vacancy.welcome-message-edit-content')
        </div>
    </main>

@endsection

@section('page-js')
    <script src="{{asset('js/welcome-message-manager.js')}}"></script>
    <script type="text/javascript">
        welcomeMessageManager.init();
    </script>
@endsection


