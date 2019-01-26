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
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#adminAddEvent" aria-expanded="false" aria-controls="adminAddEvent">
        Ajouter un événement
    </button>
    <div class="collapse" id="adminAddEvent">
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
    </div>

    <div class="card card-body">
        <table class="table table-striped" id="event-list-dataTable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Prix (participant)</th>
                    <th>Nombre participants</th>
                    <th>Auteur</th>
                    <th>Campus</th>
                    <th>Répétition</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr id="table-event-row-{{$event->id}}">
                    <th>{{ $event->name }}</th>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->image }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->price_participation }} €</td>
                    <td>
                        {{App\Models\Site\Register::totalUsersRegistered($event->id)}}
                    </td>
                    <td>{{ $event->author->firstname.' '.$event->author->lastname }}</td>
                    <td>{{ $event->campus->location }}</td>
                    <td>{{ $event->repetition->repetition }}</td>
                    <td>
                        <button onclick="getRegisterList(12, 'CSV')" class="btn btn-outline-dark m-1" title="Télécharger au format CSV" download>CSV</button>
                        <button class="btn btn-outline-dark m-1" title="Télécharger au format PDF">PDF</button>
                    </td>
                    <td>
                        <button type="button" onclick="deleteEventModal('{{$event->name}}',{{$event->id}})" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-event-delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>