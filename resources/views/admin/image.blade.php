<div class="card">
    <div class="card card-body">
        <table class="table table-striped" id="pictures-list-dataTable">
            <thead>
                <tr>
                    <th>Nom événement</th>
                    <th>Auteur</th>
                    <th>lien</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pictures as $picture)
                <tr id="table-picture-row-{{$picture->id}}">
                    <td>{{ $picture->event->name }}</td>
                    <td>{{ $picture->postedBy->firstname.' '.$picture->postedBy->lastname }}</td>
                    <td>{{ $picture->link }}</td>
                    <td class="float-right">
                        <button type="button" class="btn btn-outline-danger m-1" onclick="deletePicture({{$picture->id}})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>