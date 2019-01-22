var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

function serializeForm(id) {
    var unindexed_array = $(id).serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

function fieldsVerification(formID, verification) {
    var formFail;
    verification.forEach(element => {
        var inputID = formID+'-'+element[0];
        var regex = element[2];
        var errorMsg = element[1];

        var error = '';
        $(inputID).removeClass('is-invalid');

        if($(inputID).prop('required') && $(inputID).val() == '')
            error += 'Le champs doit être remplis. ';
    
        if($(inputID).val() != '' && !$(inputID).val().match(regex))
            error += errorMsg;

        if(error != '') {
            $(inputID).addClass('is-invalid');
            formFail = true;
        }
    
        $(inputID).next().text(error);
    });

    return formFail;
}

function delayAlertPopUp() {
    $('#alert').delay(2000).queue(function() {
        $('#alert').addClass("alert-hidden");
        $('#alert').dequeue();
    });
}

function ajaxSuccess(response) {
    $('#alert').text(response.msg);
    $('#alert').removeClass();

    if(response.status == 'success') {
        $('#alert').addClass('alert alert-success');
        delayAlertPopUp();
    }
    else {
        $('#alert').addClass('alert alert-danger');
        delayAlertPopUp();
    }
}
function ajaxFail(response) {
    $('#alert').text(response.msg);
    $('#alert').text('Une erreur c\'est produite lors de l\'envoi des données.');
    $('#alert').removeClass();
    $('#alert').addClass('alert alert-danger').delayAlertPopUp();
}

function sendNewEvent() {

    formData = serializeForm("#addEventForm");

    verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\s)*[_A-z0-9])*$'],
        ['description','',''],
        ['price',' Le prix doit être un nombre.','[+-]?([0-9]*[.])?[0-9]+']
    ];

    if(!fieldsVerification('#add-event', verification)) {
        $.ajax({
            // the route pointing to the post function
            url: '/administration',
            type: 'POST',
            // send the csrf-token and the input to the controller
            data: {_token: CSRF_TOKEN, message:JSON.stringify(formData)},
            dataType: 'JSON',
            // remind that 'data' is the response of the AjaxController
            success: function(response) {ajaxSuccess(response)},
            fail: function(response) {ajaxFail(response)}
        });
    }
}