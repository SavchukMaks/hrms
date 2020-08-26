@extends('layouts.default-vacancy')

@section('title')
    <title> Message list </title>
@endsection

@section('description')
    <meta name="description" content="Edit candidate page description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('libs/select2/dist/css/select2.css')}}">
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

        <div class="main-content container">
            <br/>
            <form action="{{ route('test_task_create') }}" method="get">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="title" id="title" placeholder="Title" tabindex="1" autocomplete="on" required>
                    </div>
                    <div class="col-md-6">
                        <select name="selections[]" id="sortCandidate" multiple="multiple" required>
                            @if(count($typesCandidate->all()) > 0)
                                @foreach($typesCandidate->all() as $typeCandidate)
                                    <option value="{{$typeCandidate->title}}">{{$typeCandidate->title}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="welcome-edit-textarea">
                            <textarea name="description" placeholder="Description" cols="148" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="welcome-edit-textarea">
                            <textarea name="skill" placeholder="skill" cols="50" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                <br/>
                <div class="row">
                    <div class="col-md-2">
                        <select name="vacancy_id">
                        <option value="" disabled selected>Select vacancy</option>
                            @if(count($vacancy->all()) > 0)
                                @foreach($vacancy as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="category_id">
                            <option value="" disabled selected>Select category</option>
                            @if(count($category->all()) > 0)
                                @foreach($category as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <br/>
                <button type="submit" class="save-btn">Create</button>
            </form>
        </div>

    </main>

@endsection

@section('page-js')
    <script src="{{asset('js/add-candidate.js')}}"></script>
    <script src="{{asset('js/edit-candidate.js')}}"></script>
    <script src="{{asset('js/TaskManager.js')}}"></script>
    <script type="text/javascript">
        testTask.init();
    </script>
@endsection