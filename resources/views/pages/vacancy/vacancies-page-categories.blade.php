@extends('layouts.default-vacancy')

@section('title')
    <title>Categories list</title>
@endsection

@section('description')
    <meta name="description" content="Categories list">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/candidate/candidate-list.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/templates/vacancies-page/vacancies-page.min.css')}}">
@endsection

@section('sidebar')

    <div class="col-md-3 col-lg-2" id="sidebar">
        @include('pages.base.sidebar-base')
        @include('pages.candidate.candidate-sidebar')
        @include('pages.base.sidebar-filters')
    </div>

@endsection

@section('main')
    <main class="col-md-9 col-lg-10">
        @include('pages.base.main-heder')
        <div class="main-content">
            @include('pages.vacancy.popups.create-categories')
            @include('pages.vacancy.vacancy-categories-list')
            @include('pages.vacancy.popups.vacancy-categories-edit')

        </div>
    </main>

@endsection

@section('page-js')
    <script src="{{asset('libs/tagsinput/typeahead.jquery.js')}}"></script>
    <script src="{{asset('libs/tagsinput/typeahead.jquery.js')}}"></script>

    <script src="{{asset('js/categoriesManager.js')}}"></script>
    <script type="text/javascript">
        categories.init()
    </script>
    <script type="text/javascript">

    $(document).ready(function (){
        var location = window.location.pathname;
        if(location=='/vacancy/categories')
        {
            $(".new-categories").css('display','block');
        }
    });

    </script>
@endsection