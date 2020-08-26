<div class="add-vacancies-content col-md-6 col-md-offset-3">
        <section class="edit-vacancy">
            <div class="row">
                <div class="col-md-6">
                    <div class="edit-block">
                        <p>Name Vacancy</p>
                        <a href="#" id="title" data-inputclass="my-editable" class="x-edit" data-type="text" data-pk='{{ $data->id }}' data-url="{{ route('vacancy_update') }}" data-title="Enter vacancy name">{{$data->title}}</a>
                    </div>
                    <div class="edit-block">
                        <p>Tags</p>
                        <a href="#" id="tags" data-inputclass="my-editable" class="x-edit" data-type="text" data-pk='{{ $data->id }}' data-url="{{ route('vacancy_update') }}" data-title="Enter Tags">{{$data->tags}}</a>
                    </div>
                    @if(!empty($location['country']))
                    <div class="edit-block">
                        <p>Location</p>
                        <a href="#" id="title" data-inputclass="my-editable" class="x-edit" data-type="text" data-pk='{{ $data->id }}' data-url="{{ route('vacancy_update_location') }}" data-title="Enter location">{{$location['country']->title}}, {{$location['city']->title}}</a>
                    </div>
                    @endif

                    <div class="edit-block">
                        <p>Remotely</p>
                        <form action="{{ route('vacancy_updates_remotely', ['id' => $data->id]) }}">
                            <select name="remotely">
                                @if($data->remotely)
                                    <option value="{{ $data->remotely }}" hidden selected>{{ $data->remotely }}</option>
                                @else
                                    <option value="" disabled selected>Select remotely</option>
                                @endif

                                <option value="office">office</option>
                                <option value="remote">remote</option>
                            </select>
                            <div class="clearfix"></div>
                            <br/>
                            <button class="btn btn-default"><i class="glyphicon glyphicon-ok"></i></button>
                        </form>
                    </div>
                    <div class="edit-block">
                        <p>Category</p>
                        <form action="{{ route('vacancy_updates_category', ['id' => $data->id]) }}">
                            <select name="category_id">
                                @if($data->category_id)
                                    <option value="{{ $category->find($data->category_id)->id  }}" hidden selected>{{ $category->find($data->category_id)->title }}</option>
                                @else
                                    <option value="" disabled selected>Select category</option>
                                @endif

                                @if(count($category->all()) > 0)
                                    @foreach($category->all() as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="clearfix"></div>
                            <br/>
                            <button class="btn btn-default"><i class="glyphicon glyphicon-ok"></i></button>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="edit-block">
                        <p>Type Candidate</p>
                        {{$data->type_candidates}}
                        <form action="{{ route('vacancy_updates_type', ['id' => $data->id]) }}">
                        <select name="selections[]" id="sortCandidate" class="hidden" multiple="multiple" required>
                            @if(count($typesCandidate->all()) > 0)
                                @foreach($typesCandidate->all() as $typeCandidate)
                                    <option value="{{$typeCandidate->title}}">{{$typeCandidate->title}}</option>
                                @endforeach
                            @endif
                        </select>
                            <div class="clearfix"></div>
                            <br/>
                            <button class="btn btn-default"><i class="glyphicon glyphicon-ok"></i></button>
                        </form>
                    </div>
                    <div class="edit-block">
                        <p>Type Skills</p>
                        <a href="#" id="skills" data-inputclass="my-editable" class="x-edit" data-type="text" data-pk='{{ $data->id }}' data-url="{{ route('vacancy_update') }}" data-title="Enter Type Skills">{{$data->skills}}</a>
                    </div>
                    <div class="edit-block">
                        <p>Work Times</p>
                        <a href="#" id="work_times" data-inputclass="my-editable" class="x-edit" data-type="text" data-pk='{{ $data->id }}' data-url="{{ route('vacancy_update') }}" data-title="Enter Work Times">{{$data->work_times}}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="edit-block">
                        <p>Description Vacancy</p>
                        <textarea class="x-edit" id="description" name="description" title="Description" data-type="textarea" data-pk='{{ $data->id }}' data-url="{{ route('vacancy_update') }}" data-title="Enter Work Times" rows="10">{{$data->description}}</textarea>
                    </div>
                </div>
            </div>
        </section>
</div>
