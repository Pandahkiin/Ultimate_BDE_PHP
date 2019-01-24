/**
 * Show an alert message
 * @param {string} status bootstrap alert class, define the style
 * @param {string} message message to show
 */
function alertPopUp(status, message) {
    $('#alert').text(message);
    $('#alert').removeClass();
    $('#alert').addClass('alert alert-'+status);

    $('#alert').delay(3000).queue(function() {
        $('#alert').addClass("alert-hidden");
        $('#alert').dequeue();
    });
}

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