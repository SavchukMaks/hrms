<div class="add-vacancies-sidebar-nav">
    <ul>
        <li>
            <a href="{{url('/vacancy/list')}}" @if(request()->is(\App\DomainParams\Vacancys::VACANCY_ROUT_LIST)) class="active" @endif >
                <img src="{{ asset('img/icons/teamwork.png') }}" alt="">
                <span>Manage Vacancy</span></a>
        </li>
        <li>

            <a href="{{ route('page_create') }}">

            <a href="{{ route('page_create') }}" @if(request()->is(\App\DomainParams\Vacancys::VACANCY_ROUT_ADD)) class="active" @endif >

                <img src="{{ asset('img/icons/add-plus-button.png') }}" alt="">
                <span>Create Vacany</span></a>
        </li>
        <li>
            <a href="{{url('/vacancy/archive')}}" @if(request()->is(\App\DomainParams\Vacancys::VACANCY_ROUT_ARCHIVE)) class="active" @endif >
                <img src="{{ asset('img/icons/archive-white-box.png') }}" alt="">
                <span>Vacancy Archive</span></a>
        </li>
        <li>
            <a href="{{url('/vacancy/test-tasks/list')}}" @if(request()->is(\App\DomainParams\Vacancys::VACANCY_ROUT_TEST_TASK)) class="active" @endif >
                <img src="{{ asset('img/icons/tasks-list.png') }}" alt="">
                <span>Test Tasks</span></a>
        </li>
        <li>
            <a href="{{url('/vacancy/welcome-messages/')}}" @if(request()->is(\App\DomainParams\Vacancys::VACANCY_ROUT_WELCOME_MESSAGES)) class="active" @endif >
                <img src="{{ asset('img/icons/two-speech-bubbles.png') }}" alt="">
                <span>Welcome Messages</span></a>
        </li>
    </ul>
</div>
