<div class="content-wrapper">
    <form name="sort-interview">
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
                <ul class="sort-interview">
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
            </div>
            <div class="right-arrow">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
        <div class="col-md-1 pull-right">
            <button type="submit" class="btn btn-default">filter</button>
        </div>
        <div class="col-md-1 pull-right">
            <a href="{{ route('interview_list') }}"><button type="button" class="btn btn-default">clear</button></a>
        </div>
    </form>
    <div class="clearfix"></div>
    <div class="calendar">

        <div class="header-calendar">

            <div class="month">
                {{--<span>July</span>--}}
            </div>
            <div class="candidate">
                <span>Candidate</span>
            </div>
            <div class="interviewer">
                <span>Interviewer</span>
            </div>

        </div>

        <div class="calendar-content">
            <ul>
                @foreach($data as $interview)
                <li data-date="{{ $interview->date_interview }}">
                    <div class="date">
                        <p>Saturday</p>
                        <span>{{ $interview->date_interview }}</span>
                    </div>
                    <div class="time">
                        <span>{{ $interview->time_start }} - {{ $interview->time_end }}</span>
                    </div>
                    <div class="candidate">
                        <p>{{ $interview->candidate->first_name }} {{ $interview->candidate->last_name }}</p>
                        <span>{{ $interview->vacancy->title }}</span>
                    </div>
                    <div class="interviewer">
                        <div class="info">
                            <p>{{ $interview->interviewer_first_name }} {{ $interview->interviewer_last_name }}</p>
                            <a href="mailto:{{ $interview->interviewer_email }}">{{ $interview->interviewer_email }}</a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @include('pages.base.pagination')
</div>