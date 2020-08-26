<form enctype="multipart/form-data" method="POST" action="{{ route('save_candidate') }}">
    {{ csrf_field() }}

    <div class="title-sec">
        <h3>Candidate info</h3>
        <i class="fa fa-angle-down"></i>
    </div>

    <div class="candidate-main-info">

        <div class="row main-info-row">

            <div class="col-md-10">
                <div class="col-md-4">
                    <div class="add-photo-candidate">
                        @if(isset($data['image']))
                            <img src="{{asset('img/uploads/candidates/'. $data['image'])}}" alt="Default image" id="photo" >
                        @else
                            <img src="{{ asset('img/icons/users.svg') }}" alt="Default image" id="photo" >
                        @endif
                    </div>

                </div>

                <div class="col-md-8">

                    <div class="col-md-6 header-info">
                        <p><span>(Can Edit)</span></p>
                        <h2>{{$data['candidate']->first_name. ' '.$data['candidate']->last_name}}i</h2>
                    </div>

                    <div class="col-md-6 header-info">
                        <p>Location <span>(Can Edit)</span></p>
                        @isset($data['city'])
                            <h2>{{$data['country']->title.', '.$data['city']->title}}</h2>
                        @endisset
                    </div>

                    <div class="col-md-12 header-info">
                        <p>Position <span>(Can Edit)</span></p>
                        <h2>{{$data['candidate']->required_position}}</h2>

                    <div class="col-md-6 candidate-base-inputs">

                        <div class="edit-block">
                            <p>First and Last Name</p>
                            <a href="#" id="candidate-name" data-inputclass="my-editable" class="x-edit" data-type="text" data-pk="1" data-url="/post" data-title="Enter First and Last Name"></a>
                        </div>

                    </div>

                    <div class="col-md-6 candidate-base-inputs">
                        <div class="edit-block">
                            <p>Location</p>
                            <a href="#" id="candidate-location" data-inputclass="my-editable" class="x-edit" data-type="text" data-pk="1" data-url="/post" data-title="Enter Location"></a>
                        </div>
                    </div>

                    <div class="col-md-12 candidate-base-inputs">
                        <div class="edit-block">
                            <p>Position</p>
                            <a href="#" id="candidate-position" data-inputclass="my-editable" class="x-edit" data-type="text" data-pk="1" data-url="/post" data-title="Enter Position"></a>
                        </div>

                        <p>Location</p>
                        @isset($data['city'])
                        <h2>{{$data['country']->title.', '.$data['city']->title}}</h2>
                        @endisset
                    </div>

                    <div class="col-md-12 header-info">
                        <p>Position</p>
                        <h2>{{$data['candidate']->required_position}}</h2>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="title-sec">
        <h3>Other Info</h3>
        <i class="fa fa-angle-down"></i>
    </div>

    <div class="candidate-other-info">

        <div class="row other-info-row">

            <div class="candidate-other-inputs">

                <div class="view-block">
                    <p>Skills</p>
                    <ul>
                        <li><span>{{$data['candidate']->skills}}</span><i>x</i></li>
                    </ul>
                </div>

                <div class="view-block">
                    <p>Education</p>
                    <p>{{$data['candidate']->education}}</p>
                </div>

                <div class="view-block">
                    <p>Experience</p>
                    <p><p>{{$data['candidate']->experience}}</p></p>
                </div>

                <div class="view-block">
                    <p>Description Candidate</p>
                    <p>{{$data['candidate']->description}}</p>
                </div>

                <div class="row">

                    <div class="links">

                        <div class="col-md-6">

                            <div class="header-info">
                                <p>
                                    Work Email
                                    <a href="mailto:{{$data['candidate']->email}}">{{$data['candidate']->email}}</a>
                                </p>
                            </div>

                            <div class="view-links">
                                <i class="fa fa-linkedin"></i>
                                <p>{{$data['candidate']->linkedin}}</p>
                            </div>

                            <div class="view-links">
                                <i class="fa fa-facebook-official"></i>
                                <p>{{$data['candidate']->facebook}}</p>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="view-links">
                                <i class="fa fa-file-pdf-o"></i>
                                <p>{{$data['candidate']->file_url}}</p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="title-sec">
        <h3>Experience</h3>
        <i class="fa fa-angle-down"></i>
    </div>

    <div class="candidate-exp-info">
        @if(isset($data['candidate']->experiences))
            @foreach($data['candidate']->experiences as $experience)
                <div class="item {{ $loop->index > 2 ? 'hidden' : '' }}">
                    <div class="position">
                        <p>{{ $experience->position }}</p>
                    </div>
                    <div class="title">
                        <p>{{ $experience->company }}</p>
                    </div>
                    <div class="time">
                        <p class="from">{{ $experience->start_date }}</p>
                        <i> - </i>
                        @if(!empty($experience->end_date))
                            <p class="to">{{ $experience->end_date }}</p>
                        @else
                            <p class="to">Today</p>
                        @endif
                    </div>
                    <div class="location">
                        <span>{{ $experience->location }}</span>
                    </div>
                </div>
            @endforeach
        @endif

        <span class="more">Show more</span>

    </div>

    <div class="title-sec">
        <h3>Messeges History</h3>
        <i class="fa fa-angle-down"></i>
    </div>

    <div class="msg-history">

        <div class="msg-header">

            <ul>
                <li>
                    <a href="#"><i class="fa fa-mail-reply"></i></a>
                </li>
                <li>
                    <a href="#">Back to List</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-trash"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-eye-slash"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-rotate-right"></i></a>
                </li>
            </ul>
        </div>

        <div class="messages">
            <div class="message">
                <div class="user-data">
                    <img src="{{ asset('img/small-whb.jpg') }}" alt="">
                    <div class="user-info">
                        <span>Leonid Novikov</span>
                        <a href="mailto:novikov_leonid@gmail.com">novikov_leonid@gmail.com</a>
                    </div>
                    <div class="msg-subject">
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <div class="msg-time">
                        <p>1 :18 am</p>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>

            <div class="message">
                <div class="user-data">
                    <img src="{{ asset('img/small-whb.jpg') }}" alt="">
                    <div class="user-info">
                        <span>Leonid Novikov</span>
                        <a href="mailto:novikov_leonid@gmail.com">novikov_leonid@gmail.com</a>
                    </div>
                    <div class="msg-subject">
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <div class="msg-time">
                        <p>1 :18 am</p>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
        </div>

        <div class="new-message">
            <div class="to">
                <span>Fedarovich Mikalai</span>
                <a href="maito:fedarovich32@gmail.com">(Fedarovich32@gmail.com)</a>
            </div>
            <div class="new-content">
                <textarea name="new-message" id="new-message" cols="30" rows="5" placeholder="New message"></textarea>
            </div>
            <div class="btns">
                <div class="pull-left">
                    <button type="button" class="save-btn">Send</button>
                    <button type="button" class="fa fa-paperclip"></button>
                </div>
                <div class="pull-right">
                    <button type="button" class="reset-btn">Close</button>
                </div>
            </div>
        </div>

    </div>

</form>