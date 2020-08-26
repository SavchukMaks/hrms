var categories = {

    getPopup: function (e) {

        e.preventDefault();
        $("#create-vacancy-categories").css('display', 'block');
        $("#create-vacancy-categories").css('min-height', '200px');

        $(".close-popup").on('click', function () {

            $("#create-vacancy-categories").css('display', 'none');

        });
    },

    delete: function(e)
    {
        e.preventDefault();
        e.stopPropagation();

        var sureBlock = $(e.target).siblings('.sure-delete');
        var yesButton = sureBlock.find('p');

        sureBlock.css('display', 'block');
        var categoriesId = $(e.target).attr('data-id');

        yesButton.first().click(function ()
        {
            var parentBlock = $(this).closest('.vacancies-list-item');
            $.ajax({
                type: "POST",
                url: "/vacancy/categories/delete",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'categoriesId':categoriesId
                },
                success: function(data) {
                     parentBlock.remove();
                }
            });
        });

        yesButton.last().click(function ()
        {
            $(".sure-delete").css('display', 'none');
        });

    },

    edit: function(event,categoriesId)
    {
        event.preventDefault();
        $("#edit-vacancy-categories").css('min-height', '200px');
        $("#edit-vacancy-categories").css('display','block');

        $(".close-popup").on('click', function () {

            return $("#edit-vacancy-categories").css('display', 'none');

        });

        var categories = $("input[name='categoriesId']").attr('value', categoriesId);
        $.ajax({
            type: "GET",
            url: "/vacancy/categories",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'categoriesId':categoriesId
            },
            success: function(data) {

            }
        });

    },

    init: function () {
        $(".new-categories").on('click', this.getPopup);
        $(".delete-btn").on('click', this.delete);
    }

}