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
    verification.forEach(element => {
        var inputID = formID+'-'+element[0];
        var regex = element[2];
        var errorMsg = element[1];

        var error = '';

        if($(inputID).prop('required') && $(inputID).val() == '')
            error += 'Le champs doit être remplis. ';
    
        if(regex != '' && !$(inputID).val().match(regex))
            error += errorMsg;

        if(error != '')
            $(inputID).addClass('is-invalid');
    
        $(inputID).next().text(error);
    });
}

function sendNewEvent() {

    formData = serializeForm("#addEventForm");

    verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\s)*[_A-z0-9])*$'],
        ['description','',''],
        ['price',' Le prix doit être un nombre.','[+-]?([0-9]*[.])?[0-9]+'],
    ];

    fieldsVerification('#add-event', verification);
/*
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
    });*/
}