
var WelcomeMessageManager = {

    create: function(e)
    {

        e.preventDefault();
        $("#create-welcome-message").show();
        $('main').css('filter', 'blur(5px)');
        $('#sidebar').css('filter', 'blur(5px)');

        $(".close-popup").on('click',function(){

            $("#create-welcome-message").hide();
            $('main').css('filter', 'blur(0)');
            $('#sidebar').css('filter', 'blur(0)');

        });

        $(".save-btn").on('click', function(){
            var name = $("#name-message").val();
            var type = $("#type-vacancy").val();
            var content = $("#content-message").val();

            $.ajax({
                type: "POST",
                url: "/vacancy/welcome-messages/save",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'name':name,
                    'type':type,
                    'description':content
                },
                success: function(data) {
                     location.reload();
                }
            });
        });
    },

    sendCandidates: function(e)
    {
        e.preventDefault();
        $("#send-welcome-message").css('display','block');
        $('main').css('filter', 'blur(5px)');
        $('#sidebar').css('filter', 'blur(5px)');

        $(".close-popup").on('click',function(){
        $("#send-welcome-message").hide();
        $('main').css('filter', 'blur(0)');
        $('#sidebar').css('filter', 'blur(0)');

        });
    },

    WelcomeMessage: function(e)
    {
        e.preventDefault();
        e.stopPropagation();

        var sureBlock = $(e.target).siblings('.sure-delete');
        var yesButton = sureBlock.find('p');

        sureBlock.css('display', 'block');
        var Message = $(e.target).attr('data-id');

        yesButton.first().click(function ()
        {
            var parentBlock = $(this).closest('.message-item');
            $.ajax({
                type: "POST",
                url: "/vacancy/welcome-messages",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'welcomeMessage':Message
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

      $(".search-btn").on("click",function() {
          var data = $(".search").val();
          $.ajax({
              type: "POST",
              url: "/vacancy/welcome-messages/search",
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: {
                  'data': data
              },
              success: function (result) {
                  $(".update-btn").empty();
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
      });
    },

    clicks: function()
    {
        var item = $(".popup-candidate-item").find("label");

        item.on("click",function()
        {
            var check = $(this).siblings('input');
            check.attr('checked',check.is(':checked'));
        });
    },

    init: function ()
    {
        $("#create-new-message").on("click", this.create);
        $(".send-btn").on("click",this.sendCandidate);
        $(".delete-btn").on('click', this.WelcomeMessages);

        $( function() {
            var select2 = $('#sortCandidate').select2({
                tags: true,
                placeholder: 'Types vacancy'
            });
            select2.data('select2').$container.addClass('sort_candidate');
            select2.data('select2').$dropdown.addClass('sort_candidate--open');
        });

    },

    WelcomeMessages: function (event){

        WelcomeMessageManager.WelcomeMessage(event);
    },

    sendCandidate: function(event)
    {
        WelcomeMessageManager.sendCandidates(event);
        WelcomeMessageManager.popup();
        WelcomeMessageManager.clicks();
        WelcomeMessageManager.search();
    }



};
