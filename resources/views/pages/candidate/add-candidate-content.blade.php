<form id="candidate_add" enctype="multipart/form-data" method="POST" action="{{ route('save_candidate') }}">
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
                        <img src="{{ asset('img/icons/users.svg') }}" alt="Default image" id="photo" >
                    </div>

                    <input type="file" name="photoCandidate" id="photoCandidate" class="inputfile" />
                    <label class="btnAddPhoto" for="photoCandidate"><span>Add Photo</span></label>

                </div>

                <div class="col-md-8">
                    @if(isset($vacancyID))
                        <input type="hidden" name="vacancyID" value="{{$vacancyID}}">
                    @endif

                    <div class="col-md-6 candidate-base-inputs">

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

                            <input type="text" name="first_name" placeholder="First Name" required>

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                 </span>
                            @endif

                        </div>

                        <input type="text" name="last_name" placeholder="Last Name" required>

                        <select name="selections[]" id="sortCandidate" multiple="multiple" required>
                            @if(count($typesCandidate->all()) > 0)
                                @foreach($typesCandidate->all() as $typeCandidate)
                                    <option value="{{$typeCandidate->title}}">{{$typeCandidate->title}}</option>
                                @endforeach
                            @endif
                        </select>

                    </div>

                    <div class="col-md-6 candidate-base-inputs" style="margin-bottom: 20px;">
                        <select name="location" required>
                            <option value="" selected>Selected your city...</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->title}}, {{$city->country->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 candidate-base-inputs" style="margin-bottom: 20px;">
                        <select name="category" required>
                            <option value="" selected>Selected your category...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 candidate-base-inputs">
                        <input type="date" name="date_birth" placeholder="Date of birth">
                    </div>

                    <div class="col-md-12 candidate-base-inputs">
                        <input type="text" name="required_position" placeholder="Position">
                    </div>

                </div>

                <div>
                    @if($errors->any())
                        <span class="help-block">
                            {{$errors->first()}}
                        </span>
                    @endif
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

                    <div class="tags {{ $errors->has('tags') ? ' has-error' : '' }}">
                        <input id="tags" type="text" placeholder="Tags" name="tags" data-role="tagsinput" autocomplete="on">
                    </div>
                    @if ($errors->has('tags'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tags') }}</strong>
                        </span>
                    @endif

                    <input id="skills" type="text" placeholder="Skills" name="skills" data-role="tagsinput">
                </div>

                <textarea name="education" id="education-candidate" cols="30" rows="2" tabindex="7" placeholder="Education"></textarea>

                <textarea name="experience" id="experience-candidate" cols="30" rows="2" tabindex="7" placeholder="Experience"></textarea>

                <textarea name="description" id="description-candidate" cols="30" rows="5" tabindex="7" placeholder="Description candidate"></textarea>

            </div>

        </div>

    </div>

    <div class="title-sec">
        <h3>Social Links</h3>
        <i class="fa fa-angle-down"></i>
    </div>

    <div class="candidate-social-info">

        <div class="pl0 col-md-9">

            <div class="social-link">
                <i class="fa fa-linkedin-square active"></i>
                <input id="inpupLinkedin" name="linkedin" type="text" placeholder="Id, or link to social media">
                <p></p>
                <button type="button" id="changeLinkLinkedin" class="save-btn">Add</button>
            </div>

            <div class="social-link">
                <i class="fa fa-facebook-square"></i>
                <input id="inpupFacebook" name="facebook" type="text" placeholder="Id, or link to social media">
                <p></p>
                <button type="button" id="changeLinkFacebook" class="save-btn">Add</button>
            </div>

            <div class="social-link_email">
                <i class="fa fa-envelope-square"></i>
                <input id="email" name="email" type="email" placeholder="Email">
                <p></p>
                <button type="button" class="save-btn">Add</button>
            </div>

        </div>

        <div class="col-md-3">

            <div id="divFileResume" class="upload-fileResume">
                <div class="wrapper-upload resume">
                    <input type="file" id="inputResume_1" name="fileCandidateResume[]" class="inputfile getFile" />
                    <label for="inputResume_1"><img src="{{ asset('img/icons/up-arrow.png') }}" class="addImage"><span class="imageTitle">File of Resume </span></label>
                    <i class="fa fa-close cleanCurrentBlock"></i>
                </div>
                <a href="" id="fileResume" onclick="event.preventDefault()">+ Add one more</a>
            </div>

            <div id="divFileTestTask" class="upload-fileTestTask">
                <div class="wrapper-upload testTask">
                    <input type="file" id="inputTest_1" name="fileCandidateTestTask[]" class="inputfile getFile" />
                    <label for="inputTest_1"><img src="{{ asset('img/icons/up-arrow.png') }}" alt="" class="addImage" ><span class="imageTitle">File of Test Task</span></label>
                    <i class="fa fa-close cleanCurrentBlock"></i>
                </div>
                <a href="" id="fileTestTask" onclick="event.preventDefault()">+ Add one more</a>
            </div>

        </div>

    </div>

    <div class="title-sec">
        <h3>Experience</h3>
        <i class="fa fa-angle-down"></i>
    </div>

    <div class="candidate-exp-info">

            <div class="col-md-6">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date_experience" id="start_date" />

                <label for="start_date">End Date</label>
                <input type="date" name="end_date_experience" id="end_date" />
            </div>
            <div class="col-md-6">
                <label for="company">Company</label>
                <input type="text" name="company_experience"placeholder="Company" id="company" />

                <label for="position">Position</label>
                <input type="text" name="position_experience" placeholder="Position" id="position" />

                <label for="location">Location</label>
                <input type="text" name="location_experience" placeholder="Location" id="location" />
            </div>

    </div>

    <div class="add-candidate-buttons">
        <button class="save-btn">Create</button>
        <button type="reset" class="reset-btn">Reset</button>
    </div>

</form>