
<div class="header-popup">
    <div class="title-popup">
        <h3>Customer List</h3>
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
        <form method="GET" action="{{route('search')}}">
            {{ csrf_field() }}
        <div class="search-popup">
            <input type="text" placeholder="Search Candidate " class="search" name="search">
            <button class="save-btn search-btn" type="submit" onclick="searchCustomer(event)">Search</button>
        </div>
        </form>
    </div>
    <div class="popup-customer-list">
        <ul>
            <li class="add-candidate-row">
                <form action="{{ route('client_redirect') }}" method="POST">

                    {{ csrf_field() }}

                    <input type="hidden" name="vacancyID">
                    <button type="submit" id="addCustomer">
                        <i class="fa fa-plus"></i>
                        <p>Add new customer</p>
                    </button>
                </form>
            </li>
            <li>
                <div class="popup-customer popup-candidate-item">
                    {{--<div class="first_name"></div>--}}
                </div>
            </li>
        </ul>
    </div>
    <div class="footer-popup">
        <button class="save-btn">Send Offer</button>
        <button class="reset-btn">Send message</button>
    </div>
</div>
