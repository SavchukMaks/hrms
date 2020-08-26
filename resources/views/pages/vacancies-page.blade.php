@extends('layouts.default-vacancy')
@section('title')
    <title> Vacancies Page </title>
@endsection

@section('description')
    <meta name="description" content="Vacancies Page description">
@endsection

@section('page-css')

    <link rel="stylesheet" href="{{asset('libs/OwlCarousel2/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('libs/OwlCarousel2/dist/assets/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/templates/vacancies-page/vacancies-page.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/templates/customer-page/customer-vacancies-page.min.css')}}">
@endsection

@section('sidebar')

    <div class="col-md-3 col-lg-2" id="sidebar">
        @include('pages.base.sidebar-base')
    </div>

@endsection

@section('main')
    <main class="col-md-9 col-lg-10">
        @include('pages.base.main-heder')
        <div id="ovlCarouselBlock">
            <div class="owl-carousel owl-theme">

                @foreach($categories as $key => $chunk)
                    <div class="owlCauruseleBlock">
                            <a href="{{route('vacancy_list_category', ['id' => $chunk->id])}}">{{$chunk->title}}</a>
                        <p>Категорія {{$key+1}}</p>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="main-content">

            @include('pages.vacancy.vacancies-page-content')

        </div>
        @include('pages.vacancy.vacancies-page-footer')

    </main>

    <div class="popup-wrapper"></div>


    <div class="popup" id="add-candidate">
        <div class="header-popup">
            <div class="title-popup">
                <h3>Candidates List</h3>
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

        @include('pages.vacancy.popups.add-candidate')


    </div>
</div>
    <div class="popup" id="add-customer">
        @include('pages.vacancy.popups.create-customer')
    </div>


@endsection

@section('page-js')
            <script src="{{asset('libs/OwlCarousel2/docs/assets/vendors/jquery.min.js')}}"></script>
            <script src="{{asset('libs/OwlCarousel2/dist/owl.carousel.min.js')}}"></script>

            <script type="text/javascript">

                $('.owl-carousel').owlCarousel({
                    items:1,
                    lazyLoad:true,
                    loop:true,
                    mouseDrag:false,
                    nav:true,
                    dots: false

                });

            </script>


    <script src="{{asset('js/vacancies-page.js')}}"></script>
    <script src="{{asset('js/vacancyManager.js')}}"></script>

    <script type="text/javascript">
        vacancyManager.init();
    </script>

    <script>
        $( function() {
            $( "#searchItem" ).autocomplete({
                source: '{{ route('vacancy_search_autocomplete') }}'
            });
        } );
    </script>
@endsection


