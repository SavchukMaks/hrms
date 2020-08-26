<div class="company-profile">
    <div class="title">
        <h1>Personal Info</h1>
    </div>

    <div class="box">
        <div class="col-md-6 inputs">

            <div class="row">
                <div class="col-md-6">
                    <p>First and Last Name</p>
                    <a href="" data-mode="inline" id="user-name" data-inputclass="my-editable" class="x-edit" data-type="text" data-pk='{{ $userProfile['id'] }}' data-url="{{ route('update') }}" data-title="Enter First and Last Name">
                        @if(!empty($userProfile))
                            {{ $userProfile['firstname'] }} {{ $userProfile['lastname'] }}
                        @endif
                    </a>
                </div>

                <div class="col-md-6">
                    <p>Email</p>
                    <a href="" data-mode="inline" id="work_email" data-inputclass="my-editable" class="x-edit" data-type="text" data-pk='{{ $userProfile['id'] }}' data-url="{{ route('update') }}" data-title="Email">
                        @if(!empty($userProfile))
                            {{ $userProfile['work_email'] }}
                        @endif
                    </a>
                </div>

            </div>

            <div class="row candidate-base-inputs">
                <div class="edit-block col-md-12">
                    <p>User Address</p>
                    <a href="" data-mode="inline" id="user-location" data-inputclass="my-editable" class="x-edit" data-pk={{ $userProfile['id'] }} data-url="{{ route('update_location') }}">
                        @if(!empty($userProfile->location))
                            {{ $userProfile->location->city->title }} {{ $userProfile->location->country->title }}
                        @else
                            Location
                        @endif
                    </a>

                </div>
            </div>

            <div class="row">
                <div class=" edit-block col-md-12">
                    <p>Essential information</p>
                    <textarea id="description" data-mode="inline" class="x-edit" name="information" title="information" data-type="textarea" data-pk='{{ $userProfile['id'] }}' data-url="{{ route('update') }}" data-title="Enter description" rows="3">
                        @if(!empty($userProfile))
                            {{ $userProfile['description'] }}
                        @endif
                    </textarea>
                </div>
            </div>

        </div>

        <div class="col-md-3 inputs">

            <div class="row">
                <div class="col-md-12 balance">
                    <p>User Balance</p>
                    <span>
                        @if(!empty($userProfile->balance))
                            $ {{ $userProfile->balance->sum }}
                        @else
                            $ 0.00
                        @endif
                    </span>
                </div>
            </div>

        </div>
    </div>

</div>