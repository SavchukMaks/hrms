@extends('layouts.default-vacancy')

@section('title')
    <title>Candidate list</title>
@endsection

@section('description')
    <meta name="description" content="Candidate list">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/candidate/candidate-list.min.css')}}">
@endsection

@section('sidebar')

    <div class="col-md-3 col-lg-2" id="sidebar">
        @include('pages.base.sidebar-base')
    </div>

@endsection

@section('main')
    <main class="col-md-9 col-lg-10">
        @include('pages.base.main-heder')
        <div class="col-md-12 sort">
            <div class="sort-tags pull-left">
                <form action="" method="get" name="searchTags" id="h-search">
                    <input type="search" name="search-tags" data-sort="type=tags" placeholder="Tags"/>
                    <input type="submit" value="" />
                </form>
            </div>
            <div class="sort-country pull-left">
                <form action="" method="get" name="searchCountry" id="h-search">
                    <input type="search" name="search-country" data-sort="type=country" placeholder="Country"/>
                    <input type="submit" value="" />
                </form>
            </div>
            <div class="sort-age pull-left">
                <form action="" method="get" name="searchAge" id="h-search">
                    <input type="search" name="search-age" data-sort="type=age" placeholder="Age"/>
                    <input type="submit" value="" />
                </form>
            </div>
            <div class="sort-experience pull-left">
                <select>
                    <option disabled selected>Experience</option>
                    <option data-sort="type=experience" value="0">Less than one year</option>
                    <option data-sort="type=experience" value="1">One year</option>
                    <option data-sort="type=experience" value="2">Two years</option>
                    <option data-sort="type=experience" value="3">Three years</option>
                    <option data-sort="type=experience" value="4">More than four years</option>
                </select>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div class="main-content">
            @foreach($data as $candidate)
                <div class="candidate-list-item">
                    <div class="candidate-list-about">
                        @if(isset($candidate->photoCandidate))
                            <img src="{{ asset('/img/uploads/candidates/' . $candidate->photoCandidate) }}" alt="" class="list-image">
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
                            <h5>{{$candidate->category->title}}</h5>
                        </div>
                        <div class="about-location candidate_location">
                                @isset($candidate->date_birth)

                                  {!! date('Y') - \Carbon\Carbon::parse($candidate->date_birth)->format('Y') !!}
                                    <span> Years Old</span> |
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
                                <li><a href="#"><img src="{{ asset('img/icons/two-speech-bubbles.png') }}"> Messages</a></li>
                                <li>
                                    <a href="{{ route('get_view_candidate', ['id' => $candidate->id]) }}">View</a>
                                </li>
                                <li>
                                    <a href="{{ route('edit_candidate', ['id' => $candidate->id]) }}" class="save-btn">EDIT</a>
                                </li>
                                <li>
                                    <a href="{{ route('delete_candidate', ['id' => $candidate->id]) }}">Delete</a>
                                </li>
                                <li>
                                <span>
                                   <img src="{{ asset('img/icons/settings.png') }}" alt="">
                                   <ul>
                                       <li><a href="#">Add note</a></li>
                                       <li><a href="#">Send task</a></li>
                                       <li><a href="#">Send welcome message</a></li>
                                       <li><a href="#" class="send-message">Send message</a></li>
                                   </ul>
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

            @include('pages.base.pagination')

        </div>
    </main>

    @include('components.popup')

@endsection

@section('page-js')
    <script src="{{asset('js/add-vacancies.js')}}"></script>
    <script src="{{asset('js/add-candidate.js')}}"></script>
    <script src="{{asset('js/candidate-list.js')}}"></script>

    <script type="text/javascript">
        candidateManager.init({!! $configDataJson !!});
    </script>

@endsection
