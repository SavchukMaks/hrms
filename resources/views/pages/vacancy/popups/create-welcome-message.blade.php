<div class="popup" id="create-welcome-message">
    <div class="header-popup">
        <div class="title-popup">
            <h3>Create new welcome message</h3>
        </div>
        <div class="close-popup">
            ×
        </div>
    </div>
    <div class="content-popup">
        <div class="functional-popup">
            <input class="col-md-5" id="name-message" name="name-message" type="text" placeholder="Name of message">
            {{--<input class="col-md-5 pull-right" id="type-vacancy" name="type-message" type="text" placeholder="Vacancy type">--}}
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
        <div class="popup-candidate-list">
            <textarea name="content-message" placeholder="Text message" id="content-message" cols="30" rows="5"></textarea>
        </div>
    </div>
    <div class="footer-popup">
        <button class="save-btn">Create message</button>
    </div>
</div>