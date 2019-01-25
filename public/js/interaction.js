function likeSuggestion(eventID, element) {
    apiAJAXSend('/like', {
        id_user: connected_user.id,
        id_event: eventID
    }, function() {
        $(element).addClass('btn-outline-primary').removeClass('btn-primary')
            .text('Se desinscrire')
            .attr("onclick","unregisterEvent("+eventID+",this)");
    },
    'PUT');
}

function unlikeSuggestion(eventID, element) {
    apiAJAXDelete('/users/'+connected_user.id+'/events/'+eventID, function() {
        $(element).removeClass('btn-outline-primary').addClass('btn-primary')
            .text('S\'inscrire')
            .attr("onclick","registerEvent("+eventID+",this)");
    });
}

function registerEvent(eventID, element) {
    apiAJAXSend('/registers', {
        id_user: connected_user.id,
        id_event: eventID
    }, function() {
        $(element).addClass('btn-outline-primary').removeClass('btn-primary')
            .text('Se desinscrire')
            .attr("onclick","unregisterEvent("+eventID+",this)");
    },
    'POST');
}

function unregisterEvent(eventID, element) {
    apiAJAXDelete('/users/'+connected_user.id+'/events/'+eventID, function() {
        $(element).removeClass('btn-outline-primary').addClass('btn-primary')
            .text('S\'inscrire')
            .attr("onclick","registerEvent("+eventID+",this)");
    });
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
        apiAJAXSend('/events', formData, 'POST');
        $("#add-suggestion").trigger("reset");
    }
}