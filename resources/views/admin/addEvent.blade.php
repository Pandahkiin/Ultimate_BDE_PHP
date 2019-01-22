<div class="card card-body">
    <form id="add-event">
        <div class="form-group">
            <label for="add-event-name">Nom de l'événement</label>
            <input type="text" class="form-control" name="name" maxlength="50" id="add-event-name" required>
            <label class="form-text text-danger"></label>
        </div>
        <div class="form-group">
            <label for="add-event-date">Date de l'événement</label>
            <input type="date" class="form-control" name="date" id="add-event-date" required>
            <label class="form-text text-danger"></label>
        </div>
        <div class="form-group">
            <label for="add-event-image">Image d'illustration</label>
            <input type="text" class="form-control" name="image" id="add-event-image" placeholder="http://" required>
            <label class="form-text text-danger"></label>
        </div>
        <div class="form-group">
            <label for="add-event-description">Déscription (1500 caractères)</label>
            <textarea class="form-control" rows="3" maxlength="1500" name="description" id="add-event-description" required></textarea>
            <label class="form-text text-danger"></label>
        </div>
        <div class="form-group">
            <label for="add-event-recurrence">Récurrence</label>
            <select class="form-control" id="add-event-recurrence" name="reccurency">
                 @foreach ($repetitions as $repetition)
                    <option value="{{ $repetition->id }}"> {{ $repetition->repetition }} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="add-event-price">Participation des participant</label>
            <input type="text" class="form-control" name="price" id="add-event-price" aria-describedby="addon-euro" placeholder="0.0 €">
            <label class="form-text text-danger"></label>
        </div>
        <button type="button" class="btn btn-primary mt-3" onclick="sendNewEvent()">Créer !</button>
    </form>
</div>