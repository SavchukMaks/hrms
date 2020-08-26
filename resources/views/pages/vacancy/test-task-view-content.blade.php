<div id="test-task-view">
    <div class="test-task-header">
        <span class="birka">{{$data->vacancy_type}}</span>
        <strong>fedorovich32</strong>
    </div>
    <div class="test-task-content">
        <strong>{{$data->title}}</strong>
        <p>{{$data->description}}</p>
        <hr/>
        @if(isset($data->category->title))
            <p>Category: {{ $data->category->title }}</p>
        @endif
        @if(isset($data->vacancy->title))
            <p>Vacancy: {{ $data->vacancy->title }}</p>
        @endif
    </div>

    <div class="test-task-skills">
        <strong>Skills</strong>
        <ul>
            <li><span class="birka">Graphic Design</span></li>
            <li><span class="birka">User Interface Design</span></li>
            <li><span class="birka">User Experience Design</span></li>
        </ul>
    </div>
</div>
