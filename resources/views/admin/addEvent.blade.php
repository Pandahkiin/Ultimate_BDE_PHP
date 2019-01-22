<div class="card card-body">
    <form id="add-event">
        <div class="form-group">
            <label for="add-event-name">Nom de l'événement</label>
            <input type="text" class="form-control is-invalid" name="name" maxlength="50" id="add-event-name" required>
            <label class="form-text text-danger"></label>
        </div>
        <div class="form-group">
            <label for="add-event-description">Déscription (1500 caractères)</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="1500" name="description" id="add-event-description" required></textarea>
            <label class="form-text text-danger"></label>
        </div>
        <div class="form-group">
            <label for="add-event-recurrence">Récurrence</label>
            <select class="form-control" id="add-event-recurrence" name="reccurency">
                <option>Auncune</option>
                <option>Semaine</option>
                <option>Mois</option>
                <option>Année</option>
            </select>
        </div>
        <div class="form-group">
            <label for="add-event-price">Participation des participant</label>
            <input type="text" class="form-control" name="price" id="add-event-price">
            <label class="form-text text-danger"></label>
        </div>
        <button type="button" class="btn btn-primary mt-3" onclick="sendNewEvent()">Créer !</button>
    </form>
</div>