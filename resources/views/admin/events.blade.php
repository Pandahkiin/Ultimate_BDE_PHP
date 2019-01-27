@include('admin.editEvent')

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

                <div class="form-group row">
                    <div class="col-6">
                        <label for="add-event-image">Image d'illustration</label>
                        <input type="text" class="form-control" name="image" id="add-event-image" required>
                        <label class="form-text text-danger"></label>
                    </div>
                    <div class="col-6">
                        <label for="add-event-image-upload">Charger une image sur le serveur</label>
                        <button id="add-event-image-upload" onclick="setUploadPictureModal('add-event-image','')" type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#upload-picture">
                            Charger une image
                        </button>
                    </div>
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
                    <th>Liste inscrits</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr id="table-event-row-{{$event->id}}">
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->image }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->price_participation }}</td>
                    <td>
                        {{App\Models\Site\Register::totalUsersRegistered($event->id)}}
                    </td>
                    <td>{{ $event->author->firstname.' '.$event->author->lastname }}</td>
                    <td>{{ $event->campus->location }}</td>
                    <td>{{ $event->repetition->repetition }}</td>
                    <td>
                        @if($event->id_Approbations == 3)
                        <p class="text-danger">Cette élément à été signalé</p>
                        @else
                        <button onclick="getRegisterList({{$event->id}}, 'CSV')" class="btn btn-outline-dark m-1" title="Télécharger au format CSV" download>CSV</button>
                        <button onclick="getRegisterList({{$event->id}}, 'PDF')" class="btn btn-outline-dark m-1" title="Télécharger au format PDF">PDF</button>
                        @endif
                    </td>
                    <td class="float-right">
                        <button type="button" onclick="editModalEvent({{$event->id}})" class="btn btn-outline-info m-1" data-toggle="modal" data-target="#editEvent">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button type="button" onclick="deleteModal('deleteEvent','{{$event->name}}',{{$event->id}})" class="btn btn-outline-danger m-1" data-toggle="modal" data-target="#delete-modal">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>