    const CONSTANT_COUNTER_VALUE = 2;
    var jsonConfig;

    candidateManager = {
        resumeCounter: CONSTANT_COUNTER_VALUE,
        testTaskCounter: CONSTANT_COUNTER_VALUE,
        oldFileName: oldFileName = '',

        newDiv: function (inputType, id, labelText, parentBlock) {
            var fragment = document.createDocumentFragment();

            var newDiv = document.createElement("div");
            newDiv.setAttribute('class', 'wrapper-upload ' + inputType);

            var newInput = document.createElement('input');
            newInput.setAttribute('type', 'file');
            newInput.setAttribute('class', 'inputfile getFile');
            newInput.setAttribute('id', id);
            newInput.setAttribute('data-role', 'edit');
            if(inputType == 'resume'){
                newInput.setAttribute('name', 'fileCandidateResume[]');
            }else {
                newInput.setAttribute('name', 'fileCandidateTestTask[]');
            }
            $(newInput).on('click', function () {
                candidateManager.getFileName(this);
            });
            $(newInput).on('change', function () {
                candidateManager.setFileName(this);
            });

            var newLabel = document.createElement('label');
            newLabel.setAttribute('for', id);
            $(newLabel).html('<img src="/img/icons/up-arrow.png" class="addImage"><span class="imageTitle">' + labelText + '</span>');

            var btnClose = document.createElement('i');
            btnClose.setAttribute('class', 'fa fa-close cleanCurrentBlock');
            btnClose.setAttribute('data-role', 'edit');
            $(btnClose).on('click', function() {
                candidateManager.cleanInput(this);
            });

            fragment.appendChild(newInput);
            fragment.appendChild(newLabel);
            fragment.appendChild(btnClose);

            newDiv.appendChild(fragment);

            var link = $(parentBlock);

            $(newDiv).insertBefore(link)
        },

        cleanInput: function (el) {
            var parent = $(el).closest('.wrapper-upload');
            var parentClassNames = parent[0].className;
            var allParents = document.getElementsByClassName(parentClassNames);
            var countParents = allParents.length;

            var page = $(el).attr("data-role");
            if(page == 'edit'){
                var tagInput = parent.find('input')[0];
                var fileName = $(tagInput).siblings().children('span.imageTitle').text();
            }

            if (countParents > 1) {
                parent.remove();
                if(page == 'edit') {
                    candidateManager.deleteFile(fileName);
                }
            } else {
                parent.find('input')[0].value  = "";

                if(parent.hasClass('resume')){
                    parent.find('span').html('File of Resume');
                } else {
                    parent.find('span').html('File of Test Task');
                }

                if(page == 'edit') {
                    candidateManager.deleteFile(fileName);
                }
            }
        },

        getFileName: function (tagInput) {
            var path = tagInput.value;
            if(path == ''){
                var fileName = $(tagInput).siblings().children('span.imageTitle').text();
            }else{
                var fileName = path.split("\\").pop();
            }

            candidateManager.oldFileName = fileName;

        },

        setFileName: function (tagInput) {
            var path = tagInput.value;
            if(path == ''){
                return;
            }

            var span = $(tagInput).siblings().children('span.imageTitle');
            var fileName = path.split("\\").pop();

            if(fileName.length > 0){
                span[0].innerHTML = fileName;
            }else{
                span[0].innerHTML = candidateManager.oldFileName;
            }

            var page = $(tagInput).attr("data-role");
            if(page == 'edit'){
                candidateManager.editFile(tagInput, fileName);
            }

        },

        validateEmail: function () {
            var expression = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            if (expression.test($('#email').val())) {
                return true;
            }else {
                return false;
            }
        },

        changeVisibleInLink: function (comeInput, comeP, comeButton) {
            var input = comeInput;
            var inputValue = comeInput.val();
            var pInput = comeP;

            if(input.is(':visible')) {
                if (inputValue === '') {
                    console.log('Empty')
                } else {
                    input.hide();
                    pInput.text(inputValue);
                    pInput.show();
                    comeButton.text('Change');
                    comeButton.addClass('change');
                }
            } else {
                comeButton.text('Add');
                comeButton.removeClass('change');
                input.show();
                pInput.hide();
            }
        },

        uploadPhotoCandidate: function (elem, url, id) {
            var img = $(elem).siblings('.add-photo-candidate').children('img#photo');
            var file = elem.files[0];
            var data = new FormData();
            data.append('tempFile', file);
            data.append('id', id);
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processData: false,
                    contentType: false,
                    url: url,
                    data: data,
                    success: function (data) {
                        img.attr('src', data);
                    }
            })
        },

        getLocation: function (elem, url) {
            $(elem).autocomplete({
                source: url
            });
        },

        doSearchCandidate: function (elem, url) {
            $(elem).autocomplete({
                source: url
            });
        },

        deletePhoto: function (id, url) {
            var imgPath = $(".add-photo-candidate img").attr("src");
            if(typeof imgPath !== "undefined"){
                var arrData = imgPath.split('/');
                var fileName = arrData[arrData.length - 1];

                $.get(url, {fileName: fileName, id: id});
            }
        },

        updateLink: function (elem, url) {
            var button = '';
            var input = '';
            button = $(elem).attr('id');
            if(button == 'changeLinkLinkedin'){
                input = 'linkedin';
            }
            if(button == 'changeLinkFacebook'){
                input = 'facebook';
            }
            if(button == 'changeEmail'){
                input = 'email';
            }
            var val = document.getElementsByName(input)[0].value;
            if(candidateManager.isEmpty(val)){
                alert('Field is empty!');
                return;
            }
            $.ajax({
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: {id: jsonConfig.id, input: input, val: val},
            })
        },

        isEmpty: function (val) {
            if(!val || val.length == 0){
                return true;
            }
            return false;
        },

        editFile: function (tagInput, fileName) {
            var inputId = $(tagInput).attr("id").split('_')[0];
            var file = tagInput.files[0];
            var data = new FormData();
            data.append('tempFile', file);
            data.append('id', jsonConfig.id);
            data.append('oldFileName', candidateManager.oldFileName);
            data.append('fileName', fileName);
            data.append('inputId', inputId);



            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                contentType: false,
                url: jsonConfig.candidateEditFile,
                data: data,
                success: function (data) {
                    console.log('File is added.');
                }
            })
        },

        deleteFile: function (fileName) {
            $.ajax({
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: jsonConfig.candidateDeleteFile,
                data: {id: jsonConfig.id, fileName: fileName},
                success: function (data) {
                    console.log('File is deleted.');
                }
            })
        },

        deleteFromVacancy: function(e){
                e.preventDefault();
                e.stopPropagation();

                var sureBlock = $(e.target).siblings('.sure-delete');
                var yesButton = sureBlock.find('p');

                sureBlock.css('display', 'block');
                var candidate = $(e.target).attr('data-id');
                var vacancyId = $("#vacancyId").attr('data-id');

                yesButton.first().click(function ()
                {
                    var parentBlock = $(this).closest(".candidate-list-item");
                    $.ajax({
                        type: "POST",
                        url: "/vacancy/candidate/delete",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'candidate':candidate,
                            'vacancyId':vacancyId
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
        deletefrom: function (event){
            candidateManager.deleteFromVacancy(event);
        },
// configData
        init: function (configData) {
           jsonConfig = configData;
           $(".delete-btn").on('click',this.deletefrom);
           $('a#fileResume').on('click', this.fileResume);
           $('a#fileTestTask').on('click', this.fileTestTask);
           $('i.cleanCurrentBlock').on('click', this.cleanCurrentBlock);
           $('input.getFile').on('change', this.setFile);
           $('input.getFile').on('click', this.getFile);
           $('.social-link_email button').on('click', this.socialLinkEmail);
           $('.social-link button').on('click', this.socialLink);
           $('input#photoCandidate').on('change', this.photoCandidate);
           $('#location').on('input', this.location);
           $('#searchItem').on('input', this.searchCandidate);
           $('input#updatePhotoCandidate').on('change', this.updatePhotoCandidate);
           $('#changeLinkLinkedin, #changeLinkFacebook, #changeEmail').on('click', this.editLink);

           $( function() {
               var select2 = $('#sortCandidate').select2({
                   tags: true,
                   placeholder: 'Types candidate'
               });
               // select2.data('select2').$container.addClass('sort_candidate');
               // select2.data('select2').$dropdown.addClass('sort_candidate--open');
           });

            $('#candidate-name, #required_position, #education, #experience, #description').editable({
               ajaxOptions: {
                   method: 'PUT',
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
               },
               url: jsonConfig.VacancyUpdate,
           });

            $('#candidate-location').editable({

                ajaxOptions: {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                },

                type: 'select2',
                onblur: 'submit',
                emptytext: 'None',

                select2: {
                    placeholder: 'Select a Requester',
                    allowClear: true,
                    width: '165px',
                    minimumInputLength: 3,
                    id: function (e) {
                        return e;
                    },
                    ajax: {
                        url: jsonConfig.citySearchAutocomplete,
                        dataType: 'json',
                        data: function (term, page) {
                            return { term: term };
                        },
                        results: function (data, page) {
                            return { results: data };
                        }
                    },
                    formatResult: function (city) {
                        return city;
                    },
                    formatSelection: function (city) {
                        return city;
                    },
                    initSelection: function (element, callback) {
                        return $.get(jsonConfig.citySearchAutocomplete, { query: element.val() }, function (data) {
                            callback(data);
                        }, 'json');
                    }
                }
            });

            $('#skills').on('beforeItemAdd', function(event) {
                var tag = event.item;
                if (!event.options || !event.options.preventPost) {
                    $.ajax({
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: jsonConfig.candidateUpdateSkills,
                        data: {id: jsonConfig.id, skill: tag},
                        success: function (data) {
                            if(candidateManager.isEmpty(data)){
                                $('#skills').tagsinput('remove', tag, {preventPost: true});
                            }
                        }
                    })
                }
            });
            $('#skills').on('beforeItemRemove', function(event) {
                var tag = event.item;
                $.ajax({
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: jsonConfig.candidateDeleteSkills,
                    data: {id: jsonConfig.id, skill: tag},
                    success: function (data) {
                        if(!candidateManager.isEmpty(data)){
                            $('#skills').tagsinput('add', tag, {preventPost: true});
                        }
                    }
                })
            });

        },

        fileResume: function (event) {
            candidateManager.oldFileName = '';
           candidateManager.newDiv('resume', 'inputResume_' + candidateManager.resumeCounter, 'File of Resume', event.target);
           candidateManager.resumeCounter++;
       },

        fileTestTask: function (event) {
            candidateManager.oldFileName = '';
           candidateManager.newDiv('testTask', 'inputTest_' + candidateManager.testTaskCounter, 'File of Test Task', event.target);
           candidateManager.testTaskCounter++;
       },

        cleanCurrentBlock: function (event) {
           candidateManager.cleanInput(event.target);
        },

        getFile: function (event) {
            candidateManager.getFileName(event.target);
        },

        setFile: function (event) {
            candidateManager.setFileName(event.target);
        },

        socialLinkEmail: function () {
            if(!candidateManager.validateEmail($('#email').val())){
                alert('Invalid email!');
                return true;
            }
            candidateManager.changeVisibleInLink($(this).siblings('input'), $(this).siblings('p'), $(this));
        },

        socialLink: function () {
            candidateManager.changeVisibleInLink($(this).siblings('input'), $(this).siblings('p'), $(this));
        },

        photoCandidate: function () {
            candidateManager.uploadPhotoCandidate(this, jsonConfig.uploadPhotoUrl);
        },

        location: function () {
            candidateManager.getLocation(this, jsonConfig.citySearchAutocomplete);
        },

        searchCandidate: function () {
            candidateManager.doSearchCandidate(this, jsonConfig.candidateSearchAutocomplete);
        },

        updatePhotoCandidate: function () {
            candidateManager.deletePhoto(jsonConfig.id, jsonConfig.deletePhotoUrl);
            candidateManager.uploadPhotoCandidate(this, jsonConfig.updatePhotoUrl, jsonConfig.id);
        },

        editLink: function () {
            candidateManager.updateLink(this, jsonConfig.editeLink);
        },

    };

    $( document ).ready(function() {
        $('[name="searchTags"]').on('submit', function (e) {
            e.preventDefault();
            var sort = $('input[name="search-tags"]').val();
            var dataSort = $('input[name="search-tags"]').attr('data-sort');

            $.ajax({
                url: '/candidate/list/' + sort,
                type: 'get',
                data: dataSort,

                success: function (html) {

                    var str = '/candidate/list/' + sort + '?' + dataSort;
                    history.pushState(null, null, str);
                    window.location = '';
                    $('body').html(html);
                },
                error: function () {

                }
            });
        });

        $('[name="searchCountry"]').on('submit', function (e) {
            e.preventDefault();
            var sort = $('input[name="search-country"]').val();
            var dataSort = $('input[name="search-country"]').attr('data-sort');

            $.ajax({
                url: '/candidate/list/' + sort,
                type: 'get',
                data: dataSort,

                success: function (html) {
                    var str = '/candidate/list/' + sort + '?' + dataSort;
                    history.pushState(null, null, str);
                    window.location = '';
                    $('body').html(html);
                },
                error: function () {

                }
            });
        });

        $('[name="searchAge"]').on('submit', function (e) {
            e.preventDefault();
            var sort = $('input[name="search-age"]').val();
            var dataSort = $('input[name="search-age"]').attr('data-sort');

            $.ajax({
                url: '/candidate/list/' + sort,
                type: 'get',
                data: dataSort,

                success: function (html) {
                    var str = '/candidate/list/' + sort + '?' + dataSort;
                    history.pushState(null, null, str);
                    window.location = '';
                    $('body').html(html);
                },
                error: function () {

                }
            });
        });

        $('.sort-experience select').on('change', function (e) {
            e.preventDefault();
            var dataSort = $("option:selected", this).attr('data-sort');
            var sort = $("option:selected", this).attr('value');

            $.ajax({
                url: '/candidate/list/' + sort,
                type: 'get',
                data: dataSort,

                success: function (html) {

                    var str = '/candidate/list/' + sort + '?' + dataSort;
                    history.pushState(null, null, str);
                    window.location = '';
                    $('body').html(html);
                },
                error: function () {

                }
            });
        });

    });

