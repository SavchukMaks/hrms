
//= vacancyManager.js

// function showPopup(event, popupID) {
//
// $(document).ready(function(){
//
//     var location = window.location.pathname;
//
//     if(location=='/vacancy/list')
//     {
//         $(".categories-btn").css('display','block');
//     }
//
// });
function showPopup(event, popupID) {
    event.preventDefault();

    // Open popup
    $('.popup-wrapper').show();
    popupID.show();

}

function getCandidates(event, vacancyId, popupID)
{
    event.preventDefault();

    showPopup(event, popupID);

    $("input[name='vacancyID']").attr('value', vacancyId);
    $(".popup-candidate").empty();

    $.ajax({
        type: "POST",
        url: "/vacancy/list/candidates",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'vacancyId':vacancyId
        },
        success: function(data) {
            var dataCandidates = data.candidates;
            var as = '';
            dataCandidates.forEach(function(item) {
                 as += '<li>' +
                    '<div class="popup-candidate-item"> ' +
                    '<input type="checkbox" id="checkbox">' +
                    ' <label for="label">' +
                    '<span></span>' +
                     '<img src="/img/face.jpg" alt="Candidate names"> ' +
                '<div class="popup-candidate-info"> ' +
                '<p>'+item.first_name+' '+item.last_name+'</p>' +
                // '<span>'+item.candidateDictTypes.title+'</span> ' +
                '</div> ' +
                '</label> ' +
                '</div>' +
                '</li>';
            });

           $(".popup-candidate").append(as);

        }
    });


}

$('.close-popup').click(function () {
    $('.popup-wrapper').hide();
    $('.popup').hide();
    $('main').css('filter', 'blur(0)');
    $('#sidebar').css('filter', 'blur(0)');
});

$('.message-text a').click(function (e) {
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

});

function searchCustomer(event)
{
    event.preventDefault();
    var data = $(".search").val();
    $(".popup-customer").empty();
    $.ajax({
        type: "GET",
        url: "/customer/search",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'data':data
        },
        success: function(data) {
            var dataCustomer = data.customer;
            var as = '';
            dataCustomer.forEach(function(item) {
                as += '<li>' +
                    '<div class="popup-customer-item"> ' +
                    '<input type="checkbox" id="checkbox">' +
                    ' <label for="label">' +
                    '<span></span>' +
                    '<img src="/img/face.jpg" alt="Customer names"> ' +
                    '<div class="popup-customer-info"> ' +
                    '<p>'+item.email+'</p>' +
                    // '<span>'+item.candidateDictTypes.title+'</span> ' +
                    '</div> ' +
                    '</label> ' +
                    '</div>' +
                    '</li>';
            });

            $(".popup-customer").append(as);

        }
    });
}

function showPopupCustomer(event, vacancyId, popupID)
{
    event.preventDefault();

    showPopup(event, popupID);

    $('main').css('filter', 'blur(5px)');
    $('#sidebar').css('filter', 'blur(5px)');
    $(".popup-customer").empty();
    $.ajax({
        type: "POST",
        url: "/customer/list/vacancys/data",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'vacancyId':1
        },
        success: function(data) {
            var dataCustomer = data.customer;
            var as = '';
            dataCustomer.forEach(function(item) {
                as += '<li>' +
                    '<div class="popup-customer-item"> ' +
                    '<input type="checkbox" id="checkbox">' +
                    ' <label for="label">' +
                    '<span></span>' +
                    '<img src="/img/face.jpg" alt="Customer names"> ' +
                    '<div class="popup-customer-info"> ' +
                    '<p>'+item.email+'</p>' +
                    // '<span>'+item.candidateDictTypes.title+'</span> ' +
                    '</div> ' +
                    '</label> ' +
                    '</div>' +
                    '</li>';
            });

            $(".popup-customer").append(as);

        }
    });

}

function showPopupCustomerList(event, vacancyId, popupID)
{
    event.preventDefault();

    showPopup(event, popupID);

    $('main').css('filter', 'blur(0px)');
    $('#sidebar').css('filter', 'blur(0px)');
    $(".popup-wrapper").css('display', 'none');
    $(".popup-customer").empty();
    $.ajax({
        type: "POST",
        url: "/customer/list/vacancys/data",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'vacancyId':1
        },
        success: function(data) {
            var dataCustomer = data.customer;
            var as = '';
            dataCustomer.forEach(function(item) {
                as += '<li>' +
                    '<div class="popup-customer-item"> ' +
                    '<input type="checkbox" id="checkbox">' +
                    ' <label for="label">' +
                    '<span></span>' +
                    '<img src="/img/face.jpg" alt="Customer names"> ' +
                    '<div class="popup-customer-info"> ' +
                    '<p>'+item.email+'</p>' +
                    // '<span>'+item.candidateDictTypes.title+'</span> ' +
                    '</div> ' +
                    '</label> ' +
                    '</div>' +
                    '</li>';
            });

            $(".popup-customer").append(as);

        }
    });

}
