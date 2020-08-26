
editCandidateManager = {

    init: function () {
        $(function() {
            $('.x-edit').editable({
                inputclass: 'my-editable'
            });

            $('#candidate-location').editable({
                inputclass: 'my-editable',
                source: $('#candidate-location').attr('data-source')
            });
        });
    }
};