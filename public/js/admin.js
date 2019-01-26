
var dataTableGoodie = $('#goodie-list-dataTable').DataTable({
    columnDefs: [
        {"targets": 8,
        "searchable": false},
        {"targets": 8,
        "orderable": false}
    ]
});
var dataTableEvent = $('#event-list-dataTable').DataTable({
    columnDefs: [
        {"targets": [9,10],
        "searchable": false},
        {"targets": [9,10],
        "orderable": false}
    ]
});
var dataTableSuggestion = $('#suggestion-list-dataTable').DataTable({
    columnDefs: [
        {"targets": 5,
        "searchable": false},
        {"targets": 5,
        "orderable": false}
    ]
});

/**
 * Get data from the form, verify and send it with ajax
 */
function sendNewEvent() {
    var formData = serializeForm("#add-event");
    formData.id_campus = connected_user.id_campus;
    formData.id_user = connected_user.id;
    formData.approved = 'approved';

    var verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required',''],
        ['date','required',''],
        ['image','Url invalide','https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{2,256}\\.[a-z]{2,6}\\b([-a-zA-Z0-9@:%_\\+.~#?&//=]*)'],
        ['price',' Le prix doit être un nombre.','[+-]?([0-9]*[.])?[0-9]+']
    ];

    if(!fieldsVerification('#add-event', verification)) {
        apiAJAXSend('/events', formData, null,'POST');
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
        apiAJAXSend('/goodies', formData, null,'POST');
        $("#add-goodie").trigger("reset");
    }
}

function getRegisterList(eventID, fileFormat) {
    window.location="/getRegisterList?_token="+CSRF_TOKEN+"&eventID="+eventID+"&fileFormat="+fileFormat;
}

/**
 * Show a delete modal
 * @param {int} typeID indiquate type (goodie, event, ...)
 * @param {string} objectName Name of the row
 * @param {int} objectID ID of the targeted row
 */
function deleteModal(typeID , rowName, rowID) {
    $('#'+typeID+'-name').text(rowName);
    $('#'+typeID+'-function').attr("onclick",typeID+"("+rowID+")");
}

/* Modal for edit purpose, get values from datatable and populate the form */
function editModalEvent(eventID) {
    var row =$("#table-event-row-"+eventID+" td");
    var data = [];
    row.toArray().forEach(function(element) {
        data.push($(element).text());
    });

    $("#edit-event-name").val(data[0]);
    $("#edit-event-description").val(data[1]);
    $("#edit-event-image").val(data[2]);
    $("#edit-event-date").val(data[3]);
    $("#edit-event-price").val(data[4]);

    $('#editEvent-function').attr("onclick","editEvent("+eventID+")");
}
function editModalGoodie(goodieID) {
    var row =$("#table-goodie-row-"+goodieID+" td");
    var data = [];
    row.toArray().forEach(function(element) {
        data.push($(element).text());
    });
    console.log(data);

    $("#edit-goodie-name").val(data[0]);
    $("#edit-goodie-description").val(data[2]);
    $("#edit-goodie-image").val(data[3]);
    $("#edit-goodie-stock").val(data[4]);
    $("#edit-goodie-price").val(data[1]);

    $('#editGoodie-function').attr("onclick","editGoodie("+goodieID+")");
}

function editModalSuggestion(suggestionID) {
    var row =$("#table-suggestion-row-"+suggestionID+" td");
    var data = [];
    row.toArray().forEach(function(element) {
        data.push($(element).text());
    });
    console.log(data);
    $("#edit-suggestion-name").val(data[0]);
    $("#edit-suggestion-description").val(data[1]);

    $('#editSuggestion-function').attr("onclick","editSuggestion("+suggestionID+")");
}
/* Send UPDATE to database */
function editEvent(eventID) {
    var formData = serializeForm("#edit-event");

    var verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required',''],
        ['date','required',''],
        ['image','Url invalide','https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{2,256}\\.[a-z]{2,6}\\b([-a-zA-Z0-9@:%_\\+.~#?&//=]*)'],
        ['price',' Le prix doit être un nombre.','[+-]?([0-9]*[.])?[0-9]+']
    ];

    if(!fieldsVerification('#edit-event', verification)) {
        $('#editEvent').modal('toggle');
        apiAJAXSend('/events/'+eventID, formData, function() {
            location.reload();
        },'PUT');
    }
}
function editGoodie(goodieID) {
    var formData = serializeForm("#edit-goodie");

    var verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required',''],
        ['image','Url invalide','https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{2,256}\\.[a-z]{2,6}\\b([-a-zA-Z0-9@:%_\\+.~#?&//=]*)'],
        ['price','Le prix doit être un nombre.','[+-]?([0-9]*[.])?[0-9]+'],
        ['stock','Le stock doit être un nombre.','[+-]?([0-9]*[.])?[0-9]+']
    ];

    if(!fieldsVerification('#edit-goodie', verification)) {
        $('#editGoodie').modal('toggle');
        apiAJAXSend('/goodies/'+goodieID, formData, function() {
            location.reload();
        },'PUT');
    }
}
function editSuggestion(suggestionID) {
    var formData = serializeForm("#edit-suggestion");

    var verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required','']
    ];

    if(!fieldsVerification('#edit-suggestion', verification)) {
        $('#editSuggestion').modal('toggle');
        apiAJAXSend('/events/'+suggestionID, formData, function() {
            location.reload();
        },'PUT');
    }
}

/* Send DELETE to database */
function deleteEvent(eventID) {
    apiAJAXDelete('/events/'+eventID, function() {
        dataTableEvent.row($('#table-event-row-'+eventID)).remove().draw();
    });
}
function deleteSuggestion(suggestionID) {
    apiAJAXDelete('/events/'+suggestionID, function() {
        dataTableSuggestion.row($('#table-suggestion-row-'+suggestionID)).remove().draw();
    });
}
function deleteGoodie(goodieID) {
    apiAJAXDelete('/goodies/'+goodieID, function() {
        dataTableGoodie.row($('#table-goodie-row-'+goodieID)).remove().draw();
    });
}