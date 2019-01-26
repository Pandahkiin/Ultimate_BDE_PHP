<!-- Delete -->
<div class="modal fade" id="deleteSuggestion" tabindex="-1" role="dialog" aria-labelledby="deleteSuggestion-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteSuggestion-title">Confirmer la suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Etes vous vraiment sure de supprimer l'événement <b id="deleteSuggestion-name" class="font-weight-bold"></b> ? Cette action est définitive.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-danger" id="deleteSuggestion-function" data-dismiss="modal">Confirmer</button>
      </div>
    </div>
  </div>
</div>

@include('admin.editSuggestion')

<div class="card">
    <div class="card card-body">
        <table class="table table-striped" id="suggestion-list-dataTable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Auteur</th>
                    <th>Campus</th>
                    <th>Répétition</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suggestions as $suggestion)
                <tr id="table-suggestion-row-{{$suggestion->id}}">
                    <td>{{ $suggestion->name }}</td>
                    <td>{{ $suggestion->description }}</td>
                    <td>{{ $suggestion->author->firstname.' '.$suggestion->author->lastname }}</td>
                    <td>{{ $suggestion->campus->location }}</td>
                    <td>{{ $suggestion->repetition->repetition }}</td>
                    <td class="float-right">
                        <button type="button" onclick="editModalSuggestion({{$suggestion->id}})" class="btn btn-outline-info m-1" data-toggle="modal" data-target="#editSuggestion">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button type="button" onclick="deleteModal('deleteSuggestion','{{$suggestion->name}}',{{$suggestion->id}})" class="btn btn-outline-danger m-1" data-toggle="modal" data-target="#deleteSuggestion">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>