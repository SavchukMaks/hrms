@extends('layouts.default-vacancy')

@section('title')
    <title> Test task list </title>
@endsection

@section('description')
    <meta name="description" content="Test Task description">
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
            <br/>
            <div class="col-md-3 row">
                <a href="{{ url('/vacancy/test-tasks/add') }}"><span class="save-btn">Add</span></a>
            </div>
            <div class="clearfix"></div>
            @include('pages.vacancy.test-task-list-content')
        </div>
    </main>

    @include('pages.vacancy.popups.send-candidates')
@endsection

@section('page-js')
    <script src="{{asset('js/TaskManager.js')}}"></script>
    <script type="text/javascript">
        testTask.init();
    </script>
@endsection

