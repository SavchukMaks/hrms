
<form action="<?php echo e(route('welcome_message_edits')); ?>" id="form-edit-welcome-message" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="welcome-edit-header">
        <div class="inputs-wrapper">
            <input type="text" placeholder="Name of Message" name="name_message" required>
            <input type="text" placeholder="Type of Vacancies" name="type_vacancy" required>
        </div>
        <div class="message-btns">
            <span class="sure-delete">
                <span>Are you sure? Want <br><b>delete</b> Test Task</span>
                    <p>Yes</p>
                    <p>No</p>
            </span>
        </div>
    </div>
    <div class="welcome-edit-textarea">
        <textarea name="welcome-message" placeholder="Description"></textarea>
    </div>
    <button type="submit" class="save-btn">Create</button>

</form>

