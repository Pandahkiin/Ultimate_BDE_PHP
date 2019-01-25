var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$.ajaxSetup({
    headers: {
        'x-access-token': APItoken
    }
});
/**
 * POST Ajax function
 * @param {string} url target url
 * @param {JSON} data JSON formated data to send
 */
function apiAJAXSend(url, data, callbackSuccess, httpMethod) {
    $.ajax({
        // the route pointing to the post function
        url: 'http://127.0.0.1:3000/api'+url,
        type: httpMethod,
        headers: {
            'Content-Type': 'application/json'
        },
        // send the csrf-token and the input to the controller
        data: JSON.stringify(data),
        crossDomain: true,
        dataType: 'JSON',
        timeout: 3000,
        error: function(jqXHR, textStatus, errorThrown) {
            if(textStatus==="timeout") {
                alertPopUp('warning', 'Délai d\'attente dépassé ...');
            }
        }
    }).done(
        function(response) {
            alertPopUp(response.status, response.message);
            callbackSuccess();
        }
    ).fail(
        function(jqXHR) {
            response = JSON.parse(jqXHR.responseText);
            alertPopUp(response.status, response.message);
        }
    );
}

function apiAJAXDelete(url, callbackSuccess) {
    $.ajax({
        url: 'http://127.0.0.1:3000/api'+url,
        type: 'DELETE',
        crossDomain: true,
        dataType: 'JSON',
        success: function(response) {
            alertPopUp(response.status, response.message);
            callbackSuccess();
        },
        fail: function(response) {
            alertPopUp(response.status, response.message);
        },
    });
    
}

function sendPostAjax(url, data) {
    $.ajax({
        // the route pointing to the post function
        url: url,
        type: 'POST',
        // send the csrf-token and the input to the controller
        data: {_token: CSRF_TOKEN, message:data},
        dataType: 'JSON',
        success: function(response) {alertPopUp(response.status, response.msg);},
        fail: function(response) {alertPopUp(response.status, response.msg)},
        timeout: 3000,
        error: function(jqXHR, textStatus, errorThrown) {
            if(textStatus==="timeout") {
                alertPopUp('warning', 'Délai d\'attente dépassé ...');
            }
        }
    });
}