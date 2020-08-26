//= ../libs/bootstrap-grid/bootstrap.min.js
//= ../libs/jquery/autocomplete/jquery-ui.min.js
//= ../libs/tagsinput/bootstrap-tagsinput.js
//= ../libs/bootstrap3-editable/js/bootstrap-editable.min.js
//= ../libs/bootstrap3-editable/js/bootstrap-editable.js
//= ../libs/tagsinput/typeahead.jquery.js
//= ../libs/select2/dist/js/select2.full.js
//= ../libs/OwlCarousel2/dist/owl.carousel.min.js

function showPopup(target, popup) {
    target.click(function () {
        $('.popup-wrapper').show();
        popup.show();
        $('main').css('filter', 'blur(5px)');
        $('#sidebar').css('filter', 'blur(5px)');
    });
}

$('.close-popup').click(function () {
    $('.popup-wrapper').hide();
    $('.popup').hide();
    $('main').css('filter', 'blur(0)');
    $('#sidebar').css('filter', 'blur(0)');
});

$( document ).ready(function() {
    $('.sidebar-nav-btn').click(function () {
        $('.sidebar-nav').fadeToggle();
    });

    $('#toggle-filters').click(function (e) {
        e.preventDefault();
        $('.subnav-filters').fadeToggle();
    });

    $('#search-btn').click(function () {
        $('.header-search-form').fadeToggle();
    });

    $( "input[tabindex='1']" ).focus();

    $('.title-sec').click(function () {
       $(this).next().toggle();
       $(this).find('i').toggleClass('fa-angle-down fa-angle-up')
    });

    console.log("%cMade with love by bStream", "background: #4170af; padding: 3px 10px; color: #FFF;");
});