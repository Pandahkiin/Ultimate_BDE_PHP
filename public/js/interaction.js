function registerEvent(eventID, element) {
    sendPostAjax('/registerEvent', eventID);

    $(element).addClass('btn-outline-primary');
    $(element).removeClass('btn-primary');
    $(element).text('Se désinscrire');

    $(element).attr("onclick","unregisterEvent("+eventID+",this)");
}

function unregisterEvent(eventID, element) {
    sendPostAjax('/unregisterEvent', eventID);

    $(element).removeClass('btn-outline-primary');
    $(element).addClass('btn-primary');
    $(element).text('S\'inscrire');

    $(element).attr("onclick","registerEvent("+eventID+",this)");
}

function sendNewSuggestion() {
    var formData = serializeForm("#add-suggestion");
    formData.id_campus = connected_user.id_campus;
    formData.id_user = connected_user.id;

    var verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required','']
    ];

    if(!fieldsVerification('#add-suggestion', verification)) {
        apiAJAXPost('/events', JSON.stringify(formData));
        $("#add-suggestion").trigger("reset");
    }
}