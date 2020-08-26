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
    </div>

@endsection

@section('main')

    <main class="col-md-9 col-lg-10">
        @include('pages.base.main-heder')

        <div class="main-content">
            <br/>
            <form action="{{ route('experience_edit_candidates', ['id' => $experience->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" value="{{ $experience->start_date }}"/>

                    <label for="start_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" value="{{ $experience->end_date }}" />
                </div>
                <div class="col-md-6">
                    <label for="company">Company</label>
                    <input type="text" name="company" id="company" value="{{ $experience->company }}" />

                    <label for="position">Position</label>
                    <input type="text" name="position" id="position" value="{{ $experience->position }}" />

                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" value="{{ $experience->location }}"/>
                </div>
                <div class="col-md-3">
                    <button class="save-btn change" type="submit">Save</button>
                </div>
            </form>
            <button onclick='js:history.go(-1);returnFalse;'>Back</button>
        </div>
    </main>

    @include('components.popup')

@endsection

@section('page-js')
    <script src="{{asset('js/add-vacancies.js')}}"></script>
    <script src="{{asset('js/add-candidate.js')}}"></script>
    <script src="{{asset('js/candidate-list.js')}}"></script>
@endsection