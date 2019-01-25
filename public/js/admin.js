$(document).ready(function() {
    $('#goodie-list-dataTable').DataTable();
    $('#past-event-list').DataTable();
});

/**
 * Get data from the form, verify and send it with ajax
 */
function sendNewEvent() {
    var formData = serializeForm("#add-event");
    formData.id_campus = connected_user.id_campus;
    formData.id_user = connected_user.id;

    console.log(formData);

    var verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required',''],
        ['date','required',''],
        ['image','Url invalide','https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{2,256}\\.[a-z]{2,6}\\b([-a-zA-Z0-9@:%_\\+.~#?&//=]*)'],
        ['price',' Le prix doit être un nombre.','[+-]?([0-9]*[.])?[0-9]+']
    ];

    if(!fieldsVerification('#add-event', verification)) {
        apiAJAXPost('/events', formData);
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
        apiAJAXPost('/goodies', formData);
        $("#add-goodie").trigger("reset");
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
    document.getElementById("goodie-list-dataTable").deleteRow(rowNumber+1); 
    apiAJAXDelete('/goodies/'+goodieID);
}