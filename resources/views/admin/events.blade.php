<!-- Modal -->
<div class="modal fade" id="modal-event-delete" tabindex="-1" role="dialog" aria-labelledby="modal-event-delete-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-event-delete-title">Confirmer la suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Etes vous vraiment sure de supprimer l'événement <b id="modal-event-delete-name" class="font-weight-bold"></b> ? Cette action est définitive.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="modal-event-delete-function" data-dismiss="modal">Confirmer</button>
      </div>
    </div>
  </div>
</div>

<div class="card">
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#adminAddGoodie" aria-expanded="false" aria-controls="adminAddGoodie">
        Ajouter un événement
    </button>
    <div class="card card-body" id="adminAddEvent">
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
                <label for="add-event-id_repetition">Récurrence</label>
                <select class="form-control" id="add-event-id_repetition" name="id_repetition">
                     @foreach ($repetitions as $repetition)
                        <option value="{{ $repetition->id }}"> {{ $repetition->repetition }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="add-event-price">Participation des participant</label>
                <input type="text" class="form-control" name="price" id="add-event-price" aria-describedby="addon-euro" value="0.0">
                <label class="form-text text-danger"></label>
            </div>
            <button type="button" class="btn btn-primary mt-3" onclick="sendNewEvent()">Créer l'événement !</button>
        </form>
    </div>

    <table class="table table-striped" id="past-event-list">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Date</th>
                <th scope="col">Nombre inscrit</th>
                <th scope="col">Liste des inscrit</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <th scope="row">{{ $event->name }}</th>
                <td>{{ $event->date }}</td>
                <td>
                    {{App\Models\Site\Register::totalUsersRegistered($event->id)}}
                </td>
                <td>
                    <button onclick="getRegisterList(12, 'CSV')" class="btn btn-outline-dark m-1" title="Télécharger au format CSV" download>CSV</button>
                    <button class="btn btn-outline-dark m-1" title="Télécharger au format PDF">PDF</button>
                </td>
                <td>
                    <button onclick="deleteEventModal('{{$event->name}}',{{$event->id}}, $(this).closest('td').parent()[0].sectionRowIndex)" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-event-delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>