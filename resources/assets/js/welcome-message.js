showPopup($('#create-new-message'), $('#create-welcome-message'));
showPopup($('.send-message'), $('#send-welcome-message'));

$('.close-popup').click(function () {
    $('.popup-wrapper').hide();
    $('.popup').hide();
    $('main').css('filter', 'blur(0)');
    $('#sidebar').css('filter', 'blur(0)');
});

$('#create-message').click(function (e) {
    e.preventDefault();
    $('#send-welcome-message').hide();
    $('#create-welcome-message').show();
});