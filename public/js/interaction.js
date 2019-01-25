function registerEvent(eventID, element) {

    var data = {
        id_user: connected_user.id,
        id_event: eventID
    };

    apiAJAXPost('/registers', data);

    $(element).addClass('btn-outline-primary');
    $(element).removeClass('btn-primary');
    $(element).text('Se désinscrire');

    $(element).attr("onclick","unregisterEvent("+eventID+",this)");
}

function unregisterEvent(eventID, element) {

    apiAJAXDelete('/users/'+connected_user.id+'/events/'+eventID);

    $(element).removeClass('btn-outline-primary');
    $(element).addClass('btn-primary');
    $(element).text('S\'inscrire');

    $(element).attr("onclick","registerEvent("+eventID+",this)");
}

function sendNewSuggestion() {
    var formData = serializeForm("#add-suggestion");
    formData.id_campus = connected_user.id_campus;
    formData.image = '0';
    formData.id_user = connected_user.id;
    formData.date = '1970-1-1';
    formData.price = '0';

    console.log(formData);

    var verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required','']
    ];

    if(!fieldsVerification('#add-suggestion', verification)) {
        apiAJAXPost('/events', formData);
        $("#add-suggestion").trigger("reset");
    }
}