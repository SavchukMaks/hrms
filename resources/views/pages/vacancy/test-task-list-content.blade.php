<div id="welcome-message">
        @foreach($data as $item)
        <div class="message-item">
            <div class="header-message">
                <div class="title-message">
                    <h2>{{$item->title}}</h2>
                    <span>{{$item->vacancy_type}}</span>
                </div>
                <div class="message-btns">
                    <a href="#" class="reset-btn add-candidate-popup">Send candidates</a>
                    <a href="{{ route('test_task_view', ['id' => $item->id]) }}" class="reset-btn">View</a>
                    <a href="{{ route('test_task_edit_by_id', ['id' => $item->id]) }}" class="save-btn">Edit</a>
                    <div class="delete-btn-wrapper">
                        <a href="{{ route('test_task_delete', ['id' => $item->id]) }}"  data-id="{{ $item->id}}">Delete</a>
                        <span class="sure-delete">
                            <span>Are you sure? Want <br><b>delete</b> Test Task</span>
                            <p>Yes</p>
                            <p>No</p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="message-text">
                <p>{{$item->description}}</p>
                <a href="#">See More</a>
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
    @endforeach
</div>