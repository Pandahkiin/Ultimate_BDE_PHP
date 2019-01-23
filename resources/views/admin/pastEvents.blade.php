<div class="card">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Date</th>
                <th scope="col">Nombre inscrit</th>
                <th scope="col">Liste des inscrit</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td scope="row">{{ $event->name }}</td>
                <td>{{ $event->date }}</td>
                <td>TODO</td>
                <td>TODO</td>
                <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>