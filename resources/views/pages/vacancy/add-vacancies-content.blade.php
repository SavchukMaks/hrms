<div class="add-vacancies-content col-md-6 col-md-offset-3">

    <form method="POST" action="{{ route('page_create') }}">
        {{ csrf_field() }}

        @if ($errors->has('title'))
            <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif

        <div class="row">
            <div class="col-md-6 {{ $errors->has('title') ? ' has-error' : '' }}">
                <input type="text" name="title" id="title" placeholder="Name Vacancy" tabindex="1" autocomplete="on" required>
                <br/>
                <br/>
                <select name="remotely" id="sortCandidate2" required>
                    <option value="" disabled selected>Select remotely</option>
                    <option value="office">office</option>
                    <option value="remote">remote</option>
                </select>
            </div>
            <div class="col-md-6">
                <select name="selections[]" id="sortCandidate" multiple="multiple" required>
                    @if(count($typesCandidate->all()) > 0)
                        @foreach($typesCandidate->all() as $typeCandidate)
                            <option value="{{$typeCandidate->title}}">{{$typeCandidate->title}}</option>
                        @endforeach
                    @endif
                </select>
                <br>
                <br>
                <select name="category_id" id="sortCandidate1" required>
                    <option value="" disabled selected>Select category</option>
                    @if(count($category->all()) > 0)
                        @foreach($category->all() as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    @endif
                </select>
                <br>
                <br>
                <select name="client_id" id="sortCandidate3">
                    <option value="" disabled selected>Select client</option>
                    @if(count($clients->all()) > 0)
                        @foreach($clients->all() as $client)
                            <option value="{{$client->id}}">
                                {{ $client->userProfile->firstname }}
                                {{ $client->userProfile->lastname }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="tags {{ $errors->has('tags') ? ' has-error' : '' }}">
                    <input id="tags" type="text" placeholder="Tags" name="tags" data-role="tagsinput" autocomplete="on">
                </div>

                @if ($errors->has('tags'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tags') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-md-6">
                <div class="type-skills {{ $errors->has('skills') ? ' has-error' : '' }}">
                    <textarea name="skills" id="type-skills" cols="30" rows="4" tabindex="4" placeholder="Type Skills" autocomplete="on"></textarea>
                </div>

                @if ($errors->has('skills'))
                    <span class="help-block">
                        <strong>{{ $errors->first('skills') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="location {{ $errors->has('location') ? ' has-error' : '' }}">
                    <input type="text" name="location" id="location" placeholder="Location">
                </div>

                @if ($errors->has('location'))
                    <span class="help-block">
                        <strong>{{ $errors->first('location') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-md-6 {{ $errors->has('work_times') ? ' has-error' : '' }}">
                <input type="text" name="work_times" placeholder="Work Times" tabindex="6">
            </div>

            @if ($errors->has('work_times'))
                <span class="help-block">
                        <strong>{{ $errors->first('work_times') }}</strong>
                    </span>
            @endif
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="description-vacancy {{ $errors->has('description') ? ' has-error' : '' }}">
                    <textarea required name="description" id="description-vacancy" cols="30" rows="6" tabindex="7" placeholder="Description Vacancy"></textarea>
                </div>

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-btns">
                <ul>
                    <li><button class="save-btn" type="submit">Save</button></li>
                    <li><button type="reset" class="reset-btn">Reset</button></li>
                </ul>
            </div>
            <div class="col-md-6 form-btns">
                <a href="{{route('vacancy_list')}}" class="back-btn">Back to vacancies list</a>
            </div>
        </div>
    </form>
</div>
