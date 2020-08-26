@extends('layouts.default-vacancy')

@section('title')
    <title> Add Client </title>
@endsection

@section('description')
    <meta name="description" content="Add client page description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('libs/select2/dist/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('css/templates/candidate/add-candidate.min.css')}}">
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
            @include('pages.clients.add-cliets-content')
        </div>

    </main>

@endsection

@section('page-js')

    {{--<script src="{{asset('js/add-candidate.js')}}"></script>--}}
    {{--<script type="text/javascript">--}}
        {{--candidateManager.init({!! $configDataJson !!});--}}
    {{--</script>--}}

    {{--<script src="{{asset('js/user-profile.js')}}"></script>--}}

    {{--<script>--}}
        {{--userProfileManager.init({!! $configDataJson !!});--}}
    {{--</script>--}}
@endsection