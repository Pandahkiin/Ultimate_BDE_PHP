var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

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

        success: function(response) {alertPopUp(response.status, response.msg)},
        fail: function(response) {alertPopUp(response.status, response.msg)},
        timeout: 3000,
        error: function(jqXHR, textStatus, errorThrown) {
            if(textStatus==="timeout") {
                alertPopUp('warning', 'Délai d\'attente dépassé ...');
            }
        }
    });
}

function sendGetAjax(url, param) {
    $.ajax({
        // the route pointing to the post function
        url: url,
        type: 'GET',
        // send the csrf-token and the input to the controller
        data: param,
        timeout: 3000
    });
}