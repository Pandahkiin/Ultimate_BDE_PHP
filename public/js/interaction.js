function likePicture(pictureID, element) {
    apiAJAXSend('/likes', {
        id_user: connected_user.id,
        id_picture: pictureID
    }, function() {
        $(element).removeClass('btn-outline-success').addClass('btn-outline-danger')
            .html('<i class="fas fa-heart-broken"></i>')
            .attr("onclick","unlikePicture("+pictureID+",this)");
    },
    'POST');
}

function unlikePicture(pictureID, element) {
    apiAJAXDelete('/likes/users/'+connected_user.id+'/pictures/'+pictureID, function() {
        $(element).addClass('btn-outline-success').removeClass('btn-outline-danger')
            .html('<i class="far fa-heart"></i>')
            .attr("onclick","likePicture("+pictureID+",this)");
    });
}

function likeSuggestion(eventID, element) {
    apiAJAXSend('/votes', {
        id_user: connected_user.id,
        id_event: eventID
    }, function() {
        $(element).removeClass('btn-outline-success').addClass('btn-outline-danger')
            .html('<i class="fas fa-heart-broken"></i>')
            .attr("onclick","unregisterEvent("+eventID+",this)");
    },
    'POST');
}

function unlikeSuggestion(eventID, element) {
    apiAJAXDelete('/votes/users/'+connected_user.id+'/events/'+eventID, function() {
        $(element).addClass('btn-outline-success').removeClass('btn-outline-danger')
            .html('<i class="far fa-heart"></i>')
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
    apiAJAXDelete('/registers/users/'+connected_user.id+'/events/'+eventID, function() {
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
    formData.approved = '';

    console.log(formData);

    var verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required','']
    ];

    if(!fieldsVerification('#add-suggestion', verification)) {
        apiAJAXSend('/events', formData, null,'POST');
        $("#add-suggestion").trigger("reset");
    }
}

/**
 * Upload a picture on the server
 */
function uploadPicture(modalID, pathTargetID) {
    var form = new FormData($('#'+modalID+'-form')[0]);
    sendPostAjax(
        '/uploadPicture',
        form,
        function(response) {
            $('#'+modalID).modal('toggle');
            if(pathTargetID)
                $('#'+pathTargetID).val(response.path);
        },
        false);
}
function setUploadPictureModal(target, eventID) {
    $('#upload-picture-ok').attr('data-target', target);
    $('#upload-picture-form-id_event').val(eventID);
}

function sendComment(pictureID) {
    var data = {
        _token: CSRF_TOKEN,
        comment: $('#picture-comment-'+pictureID).val(),
        id_picture: pictureID,
    };
    sendPostAjax(
        '/sendComment',
        JSON.stringify(data),
        function() {
            $('#picture-comment-'+pictureID).val('');
            $('#picture-comment-button-'+pictureID).remove();
        },
        'JSON');
}

function deleteCartItem(id_order, id_goodie) {
    sendDELETEAjax(
        '/users/'+connected_user.id+'/orders/'+id_order+'/goodies/'+id_goodie,
        function() {
            location.reload();
        }
    );
}