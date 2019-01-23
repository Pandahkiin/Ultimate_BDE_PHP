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

    if(!fieldsVerification('#add-event', verification))
        sendPostAjax('/addEvent',JSON.stringify(formData));
}

function sendNewGoodie() {
    formData = serializeForm("#add-goodie");

    verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required',''],
        ['image','Url invalide','https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{2,256}\\.[a-z]{2,6}\\b([-a-zA-Z0-9@:%_\\+.~#?&//=]*)'],
        ['price',' Le prix doit être un nombre.','[+-]?([0-9]*[.])?[0-9]+'],
        ['stock',' Le stock doit être un entier.','[0-9]*']
    ];

    if(!fieldsVerification('#add-goodie', verification))
        sendPostAjax('/addGoodie',JSON.stringify(formData));
}