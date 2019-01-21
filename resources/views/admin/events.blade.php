<p>
    <a class="btn btn-dark" data-toggle="collapse" href="#add-event" role="button" aria-expanded="false" aria-controls="collapseExample">
        <i class="fas fa-plus mr-3"></i>Ajouter un événement !
    </a>
</p>
<div class="collapse" id="add-event">
    <div class="card card-body">
        <form>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nom événement">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Déscription (1500 caractères)</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="1500"></textarea>
            </div>
            <div class="form-group">
                <label for="add-event-form-recurrence">Récurrence</label>
                <select class="form-control" id="add-event-form-recurrence">
                    <option>Auncune</option>
                    <option>Semaine</option>
                    <option>Mois</option>
                    <option>Année</option>
                </select>
            </div>
            <input type="text" class="form-control" placeholder="Participation €">
            <button type="button" class="btn btn-primary mt-3">Créer !</button>
        </form>
    </div>
</div>