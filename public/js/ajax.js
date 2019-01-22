var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

function serializeForm(id) {
    var unindexed_array = $(id).serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

function inputValidator(inputID, regex, errorMsg) {
    var error = '';

    if($(inputID).prop('required') && $(inputID).val == '')
        error += 'Le champs doit être remplis. ';

    if(!$(inputID).val.match(regex))
        error += errorMsg;

    $(inputID).next().text() = error;
}

function fieldsVerification(formID, regex) {
    Object.entries(data).forEach(element => {
        
    });
}

function sendNewEvent() {

    formData = serializeForm("#addEventForm");

    regex = {
        name: '^[_A-z0-9]*((-|\s)*[_A-z0-9])*$',
        price: '[+-]?([0-9]*[.])?[0-9]+'
    };

    $.ajax({
        // the route pointing to the post function
        url: '/administration',
        type: 'POST',
        // send the csrf-token and the input to the controller
        data: {_token: CSRF_TOKEN, message:JSON.stringify(formData)},
        dataType: 'JSON',
        // remind that 'data' is the response of the AjaxController
        success: function (response) { 
            console.log(response.msg); 
        }
    });
}