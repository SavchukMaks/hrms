<div id="welcome-message">
    <div class="buttons">
        </a><button id="create-new-message">Create new <i class="fa fa-plus"></i></button>
    </div>
    @foreach($welcomeMessage as $data)
    <div class="message-items-wrapper">

        <div class="message-item">

            <div class="header-message">
                <div class="title-message">
                    <h2>{{$data->name_of_message}}</h2>
                    <span>{{$data->type_of_vacancy}}</span>
                </div>
                <div class="message-btns">
                    <a href="#" class="reset-btn send-btn">Send candidates</a>
                    <a href="{{ route('welcome_message_view', ['id' => $data->id]) }}" class="reset-btn">View</a>
                    <a href="{{ route('welcome_message_edit', ['id' => $data->id]) }}" class="save-btn">Edit</a>
                    <div class="delete-btn-wrapper">
                        <a href="#" class="delete-btn" data-id="{{ $data->id}}">Delete</a>
                        <span class="sure-delete">
                            <span>Are you sure? Want <br><b>delete</b> Test Task</span>
                            <p>Yes</p>
                            <p>No</p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="message-text">
                <p>{{$data->content_message}}</p>
                <a href="#">See More</a>
            </div>

        </div>

    </div>
    @endforeach
</div>