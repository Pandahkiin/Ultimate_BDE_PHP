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
        <button type="button" class="btn btn-danger" id="modal-event-delete-function">Confirmer</button>
      </div>
    </div>
  </div>
</div>

<div class="card">
    <table class="table table-striped">
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
                    <button onclick="deleteEventModal('{{$event->name}}',{{$event->id}})" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-event-delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>