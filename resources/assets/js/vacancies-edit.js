//= ../libs/jquery/autocomplete/jquery-ui.min.js
//= ../libs/bootstrap3-editable/js/bootstrap-editable.js
//= ../libs/tagsinput/bootstrap-tagsinput.js
//= ../libs/tagsinput/typeahead.jquery.js
//= ../js/vacancyManager.js

$.fn.editable.defaults.mode = 'inline';

$(document).ready(function() {
    $('.x-edit').editable({
        inputclass: 'my-editable'
    });
});