//= candidateManager.js

$('.more').click(function () {

    if($(this).text()==='Show more'){
        $(this).siblings('.item.hidden').toggleClass('hidden visible');
        $(this).text('Show less')
    } else {
        $(this).siblings('.item.visible').toggleClass('hidden visible');
        $(this).text('Show more')
    }

});

$('#candidate_add').keydown(function(event){
    if(event.keyCode == 13) {
        event.preventDefault();
        return false;
    }
});