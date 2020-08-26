<div class="candidate-sidebar">
    <ul>
        <li>
            <a href="{{ url('/candidate/list') }}" @if(request()->is(\App\DomainParams\Candidates::CANDIDATE_ROUT_LIST)) class="active" @endif >
                <img src="{{ asset('img/icons/bulleted-list-white.png') }}" alt="">
                <span>List of Candidate</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/candidate/add') }}" @if(request()->is(\App\DomainParams\Candidates::CANDIDATE_ROUT_ADD)) class="active" @endif>
                <img src="{{ asset('img/icons/add-plus-button.png') }}" alt="">
                <span>Add Candidate</span>
            </a>
        </li>
    </ul>
</div>