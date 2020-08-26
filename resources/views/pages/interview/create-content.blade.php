<div class="content-wrapper">
    <form id="create-interview" name="interview" action="{{ route('interview_save') }}" method="get">
    <div class="calendar-panel">
        <div class="year">
            <select name="year">
                @for($i = date('Y'); $i > 2010; $i--)<option data-year="{{ $i }}"><span>{{ $i }}</span></option>
                @endfor
            </select>
        </div>
        <div class="months">
            <div class="left-arrow hide">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="months-wrapper">
                <ul>
                    <li><label class="month" for="January">January</label></li>
                    <input type="radio" name="month" data-month="01" id="January" hidden/>

                    <li><label class="month" for="February">February</label></li>
                    <input type="radio" name="month" data-month="02" id="February" hidden/>

                    <li><label class="month" for="March">March</label></li>
                    <input type="radio" name="month" data-month="03" id="March" hidden/>

                    <li><label class="month" for="April">April</label></li>
                    <input type="radio" name="month" data-month="04" id="April" hidden/>

                    <li><label class="month" for="May">May</label></li>
                    <input type="radio" name="month" data-month="05" id="May" hidden/>

                    <li><label class="month" for="June">June</label></li>
                    <input type="radio" name="month" data-month="06" id="June" hidden/>

                    <li><label class="month" for="July">July</label></li>
                    <input type="radio" name="month" data-month="07" id="July" hidden/>

                    <li><label class="month" for="August">August</label></li>
                    <input type="radio" name="month" data-month="08" id="August" hidden/>

                    <li><label class="month" for="September">September</label></li>
                    <input type="radio" name="month" data-month="09" id="September" hidden/>

                    <li><label class="month" for="October">October</label></li>
                    <input type="radio" name="month" data-month="10" id="October" hidden/>

                    <li><label class="month" for="November">November</label></li>
                    <input type="radio" name="month" data-month="11" id="November" hidden/>

                    <li><label class="month" for="December">December</label></li>
                    <input type="radio" name="month" data-month="12" id="December" hidden/>
                </ul>
                <div class="days">
                    <ul>
                        <li>
                            @for($i = 1; $i <= 31; $i++)
                                <label for="day{{ $i }}"><span>{{ $i }}</span></label>
                                <input type="radio" name="day" data-day="{{ $i }}" id="day{{ $i }}" hidden/>
                            @endfor
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right-arrow">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
        
        <div class="interviewer">

            <span>Interviewer</span>

            <div class="time">

                <div class="from">
                    <input type="time" name="time_start" placeholder="09:30am" required>
                </div>

                <span>to</span>

                <div class="to">
                    <input type="time" name="time_end" placeholder="1:00pm" required>
                </div>

            </div>

            <div class="inputs-block">
                <input type="email" placeholder="Interviewer email" name="interviewer_email">
                <input type="text" placeholder="First Name" name="interviewer_first_name">
                <input type="text" placeholder="Last Name" name="interviewer_last_name">
            </div>

        </div>

        <div class="candidate">
            <span>Candidate</span>
            <div class="vacancy">
                <select name="vacancy_id" id="vacancy" required>
                    <option value="" disabled selected>Select vacancy</option>
                    @if(count($vacancy->all()) > 0)
                        @foreach($vacancy as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="inputs-block">
                {{--<input type="email" placeholder="Candidate email" name="candidate_email">--}}
                {{--<input type="text" placeholder="First Name" name="candidate_first_name">--}}
                {{--<input type="text" placeholder="Last Name" name="candidate_last_name">--}}
                <select required name="candidate_id" id="candidate">
                    <option value="">Select candidate ...</option>
                    @foreach($candidates as $candidate)
                        <option value="{{$candidate->id}}">
                            {{implode(' ', [$candidate->first_name, $candidate->last_name])}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="calendar">
        </div>
        <br/>
        <div class="col-md-2">
            <button type="submit" class="save-btn">create</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('interview_list') }}">
                <button type="button" class="reset-btn">cancel</button>
            </a>
        </div>

    {{--<div class="calendar">--}}

        {{--<div class="header-calendar">--}}

            {{--<div class="month">--}}
                {{--<span>July</span>--}}
            {{--</div>--}}
            {{--<div class="candidate">--}}
                {{--<span>Candidate</span>--}}
            {{--</div>--}}
            {{--<div class="interviewer">--}}
                {{--<span>Interviewer</span>--}}
            {{--</div>--}}

        {{--</div>--}}

        {{--<div class="calendar-content">--}}

            {{--<ul>--}}
                {{--<li data-date="2017-11-23 14:28:13">--}}
                    {{--<div class="date">--}}
                        {{--<p>Saturday</p>--}}
                        {{--<span>09</span>--}}
                    {{--</div>--}}
                    {{--<div class="time">--}}
                        {{--<span>1:15pm - 2:15pm</span>--}}
                    {{--</div>--}}
                    {{--<div class="candidate">--}}
                        {{--<p>Fedarovich Mikalai</p>--}}
                        {{--<span>UI/UX Designer Interface</span>--}}
                    {{--</div>--}}
                    {{--<div class="interviewer">--}}
                        {{--<div class="photo">--}}
                            {{--<img src="{{ asset('img/small-whb.jpg') }}" alt="Photo Interviewer">--}}
                        {{--</div>--}}
                        {{--<div class="info">--}}
                            {{--<p>Max Liberman</p>--}}
                            {{--<a href="mailto:liberman@gmail.com">liberman@gmail.com</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li data-date="2017-11-22 14:28:13">--}}
                    {{--<div class="date">--}}
                        {{--<p>Saturday</p>--}}
                        {{--<span>09</span>--}}
                    {{--</div>--}}
                    {{--<div class="time">--}}
                        {{--<span>1:15pm - 2:15pm</span>--}}
                    {{--</div>--}}
                    {{--<div class="candidate">--}}
                        {{--<p>Fedarovich Mikalai</p>--}}
                        {{--<span>UI/UX Designer Interface</span>--}}
                    {{--</div>--}}
                    {{--<div class="interviewer">--}}
                        {{--<div class="photo">--}}
                            {{--<img src="{{ asset('img/small-whb.jpg') }}" alt="Photo Interviewer">--}}
                        {{--</div>--}}
                        {{--<div class="info">--}}
                            {{--<p>Max Liberman</p>--}}
                            {{--<a href="mailto:liberman@gmail.com">liberman@gmail.com</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li data-date="2017-11-21 14:28:13">--}}
                    {{--<div class="date">--}}
                        {{--<p>Saturday</p>--}}
                        {{--<span>09</span>--}}
                    {{--</div>--}}
                    {{--<div class="time">--}}
                        {{--<span>1:15pm - 2:15pm</span>--}}
                    {{--</div>--}}
                    {{--<div class="candidate">--}}
                        {{--<p>Fedarovich Mikalai</p>--}}
                        {{--<span>UI/UX Designer Interface</span>--}}
                    {{--</div>--}}
                    {{--<div class="interviewer">--}}
                        {{--<div class="photo">--}}
                            {{--<img src="{{ asset('img/small-whb.jpg') }}" alt="Photo Interviewer">--}}
                        {{--</div>--}}
                        {{--<div class="info">--}}
                            {{--<p>Max Liberman</p>--}}
                            {{--<a href="mailto:liberman@gmail.com">liberman@gmail.com</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}

        {{--</div>--}}

    {{--</div>--}}
    </form>
</div>