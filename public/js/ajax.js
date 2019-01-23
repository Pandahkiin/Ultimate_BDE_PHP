var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

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
 * POST Ajax function
 * @param {string} url target url
 * @param {JSON} data JSON formated data to send
 */
function sendPostAjax(url, data) {
    $.ajax({
        // the route pointing to the post function
        url: url,
        type: 'POST',
        // send the csrf-token and the input to the controller
        data: {_token: CSRF_TOKEN, message:data},
        dataType: 'JSON',

        success: function(response) {ajaxSuccess(response)},
        fail: function(response) {ajaxFail(response)}
    });
}