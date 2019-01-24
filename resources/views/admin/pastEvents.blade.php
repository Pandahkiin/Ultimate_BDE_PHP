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
                    @if($registeredEvents->where('id_Events','=',$event->id)->first())
                        {{$registeredEvents->where('id_Events','=',$event->id)->first()->total}}
                    @else
                        {{0}}
                    @endif
                </td>
                <td>
                    <button onclick="getRegisterList(12, 'CSV')" class="btn btn-outline-dark m-1" title="Télécharger au format CSV" download>CSV</button>
                    <button class="btn btn-outline-dark m-1" title="Télécharger au format PDF">PDF</button>
                </td>
                <td><a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>