@extends('layouts.default-vacancy')

@section('title')
    <title> Test Task(View) </title>
@endsection

@section('description')
    <meta name="description" content="Welcome messages description">
@endsection

@section('page-css')
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

        <div class="main-content">
            <form action="{{ route('test_task_update_by_id', ['id' => $id]) }}" id="form-edit-welcome-message" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="welcome-edit-header">
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="inputs-wrapper">
                        <label for="title">Title: </label>
                        <input type="text" placeholder="Title" name="title" id="title" value="{{ $task->title }}" required>
                    </div>
                    <div class="inputs-wrapper">
                        <label for="vacancy_type">Vacancy type: </label>
                        <input type="text" placeholder="vacancy_type" id="vacancy_type" name="vacancy_type" value="{{ $task->vacancy_type }}" required>
                    </div>
                    <div class="message-btns">
                        <a href="{{ route('test_task_view', ['id' => $id]) }}" class="reset-btn">View</a>
                        <a href="#" class="delete-btn" data-id="{{ $id}}">Delete</a>
                        <span class="sure-delete">
                <span>Are you sure? Want <br><b>delete</b> Test Task</span>
                    <p>Yes</p>
                    <p>No</p>
                </span>
                    </div>
                </div>
                <div class="welcome-edit-textarea">

                    <div class="row">
                        @if(isset($task->vacancy))
                        <div class="col-md-2">
                            <label for="title">Vacancy: </label>
                            <select name="vacancy_id" >
                                <option value="{{ $task->vacancy->id }}" selected hidden>{{ $task->vacancy->title }}</option>
                                @if(count($vacancy->all()) > 0)
                                    @foreach($vacancy as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        @endif

                        <div class="col-md-2">
                            <label for="title">Category: </label>
                            <select name="category_id" >
                                @if(isset($task->category))
                                <option value="{{ $task->category->id }}" selected hidden>{{ $task->category->title }}</option>
                                @endif
                                    @if(count($category->all()) > 0)
                                    @foreach($category as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                    </div>

                    <label for="description">Description</label>
                    <textarea name="description" id="description" placeholder="Description">{{ $task->description }}</textarea>
                </div>
                <div class="welcome-edit-textarea">
                    <label for="skill">Skill</label>
                    <textarea name="skill" id="skill" placeholder="Skill">{{ $task->skill }}</textarea>
                </div>
                <button type="submit" class="save-btn">Save</button>
            </form>


        </div>
    </main>

@endsection

@section('page-js')
    <script src="{{asset('js/TaskManager.js')}}"></script>
    <script type="text/javascript">
        testTask.init();
    </script>
@endsection


