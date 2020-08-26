<div class="popup" id="send-welcome-message">
    <div class="header-popup">
        <div class="title-popup">
            <h3>Send welcome message</h3>
        </div>
        <div class="close-popup">
            ×
        </div>
    </div>
    <div class="content-popup">
        <div class="functional-popup">
            <div class="switchers">
                <div class="select-all">
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="select-all">
                        <label class="onoffswitch-label" for="select-all">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                    <span class="name-switch">Select All</span>
                </div>
                <div class="filters">
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="filters" checked>
                        <label class="onoffswitch-label" for="filters">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                    <span class="name-switch active">Filters</span>
                </div>
            </div>
            <div class="search-popup">
                <input type="text" placeholder="Search Candidate " class="search">
                <button class="save-btn search-btn">Search</button>
            </div>

        </div>
        <div class="update">
            <ul></ul>
        </div>
        <div class="popup-candidate-list">
            <ul>
                @foreach($dataCandidate  as $key =>$value)
                    <li>
                        <div class="popup-candidate-item">
                            <input type="checkbox" id="{{$value['last_name'].$value['candidateDictTypes']['title']}}">
                            <label for="{{$value['last_name'].$value['candidateDictTypes']['title']}}">
                                <span></span>
                                <img src="{{ asset('img/face.jpg') }}" alt="Candidate names">
                                <div class="popup-candidate-info">
                                    <p>{{$value['first_name']." ".$value['last_name']}}</p>
                                    <span>{{$value['candidateDictTypes']['title']}}</span>
                                </div>
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="footer-popup">
        <button class="save-btn">Send message</button>
    </div>
</div>