@extends('layouts.default-vacancy')

@section('title')
    <title>Candidate list</title>
@endsection

@section('description')
    <meta name="description" content="Candidate list">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/candidate/candidate-list.min.css')}}">
    <link href="{{asset('libs/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet">

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
            @include('pages.vacancy.vacancies-view-content')
{{--            @include('pages.base.pagination')--}}
        </div>
    </main>

@endsection

@section('page-js')
    <script src="{{asset('js/add-vacancies.js')}}"></script>
    <script src="{{asset('js/add-candidate.js')}}"></script>
    <script src="{{asset('libs/bootstrap3-editable/js/bootstrap-editable.js')}}"></script>

    <script type="text/javascript">
        candidateManager.init({!! $configDataJson !!});
    </script>
    <script type="text/javascript">
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type: "PUT"};
        $(function(){

            $('.status').editable({
                value: 2,
                source: [
                    {value: 1, text: 'Додано на розгляд до вакансії'},
                    {value: 2, text: 'Назначено інтервю'},
                    {value: 3, text: 'Розглянуто'},
                    {value: 4, text: 'Надіслано офер'},
                    {value: 5, text: 'Відхилено'},
                    {value: 6, text: 'Пройдено інтервю'}
                ]
            });
        });
    </script>

@endsection
