@extends('layouts.default-vacancy')

@section('title')
    <title> Add vacancy page </title>
@endsection

@section('description')
    <meta name="description" content="Add vacancy page description">
@endsection
@section('page-css')
    <link rel="stylesheet" href="{{asset('libs/select2/dist/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('css/templates/add-vacancies/add-vacancies.min.css')}}">
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
            @include('pages.vacancy.add-vacancies-content')
        </div>
    </main>

@endsection

@section('page-js')
    <script src="{{asset('js/add-vacancies.js')}}"></script>
    <script src="{{asset('js/vacancyManager.js')}}"></script>
    <script type="text/javascript">
        vacancyManager.init();
    </script>
    <script>
        $( function() {

            $( "#location" ).autocomplete({
                source: '{{ route('city_search_autocomplete') }}'

            });

        } );
    </script>

    <script>
        $( function() {
            $(document).on("keypress","input[type='text']", function(e){
                if(e.keyCode==13) {
                e.preventDefault();
                }
            });
        } );

    </script>
@endsection
