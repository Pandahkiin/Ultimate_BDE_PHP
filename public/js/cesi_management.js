function reportEvent(eventID) {
    apiAJAXSend('/events/'+eventID, {
        id_approbation: 3
    }, null,'PUT');
}