var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$.ajaxSetup({
    headers: {
        'x-access-token': APItoken
    }
});
/**
 * POST Ajax function
 * @param {string} url target url
 * @param {object} data data to send
 * @param {function} callbackSuccess launch on AJAX success
 * @param {string} httpMethod type of HTTP request
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
            else {
                response = JSON.parse(jqXHR.responseText);
                alertPopUp(response.status, response.message);
            }
        }
    }).done(
        function(response) {
            alertPopUp(response.status, response.message);
            if(callbackSuccess)
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
        timeout: 3000,
        error: function(jqXHR, textStatus, errorThrown) {
            if(textStatus==="timeout") {
                alertPopUp('warning', 'Délai d\'attente dépassé ...');
            }
            else {
                response = JSON.parse(jqXHR.responseText);
                alertPopUp(response.status, response.message);
            }
        }
    }).done(
        function(response) {
            alertPopUp(response.status, response.message);
            if(callbackSuccess)
                callbackSuccess();
        }
    ).fail(
        function(jqXHR) {
            response = JSON.parse(jqXHR.responseText);
            alertPopUp(response.status, response.message);
        }
    );
}

function sendPostAjax(url, data, callbackSuccess, contentType) {
    $.ajax({
        // the route pointing to the post function
        url: url,
        type: 'POST',
        data: data,
        contentType: contentType,
        timeout: 3000,
        error: function(jqXHR, textStatus, errorThrown) {
            if(textStatus==="timeout") {
                alertPopUp('warning', 'Délai d\'attente dépassé ...');
            }
            else {
                response = JSON.parse(jqXHR.responseText);
                alertPopUp(response.status, response.message);
            }
        }
    }).done(
        function(response) {
            alertPopUp(response.status, response.message);
            if(callbackSuccess)
                callbackSuccess(response);
        }
    ).fail(
        function(jqXHR) {
            response = JSON.parse(jqXHR.responseText);
            alertPopUp(response.status, response.message);
        }
    );
}