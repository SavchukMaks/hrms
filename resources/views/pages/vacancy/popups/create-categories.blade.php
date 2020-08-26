<div class="popup" id="create-vacancy-categories">
    <form method="POST" action="{{ route('vacancy_categories_add') }}">
        {{ csrf_field() }}
    <div class="header-popup">
        <div class="title-popup">
            <h3>Create new categories</h3>
        </div>
        <div class="close-popup">
            ×
        </div>
    </div>
    <div class="content-popup">
        <div class="functional-popup">
            <input class="col-md-5" id="name-message" name="name-categories" type="text" placeholder="Title" required>
        </div>
    </div>
    <div class="footer-popup">
        <button class="save-btn">Create categories</button>
    </div>
    </form>
</div>
