<div class="popup" id="add-candidate">
    <div class="header-popup">
        <div class="title-popup">
            <h3>Candidates List</h3>
        </div>
        <div id="close-popup">
            ×
        </div>
    </div>
    <div class="content-popup">
        <div class="functional-popup">
            <div class="switchers">
                <div class="select-all">
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="select-all" >
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
                <input type="text" placeholder="Search Candidate ">
                <button class="save-btn">Search</button>
            </div>
        </div>
        <div class="popup-candidate-list">
            <ul>
                <li class="add-candidate-row">
                    <form action="{{ route('page_add_candidates') }}" method="POST">

                        {{ csrf_field() }}

                        <input type="hidden" name="vacancyID">
                        <button type="submit" id="addCandidate">
                            <i class="fa fa-plus"></i>
                            <p>Add new candidate</p>
                        </button>
                    </form>
                </li>
                <li>
                    <div class="popup-candidate">
                        <div class="first_name"></div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="footer-popup">
            <button class="save-btn">Send Offer</button>
            <button class="reset-btn">Send message</button>
        </div>
    </div>
</div>