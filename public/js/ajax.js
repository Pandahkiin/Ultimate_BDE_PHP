var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

/**
 * Get all inputs values from a form
 * @param {string} id id of the target form
 * @returns {indexed array} array with name: values from form inputs
 */
function serializeForm(id) {
    var unindexed_array = $(id).serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

/**
 * Verify if inputs of a forms are valids
 * @param {*} formID id of the target form
 * @param {*} verification array [input name, error message, verification regex]
 * @returns {boolean} return if the verification fail
 */
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
/* Alert animation */
function delayAlertPopUp() {
    $('#alert').delay(3000).queue(function() {
        $('#alert').addClass("alert-hidden");
        $('#alert').dequeue();
    });
}

/* Function launch if ajax is successful */
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
/* Function launch if ajax fail */
function ajaxFail(response) {
    $('#alert').text(response.msg);
    $('#alert').text('Une erreur c\'est produite lors de l\'envoi des données.');
    $('#alert').removeClass();
    $('#alert').addClass('alert alert-danger').delayAlertPopUp();
}

/**
 * Get data from the form, verify and send it with ajax
 */
function sendNewEvent() {
    formData = serializeForm("#add-event");

    verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required',''],
        ['date','required',''],
        ['image','Url invalide','https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{2,256}\\.[a-z]{2,6}\\b([-a-zA-Z0-9@:%_\\+.~#?&//=]*)'],
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