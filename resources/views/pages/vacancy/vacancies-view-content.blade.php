<input type="hidden" data-id="{{$id}}" id="vacancyId">
@foreach($data as $candidate)
    <div class="candidate-list-item">
        <div class="candidate-list-about">
            @if (isset($candidate->CandidateFiles[0]->file_path))
                <img src="{{ asset($candidate->CandidateFiles[0]->file_path) }}" alt="">
            @else
                <img src="{{ asset('img/icons/users.svg') }}" alt="">
            @endif
            <div class="about-main">
                <h2>{{ $candidate->last_name }} {{ $candidate->first_name }}</h2>
                @if ($candidate->candidateDictTypes->count())
                    <span>
                                    @php($strCandidateType = '')
                        @foreach($candidate->candidateDictTypes as $candidateDictType)
                            @php($strCandidateType .= ' ' . $candidateDictType->title . ', ')
                        @endforeach
                        {{ substr(trim($strCandidateType), 0, -1) }}
                                </span>
                @endif
            </div>
                <div class="about-location candidate_location">
                    @isset($candidate->date_birth)
                        {{ date('d', $candidate->date_birth) }}<span> Years Old</span> |
                    @endisset
                    @isset($candidate->location)
                        {{ $candidate->location->country->title }}, {{ $candidate->location->city->title }}
                    @endisset
                </div>
                <div class="about-position">
                    <p>{{ $candidate->required_position }}</p>
                </div>
        </div>
        <div class="right-side">
            <div class="candidate-list-buttons">
                <ul>
                   {{--<li> <a href="#" class="status" id="status" data-type="select" data-pk="{{$candidate->id}}" data-url="{{route('update_candidate_status')}}" data-title="Select status">{{$candidate->statusCandidate['status']}}</a></li>--}}
                    <li><a href="#"><img src="{{ asset('img/icons/two-speech-bubbles.png') }}"> Messages</a></li>
                    <li>
                        <a href="#" class="delete-btn delete-btn-wrapper" id="delete-item" data-id="{{ $candidate->id}}">Delete</a>
                        <span class="sure-delete">
                            <span>Are you sure? Want <br><b>delete</b> Test Task</span>
                            <p>Yes</p>
                            <p>No</p>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="last-online">
                <p>The last time was online <span>12.05.17</span></p>
            </div>
        </div>


    </div>

@endforeach