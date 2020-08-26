
userProfileManager = {

    init: function (configData) {
        jsonConfig = configData;

        $('#user-location').editable({

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
                width: '170px',
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

        $('#user-name, #work_email, #description').editable({

            ajaxOptions: {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: jsonConfig.userProfileUpdate,

        });

    }

}