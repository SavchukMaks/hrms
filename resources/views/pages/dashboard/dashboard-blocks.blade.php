<div class="dashboard-blocks">
    <div class="col-md-6 col-lg-6">
        <div class="dashboard-block new-vacancy">
            <h2>open new vacancy</h2>
            <a href="{{url ('/vacancy/add')}}">
            <button class="save-btn">Open</button>
            </a>
        </div>

    </div>

    <div class="col-md-6 col-lg-6">

        <div class="dashboard-block new-candidate">
            <h2>add new candidate</h2>
            <a href="{{url ('/candidate/add')}}">
            <button class="save-btn">ADD</button>
            </a>
        </div>

    </div>

    <div class="col-md-6 col-lg-6">

        <div class="dashboard-block">
            <span>12</span>
            <h2>last activity vacations</h2>
        </div>

    </div>

    <div class="col-md-6 col-lg-6">

        <div class="dashboard-block update-profile">
            <span>34</span>
            <h2>update candidates profile</h2>
        </div>

    </div>

    <div class="col-md-6 col-lg-6">

        <div class="dashboard-block">
            <span>24</span>
            <h2>todays next interviews</h2>
        </div>

    </div>

    <div class="col-md-6 col-lg-6">

        <div class="dashboard-block last-added-candidates">
                <span>{!! $candidates !!}</span>
            <h2>last added candidates</h2>
        </div>

    </div>
</div>