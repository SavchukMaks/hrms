//= ../libs/momentjs/moment-with-locales.js

$(document).ready(function() {

    var CHOOSE_DAY = null;

    /**
     *  Переключаємо місяці вліво-вправо
     *
     * @type {*|jQuery|HTMLElement}
     */
    var rightArrow = $('.right-arrow');
    var leftArrow = $('.left-arrow');
    var monthsList = $('.months-wrapper').find('ul');

    rightArrow.click(function () {
        monthsList.css('margin-left', '-370px');
        leftArrow.removeClass('hide');
        rightArrow.addClass('hide');
    });

    leftArrow.click(function () {
        monthsList.css('margin-left', 0);
        rightArrow.removeClass('hide');
        leftArrow.addClass('hide');
    });

    /**
     * Вибір місяця і дати
     *
     * @type {*|jQuery|HTMLElement}
     */
    var month = $('.month');
    var daysCalendar = $('.days');

    month.click(function () {

        $('.month.choose').removeClass('choose');

        $(this).addClass('choose');

        var monthOffsetLeft = $(this).offset().left;
        var monthOuterWidth = $(this).outerWidth(true);

        daysCalendar.addClass('visible');
        daysCalendar.css('left', (monthOffsetLeft + monthOuterWidth) - 700 + 'px');
    });

    daysCalendar.find('span').click(function () {

        CHOOSE_DAY = $(this).text();

        $('.days').removeClass('visible');
        $('.month.choose').removeClass('choose');

    });

    /**
     *  Переключення року
     */
    $('.calendar-panel .year').find('p').click(function () {
        $(this).siblings('.list').toggle();
    });

    /**
     *
     *  Ставимо дату
     *
     */
    var allInterviews = $('.calendar-content').find('li');

    /*
        Для AM/PM - .format('A')
        Година - .format('H')
        Хвилина - .format('m')
     */

    allInterviews.map(function(index, el) {
        var date = $(el).data("date");

        $(el).children('.date').find('p').text(moment(date).format('dddd'));
        $(el).children('.date').find('span').text(moment(date).format('D'));

    });

    $('form[name="interview"]').on('submit', function (e) {
        e.preventDefault();

        var year = $("select[name=\"year\"] option:selected", this).attr('data-year');
        var vacancyId = $("select[name=\"vacancy_id\"] option:selected", this).val();
        var month = $("input[name=\"month\"]:checked", this).attr('data-month');
        var day = $("input[name=\"day\"]:checked", this).attr('data-day');
        var interviewEmail = $('input[name=\"interviewer_email\"]').val();
        var candidateId = $("select[name=\"candidate_id\"] option:selected", this).val();
        var interviewFirstName = $('input[name=\"interviewer_first_name\"]').val();
        var interviewLastName = $('input[name=\"interviewer_last_name\"]').val();
        var timeStart = $('input[name=\"time_start\"]').val();
        var timeEnd = $('input[name=\"time_end\"]').val();

        $.ajax({
            url: '/interview/save/',
            type: 'get',
            data: {
                'year' : year,
                'month' : month,
                'day' : day,
                'interview_email' : interviewEmail,
                'interview_first_name' : interviewFirstName,
                'interview_last_name' : interviewLastName,
                'time_start' : timeStart,
                'time_end' : timeEnd,
                'vacancyId' : vacancyId,
                'candidateId' : candidateId
            },

            success: function () {
                window.location.href = '/interview/list';
            },
            error: function () {

            }
        });

    });

    $('form[name="sort-interview"]').on('submit', function (e) {
        e.preventDefault();

        var year = $("select[name=\"year\"] option:selected", this).attr('data-year');
        var month = $("input[name=\"month\"]:checked", this).attr('data-month');

        var date = new Date();

        if(year === undefined){
            year = date.getFullYear();
        }

        if(month === undefined){
            var m = date.getMonth();
            if(m <= 9){
                m = '0' + m;
            }
            month = m;
        }

        $.ajax({
            url: '/interview/list/' + year + '/' + month,
            type: 'get',
            data: {
                'year' : year,
                'month' : month
            },

            success: function (html) {
                var str = '/interview/list/' + year + '/' + month;
                history.pushState(null, null, str);
                $('body').html(html);
            },
            error: function () {

            }
        });

    });

});