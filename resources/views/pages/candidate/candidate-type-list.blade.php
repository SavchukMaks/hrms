@extends('layouts.default-vacancy')

@section('title')
    <title>Candidate list</title>
@endsection

@section('description')
    <meta name="description" content="Candidate list">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/candidate/candidate-list.min.css')}}">
@endsection

@section('sidebar')

    <div class="col-md-3 col-lg-2" id="sidebar">
        @include('pages.base.sidebar-base')
        @include('pages.base.sidebar-filters')
    </div>

@endsection

@section('main')

    <main class="col-md-9 col-lg-10">
        @include('pages.base.main-heder')


        <div class="main-content">
            <br/>
            <div class="col-md-5">
                <button class="save-btn"><a href="{{ route('type_add') }}">Add Type Candidate</a></button>
            </div>
            <div class="clearfix"></div>
            @foreach ($data as $type)

            <div class="candidate-type-list-item">

                    {{ $type->title }}

                <div class="pull-right">
                    <a href="{{ route('type_edit', ['id' => $type->id]) }}">edit</a>
                    <a href="{{ route('type_delete', ['id' => $type->id]) }}">delete</a>
                </div>
            </div>

            @endforeach

            @include('pages.base.pagination')

        </div>
    </main>

    @include('components.popup')

@endsection

@section('page-js')
    <script src="{{asset('js/add-vacancies.js')}}"></script>
    <script src="{{asset('js/add-candidate.js')}}"></script>
    <script src="{{asset('js/candidate-list.js')}}"></script>



@endsection
