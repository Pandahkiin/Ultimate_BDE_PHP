<div class="card">
    <div class="card card-body">
        <table class="table table-striped" id="suggestion-list-dataTable">
            <thead>
                <tr>
                    <th></th>
                    <th>Date</th>
                    <th>Nombre inscrit</th>
                    <th>Liste des inscrit</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suggestions as $suggestion)
                <tr>
                    <th>{{ $suggestion->name }}</th>
                    <td>{{ $suggestion->date }}</td>
                    <td>
                        {{App\Models\Site\Register::totalUsersRegistered($suggestion->id)}}
                    </td>
                    <td>
                        <button onclick="getRegisterList(12, 'CSV')" class="btn btn-outline-dark m-1" title="Télécharger au format CSV" download>CSV</button>
                        <button class="btn btn-outline-dark m-1" title="Télécharger au format PDF">PDF</button>
                    </td>
                    <td>
                        <button onclick="deletesuggestionModal('{{$suggestion->name}}',{{$suggestion->id}}, $(this).closest('td').parent()[0].sectionRowIndex)" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-suggestion-delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>