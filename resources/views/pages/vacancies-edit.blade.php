@extends('layouts.default-vacancy')

@section('title')
    <title> Vacancies Page </title>
@endsection

@section('description')
    <meta name="description" content="Vacancies Page description">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/vacancies-page/vacancies-edit.min.css')}}">
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
            @include('pages.vacancy.vacancies-edit-content')
        </div>

        @include('pages.vacancy.vacancies-page-footer')

    </main>

@endsection

@section('page-js')
    <script src="{{asset('js/vacancies-edit.js')}}"></script>
    <script type="text/javascript">
        vacancyManager.init({!! $configDataJson !!});

    </script>
    <script>
        $( function() {
            $( "#searchItem" ).autocomplete({
                source: '{{ route('vacancy_search_autocomplete') }}'
            });
        } );
    </script>
@endsection