<div class="main-header">
    <div class="main-header-search">
        <form method="GET" action="
                @if(request()->is(\App\DomainParams\Candidates::CANDIDATE_ROUT_LIST))
                    {{ route('candidate_search') }}
                @elseif(request()->is(\App\DomainParams\Vacancys::VACANCY_ROUT_LIST))
                @endif
            ">
            <div class="header-search-btn" id="search-btn">
                <img src="{{ asset('img/icons/magnifying-glass.png') }}" alt="">
            </div>
            <div class="header-search-form">
                <span><input type="text" name="searchItem" id="searchItem"  placeholder="Search" value="{{ isset($strSearch) ? $strSearch : '' }}" required></span>
                <button type="submit" class="save-btn">Search</button>
            </div>

            <br>
            @if ($errors->has('searchItem'))
                <span class="help-block">
                    <strong>{{ $errors->first('searchItem') }}</strong>
                </span>
            @endif

        </form>
    </div>
    <div class="main-header-profile">
        <div class="user-photo">
            <img src="{{ asset('img/face.jpg') }}" alt="">
        </div>
        <div id="profile-toogle-btn">
            <i class="fa fa-angle-down"></i>
            <ul>
                <li><a href="#">Personal info</a></li>
                <li><a href="#">subscription settings</a></li>
                <li><a href="#">billing information</a></li>
                <li><a href="#">profile information</a></li>
                <li><a href="{{ route('user_logout') }}"><img src="{{asset('img/icons/logout.png')}}" alt="">Log out</a></li>
            </ul>
        </div>
    </div>
</div>

