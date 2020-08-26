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

            <div class="col-md-6">
                <form action="{{ route('type_update', ['id' => $data->id]) }}" method="post">
                    {{ csrf_field() }}
                    <label for="type_title">Title:</label>
                    <input id="type_title" name="type_title" value="{{ $data->title }}" />
                    <br/>
                    <br/>
                    <button class="save-btn">Update</button>
                </form>
            </div>

        </div>
    </main>

    @include('components.popup')

@endsection

@section('page-js')
    <script src="{{asset('js/add-vacancies.js')}}"></script>
    <script src="{{asset('js/add-candidate.js')}}"></script>
    <script src="{{asset('js/candidate-list.js')}}"></script>



@endsection
