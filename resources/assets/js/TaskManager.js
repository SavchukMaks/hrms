
var testTask = {

    getPopup: function (e)
    {
        e.preventDefault();
        $("#send-candidate").css('display','block');
        $('main').css('filter', 'blur(5px)');
        $('#sidebar').css('filter', 'blur(5px)');

        $(".close-popup").on('click',function(){

            $("#send-candidate").css('display','none');
            $('main').css('filter', 'blur(0)');
            $('#sidebar').css('filter', 'blur(0)');

        });
    },

    popup: function()
    {
        var flag=true;
        var item = $('.select-all').find("label");
        item.on("click",function()
        {
            if(flag==true)
            {
                if($(".update").hasClass("update-btn"))
                {
                    var a = $(".update").find('input[type="checkbox"]');
                    flag=!flag;
                    return a.attr('checked', true);
                }
                var a = $(".popup-candidate-list").find('input[type="checkbox"]');
                flag=!flag;
                return a.attr('checked', true);
            }
            else
            {
                if($(".update").hasClass("update-btn"))
                {
                    var a = $(".update").find('input[type="checkbox"]');
                    flag=!flag;
                    return  a.attr('checked', false);

                }

                var a = $(".popup-candidate-list").find('input[type="checkbox"]');
                flag=!flag;
                return a.attr('checked', false);

            }
        });
    },

    search: function()
    {
        var data = $(".search").val();
        $.ajax({
            type: "POST",
            url: "/vacancy/test-tasks/list/search",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'data': data
            },
            success: function (result) {
                $(".update-btn ul").empty();
                var as = '';
                var candidate = result.candidates;
                candidate.forEach(function(item){
                    $(".popup-candidate-list").remove();
                    $(".update").addClass("update-btn");

                    as+= '<li> ' +
                        '<div class="popup-candidate-item"> ' +
                        '<input type="checkbox" id='+item.last_name+'> ' +
                        '<label for='+item.last_name+'> ' +
                        '<span></span> ' +
                        '<img src="/img/face.jpg" alt="Candidate names"> ' +
                        '<div class="popup-candidate-info"> ' +
                        '<p>'+item.first_name+' '+item.last_name +'</p>' +
                        '</div>' +
                        '</label>' +
                        '</div>' +
                        '</li>';
                } );

                $(".update ul").append(as);
            }
        });
    },

    testTask: function(e)
    {
        e.preventDefault();
        e.stopPropagation();

        var sureBlock = $(e.target).siblings('.sure-delete');
        var yesButton = sureBlock.find('p');
        sureBlock.css('display', 'block');
        var testTask = $(e.target).attr('data-id');
        yesButton.first().click(function ()
        {
            var parentBlock = $(this).closest('.message-item');
            $.ajax({
                type: "POST",
                url: "/vacancy/test-tasks/delete",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'testTask':testTask
                },
                success: function(data) {
                    parentBlock.remove();
                    window.location.href = "http://hrm.dev/vacancy/test-tasks/list";
                }
            });

        });

        yesButton.last().click(function ()
        {
            $(".sure-delete").css('display', 'none');
        });

    },

    init: function ()
    {
        $(".delete-btn").on('click', this.testTasks);
        $(".add-candidate-popup").on("click",this.getCandidates);
        $(".save-btn").on("click",this.search);

        $( function() {
            var select2 = $('#sortCandidate').select2({
                tags: true,
                placeholder: 'Types vacancy'
            });
            var select3 = $('#sortCandidate2').select2({
                tags: true,
                placeholder: 'Types vacancy'
            });
            select2.data('select2').$container.addClass('sort_candidate');
            select2.data('select2').$dropdown.addClass('sort_candidate--open');

            select3.data('select3').$container.addClass('sort_candidate');
            select3.data('select3').$dropdown.addClass('sort_candidate--open');
        });

    },

    testTasks: function (event){
        testTask.testTask(event);
    },

    getCandidates: function(){
        testTask.getPopup(event);
        testTask.popup();
    }



};
