@extends('layouts.default-vacancy')

@section('title')
    <title>Clients list</title>
@endsection

@section('description')
    <meta name="description" content="Clients list">
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

            @foreach($data as $client)
                <div class="candidate-list-item">
                    <div class="candidate-list-about">
                            <img src="{{ asset('img/icons/users.svg') }}" alt="">
                        <div class="about-main">
                            <h2>{{ $client->userProfile->firstname}} {{ $client->userProfile->lastname}}</h2>
                        </div>
                        <div class="about-location">
                            <p>{{ $client->email }}</p>
                        </div>
                    </div>
                 </div>
            @endforeach

            @include('pages.base.pagination')

        </div>
    </main>

@endsection

@section('page-js')
    <script src="{{asset('js/add-vacancies.js')}}"></script>
    <script src="{{asset('js/add-candidate.js')}}"></script>

@endsection
