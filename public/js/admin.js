
$.ajaxSetup({
    headers: {
        'x-access-token': APItoken
    }
});

function connectToAPI() {
    $.ajax({
        // the route pointing to the post function
        type: 'GET',
        url: 'http://127.0.0.1:3000/api/campuses',
        crossDomain: true,
        dataType: 'JSON',
        success: function(response) {
           console.log(response);
        }
    });
}
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

/**
 * Get data from the form, verify and send it with ajax
 */
function sendNewEvent() {
    var formData = serializeForm("#add-event");
    formData.id_campus = connected_user.id_campus;
    formData.id_user = connected_user.id;

    var verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required',''],
        ['date','required',''],
        ['image','Url invalide','https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{2,256}\\.[a-z]{2,6}\\b([-a-zA-Z0-9@:%_\\+.~#?&//=]*)'],
        ['price',' Le prix doit être un nombre.','[+-]?([0-9]*[.])?[0-9]+']
    ];

    if(!fieldsVerification('#add-event', verification)) {
        apiAJAXPost('/events', JSON.stringify(formData));
        $("#add-event").trigger("reset");
    }
}

/**
 * Get data from the form, verify and send it with ajax
 */
function sendNewGoodie() {
    var formData = serializeForm("#add-goodie");
    formData.id_campus = connected_user.id_campus;
    var verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required',''],
        ['image','Url invalide','https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{2,256}\\.[a-z]{2,6}\\b([-a-zA-Z0-9@:%_\\+.~#?&//=]*)'],
        ['price',' Le prix doit être un nombre.','[+-]?([0-9]*[.])?[0-9]+'],
        ['stock',' Le stock doit être un entier.','[0-9]*']
    ];

    if(!fieldsVerification('#add-goodie', verification)) {
        apiAJAXPost('/goodies', JSON.stringify(formData));
        //$("#add-goodie").trigger("reset");
    }
}

function getRegisterList(eventID, fileFormat) {
    window.location="/getRegisterList?_token="+CSRF_TOKEN+"&eventID="+eventID+"&fileFormat="+fileFormat;
}

/**
 * Delete a event, show the modal with event name and function to api
 */
function deleteEventModal(eventName, eventID, rowNumber) {
    $('#modal-event-delete-name').text(eventName);
    $('#modal-event-delete-function').attr("onclick","deleteEvent("+eventID+","+rowNumber+")");
}
function deleteEvent(eventID, rowNumber) {
    document.getElementById("past-event-list").deleteRow(rowNumber+1); 
    apiAJAXDelete('/events/'+eventID);
}

/**
 * Delete a goodie, show the modal with godie name and function to api
 */
function deleteEventModal(goodieName, goodieID, rowNumber) {
    $('#modal-goodie-delete-name').text(goodieName);
    $('#modal-goodie-delete-function').attr("onclick","deleteEvent("+goodieID+","+rowNumber+")");
}
function deleteEvent(goodieID, rowNumber) {
    document.getElementById("goodie-list").deleteRow(rowNumber+1); 
    apiAJAXDelete('/goodies/'+goodieID);
}