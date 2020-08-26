<form enctype="multipart/form-data" method="POST" action="">
    {{ csrf_field() }}

    <div class="title-sec">
        <h3>Candidate info</h3>
        <i class="fa fa-angle-down"></i>
    </div>

    <div class="candidate-main-info">

        @if($candidate->candidateFiles->isNotEmpty())
            @php($arrData = $candidate->candidateFiles->toArray())
        @else
            @php($arrData = array())
        @endif

        <div class="row main-info-row">

            <div class="col-md-10">

                <div class="col-md-4">

                    <div class="add-photo-candidate">

                        @if($candidate->candidateFiles->isNotEmpty())
                            @foreach($arrData as $elem )
                                @if($elem['file_type'] == App\DomainParams\Candidates::CANDIDATE_FILE_PHOTO)
                                    <img src="{{ asset($elem['file_path']) }}" alt="Default image" id="photo" >
                                @endif
                            @endforeach
                        @else
                            <img src="{{ asset('img/icons/users.svg') }}" alt="Default image" id="photo" >
                        @endif

                    </div>

                    <input type="file" name="photoCandidate" id="updatePhotoCandidate" class="inputfile" />
                    <label class="btnAddPhoto" for="updatePhotoCandidate"><span>Upload new photo</span></label>

                </div>

                <div class="col-md-8">

                    <div class="col-md-6 candidate-base-inputs">

                        <div class="edit-block">
                            <p>First and Last Name</p>
                            <a href="#" data-mode="inline" id="candidate-name" data-inputclass="my-editable" class="x-edit" data-type="text" data-pk={{ $candidate->id }} data-url="{{ route('update_candidate') }}" data-title="Enter First and Last Name">
                                {{ $candidate->first_name }} {{ $candidate->last_name }}
                            </a>
                        </div>


                    </div>

                    <div class="col-md-6 candidate-base-inputs">
                        <div class="edit-block">
                            <p>Location</p>
                            <a href="#"
                               data-type="select"
                               data-mode="inline"
                               id="candidate-location"
                               data-inputclass="my-editable"
                               data-pk="{{ $candidate->id }}"
                               data-source="{{ json_encode($cities) }}"
                               data-url="{{ route('update_candidate_location') }}"
                            >
                                @if(isset($candidate->location->city->title))
                                    {{ $candidate->location->city->title }} {{ $candidate->location->country->title }}
                                @else
                                    Location
                                @endif
                            </a>
                        </div>
                    </div>

                    <div class="col-md-12 candidate-base-inputs">
                        <div class="edit-block">
                            <p>Position</p>
                            <a href="#" data-mode="inline" id="required_position" data-inputclass="my-editable" class="x-edit" data-type="text" data-pk={{ $candidate->id }} data-url="{{ route('update_candidate') }}" data-title="Enter Position">{{ $candidate->required_position }}</a>
                        </div>
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

                <div class="tags">
                    <input id="skills" type="text" placeholder="Skills" name="skills" data-role="tagsinput" value="{{ $candidate->skills }}">
                </div>

                <div class="edit-block">
                    <p>Education</p>
                    <textarea data-mode="inline" id="education" class="x-edit" name="education" title="Education" data-type="textarea" data-pk={{ $candidate->id }} data-url="{{ route('update_candidate') }}" data-title="Enter education" rows="3">{{ $candidate->education }}</textarea>
                </div>

                <div class="edit-block">
                    <p>Experience</p>
                    <textarea data-mode="inline" id="experience" class="x-edit" name="experience" title="Experience" data-type="textarea" data-pk={{ $candidate->id }} data-url="{{ route('update_candidate') }}" data-title="Enter experience" rows="3">{{ $candidate->experience }}</textarea>
                </div>

                <div class="edit-block">
                    <p>Description Candidate</p>
                    <textarea data-mode="inline" id="description" class="x-edit" name="description" title="Description" data-type="textarea" data-pk={{ $candidate->id }} data-url="{{ route('update_candidate') }}" data-title="Enter description" rows="3">{{ $candidate->description }}</textarea>
                </div>

            </div>

        </div>

    </div>

    <div class="title-sec">
        <h3>Social links</h3>
        <i class="fa fa-angle-down"></i>
    </div>

    <div class="candidate-social-info">

        <div class="pl0 col-md-9">

            <div class="social-link">
                <i class="fa fa-linkedin-square active"></i>
                @if(isset($candidate->linkedin))
                    <input id="inpupLinkedin" class="have-link" name="linkedin" type="text" placeholder="Id, or link to social media" value="{{ $candidate->linkedin }}">
                    <p>{{ $candidate->linkedin }}</p>
                    <button type="button" id="changeLinkLinkedin" class="save-btn change">Change</button>
               @else
                    <input id="inpupLinkedin" name="linkedin" type="text" placeholder="Id, or link to social media">
                    <p></p>
                    <button type="button" id="changeLinkLinkedin" class="save-btn">Add</button>
               @endif

            </div>

            <div class="social-link">
                <i class="fa fa-facebook-square"></i>
                @if(isset($candidate->facebook))
                    <input id="inpupFacebook" class="have-link" name="facebook" type="text" placeholder="Id, or link to social media" value="{{ $candidate->facebook }}">
                    <p>{{ $candidate->facebook }}</p>
                    <button type="button" id="changeLinkFacebook" class="save-btn change">Change</button>
                @else
                    <input id="inpupFacebook" name="facebook" type="text" placeholder="Id, or link to social media">
                    <p></p>
                    <button type="button" id="changeLinkFacebook" class="save-btn">Add</button>
                @endif

            </div>

            <div class="social-link_email">
                <i class="fa fa-envelope-square"></i>
                @if(isset($candidate->email))
                    <input id="email" class="have-link" name="email" type="email" placeholder="Email" value="{{ $candidate->email }}">
                    <p>{{ $candidate->email }}</p>
                    <button type="button" id="changeEmail" class="save-btn change">Change</button>
                @else
                    <input id="email" name="email" type="email" placeholder="Email">
                    <p></p>
                    <button type="button" id="changeEmail" class="save-btn">Add</button>
                @endif
            </div>

        </div>

        <div class="col-md-3">

            <div id="divFileResume" class="upload-fileResume">
                @if($candidate->candidateFiles->isNotEmpty())

                    @php($isFileResume = false)
                    @php($countFileResume = 1)

                    @foreach($arrData as $elem)
                        @if($elem['file_type'] == App\DomainParams\Candidates::CANDIDATE_RESUME_FILE)
                            @php($isFileResume = true)
                            <div class="wrapper-upload resume">
                                <input type="file" data-role="edit" id="inputResume_{{ $countFileResume }}" name="fileCandidateResume[]" class="inputfile getFile" />
                                <label for="inputResume_{{ $countFileResume }}"><img src="{{ asset('img/icons/up-arrow.png') }}" class="addImage"><span class="imageTitle">{{ $elem['file_name'] }}</span></label>
                                <i class="fa fa-close cleanCurrentBlock" data-role="edit"></i>
                            </div>
                            @php($countFileResume++)
                        @endif
                    @endforeach

                    @if(!$isFileResume)
                        <div class="wrapper-upload resume">
                            <input type="file" data-role="edit" id="inputResume_1" name="fileCandidateResume[]" class="inputfile getFile" />
                            <label for="inputResume_1"><img src="{{ asset('img/icons/up-arrow.png') }}" class="addImage"><span class="imageTitle">File of Resume </span></label>
                            <i class="fa fa-close cleanCurrentBlock" data-role="edit"></i>
                        </div>
                    @endif

                @else
                    <div class="wrapper-upload resume">
                        <input type="file" data-role="edit" id="inputResume_1" name="fileCandidateResume[]" class="inputfile getFile" />
                        <label for="inputResume_1"><img src="{{ asset('img/icons/up-arrow.png') }}" class="addImage"><span class="imageTitle">File of Resume </span></label>
                        <i class="fa fa-close cleanCurrentBlock" data-role="edit"></i>
                    </div>
                @endif
                <a href="" id="fileResume" onclick="event.preventDefault()">+ Add one more</a>
            </div>

            <div id="divFileTestTask" class="upload-fileTestTask">
                @if($candidate->candidateFiles->isNotEmpty())

                    @php($isFileTestTask = false)
                    @php($countFileTestTask = 1)

                    @foreach($arrData as $elem)
                        @if($elem['file_type'] == App\DomainParams\Candidates::CANDIDATE_TEST_TASK_FILE)
                            @php($isFileTestTask = true)
                            <div class="wrapper-upload testTask">
                                <input type="file" data-role="edit" id="inputTest_{{ $countFileTestTask }}" name="fileCandidateTestTask[]" class="inputfile getFile" />
                                <label for="inputTest_{{ $countFileTestTask }}"><img src="{{ asset('img/icons/up-arrow.png') }}" alt="" class="addImage" ><span class="imageTitle">{{ $elem['file_name'] }}</span></label>
                                <i class="fa fa-close cleanCurrentBlock" data-role="edit"></i>
                            </div>
                            @php($countFileTestTask++)
                        @endif
                    @endforeach

                    @if(!$isFileTestTask)
                        <div class="wrapper-upload testTask">
                            <input type="file" data-role="edit" id="inputTest_1" name="fileCandidateTestTask[]" class="inputfile getFile" />
                            <label for="inputTest_1"><img src="{{ asset('img/icons/up-arrow.png') }}" alt="" class="addImage" ><span class="imageTitle">File of Test Task</span></label>
                            <i class="fa fa-close cleanCurrentBlock" data-role="edit"></i>
                        </div>
                    @endif

                @else
                    <div class="wrapper-upload testTask">
                        <input type="file" data-role="edit" id="inputTest_1" name="fileCandidateTestTask[]" class="inputfile getFile" />
                        <label for="inputTest_1"><img src="{{ asset('img/icons/up-arrow.png') }}" alt="" class="addImage" ><span class="imageTitle">File of Test Task</span></label>
                        <i class="fa fa-close cleanCurrentBlock" data-role="edit"></i>
                    </div>
                @endif
                <a href="" id="fileTestTask" onclick="event.preventDefault()">+ Add one more</a>
            </div>

        </div>

    </div>

    <div class="title-sec">
        <h3>Experience</h3>
        <i class="fa fa-angle-down"></i>
    </div>


</form>

<form action="{{ route('experience_add_candidates', ['id' => $id]) }}" method="get">
    <div class="col-md-6">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" id="start_date" />

        <label for="start_date">End Date</label>
        <input type="date" name="end_date" id="end_date" />
    </div>
    <div class="col-md-6">
        <label for="company">Company</label>
        <input type="text" name="company" id="company" />

        <label for="position">Position</label>
        <input type="text" name="position" id="position" />

        <label for="location">Location</label>
        <input type="text" name="location" id="location" />
    </div>
    <div class="col-md-3">
        <button class="save-btn change" type="submit">Add</button>
    </div>
</form>
<div class="clearfix"></div>
<div class="candidate-exp-info">
    @if(isset($candidate->experiences))
        @foreach($candidate->experiences as $experience)
            <div class="item {{ $loop->index > 2 ? 'hidden' : '' }}">
                <div class="position">
                    <span class="pull-right"><a href="{{ route('experience_edit_page_candidates', ['id' => $experience->id ]) }}"><i class="glyphicon glyphicon-edit"></i></a></span>
                    <span class="pull-right"><a href="{{ route('experience_delete_candidates', [ 'id' => $experience->id ]) }}"><i class="glyphicon glyphicon-remove"></i></a></span>
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

