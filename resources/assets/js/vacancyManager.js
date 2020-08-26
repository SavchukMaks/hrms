//= ../libs/jquery/autocomplete/jquery-ui.min.js



    vacancyManager = {


    addCandidatePopup: function (e) {
        e.preventDefault();
        // $('.popup-wrapper').show();
        // $('.popup').show();
        $('main').css('filter', 'blur(5px)');
        $('#sidebar').css('filter', 'blur(5px)');
    },

    closePopup: function () {
        $('.popup-wrapper').hide();
        $('.popup').hide();
        $('main').css('filter', 'blur(0)');
        $('#sidebar').css('filter', 'blur(0)');
    },

    messageText: function (e) {
        e.preventDefault();
        var parent = $(this).closest('.message-item');
        var skills = $(parent).find('.test-task-skills');
        var description = $(parent).find('.message-text p');

        if($(this).text() === 'See More'){
            $(this).text('See less');
            description.css('max-height', 'inherit');
            skills.css('display', 'block');
        } else {
            $(this).text('See More');
            description.css('max-height', '60px');
            skills.css('display', 'none');
        }
    },
        init: function (configData) {

            jsonConfig = configData;

            $('.add-candidate-popup').on('click', this.add);
            $(".close-popup").on('click', this.close);

            $('.message-text a').on('click', this.message);
            $( function() {
                var select2 = $('#sortCandidate').select2({
                    tags: true,
                    placeholder: 'Types candidate'
                });

                var select3 = $('#sortCandidate1').select2({
                    tags: false,
                    placeholder: 'Select category'
                });

                var select4 = $('#sortCandidate2').select2({
                    tags: false,
                    placeholder: 'Select remotely'
                });

                var select5 = $('#sortCandidate3').select2({
                    tags: false,
                    placeholder: 'Select client'
                });

                if(window.location.pathname == vacancyManager.pathVacancyAdd){
                    select2.data('select2').$container.addClass('sort_candidate');
                    select2.data('select2').$dropdown.addClass('sort_candidate--open');
                    select3.data('select3').$container.addClass('sort_candidate');
                    select3.data('select3').$dropdown.addClass('sort_candidate--open');
                    select4.data('select4').$container.addClass('sort_candidate');
                    select4.data('select4').$dropdown.addClass('sort_candidate--open');
                    select5.data('select5').$container.addClass('sort_candidate');
                    select5.data('select5').$dropdown.addClass('sort_candidate--open');
                }

            });

            // $('#vacancy-name, #vacancy-tags, #vacancy-location, #vacancy-type-candidate, #vacancy-skills, #vacancy-work-times, .x-edit').editable({
            //
            //     ajaxOptions: {
            //         method: 'PUT',
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //     },
            //     url: jsonConfig.VacancyUpdate
            //
            // });

        },


       add: function (event){
           vacancyManager.addCandidatePopup(event);
       },

       close: function () {
           vacancyManager.closePopup();
       },

       message: function (event) {
           vacancyManager.messageText(event);
       }

   };

$( document ).ready(function() {
    $('.sort-category select').on('change', function (e) {
        e.preventDefault();
        var dataSort = $("option:selected", this).attr('data-sort');
        var sort = $("option:selected", this).attr('value');

        $.ajax({
            url: '/vacancy/list/' + sort,
            type: 'get',
            data: dataSort,

            success: function (html) {
                var str = '/vacancy/list/' + sort + '?' + dataSort;
                history.pushState(null, null, str);
                
                window.location = '';
                $('body').html(html);
            },
            error: function () {

            }
        });
    });

    $('.sort-type-candidate select').on('change', function (e) {
        e.preventDefault();
        var dataSort = $("option:selected", this).attr('data-sort');
        var sort = $("option:selected", this).attr('value');

        $.ajax({
            url: '/vacancy/list/' + sort,
            type: 'get',
            data: dataSort,

            success: function (html) {
                var str = '/vacancy/list/' + sort + '?' + dataSort;
                history.pushState(null, null, str);

                window.location = '';
                $('body').html(html);
            },
            error: function () {

            }
        });
    });

    $('[name="searchTags"]').on('submit', function (e) {
        e.preventDefault();
        var value = $('input[name="search-tags"]').val();
        var dataSort = $('input[name="search-tags"]').attr('data-sort');

        $.ajax({
            url: '/vacancy/list/' + value,
            type: 'get',
            data: dataSort,

            success: function (html) {
                var str = '/vacancy/list/' + value + '?' + dataSort;
                history.pushState(null, null, str);

                window.location = '';
                $('body').html(html);
            },
            error: function () {

            }
        });
    });

});
