<h4>{{$eventName}} : liste des inscrits</h4>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($registerList as $row)
    <tr>
        <th scope="row">{{$row->user->id}}</th>
        <td>{{$row->user->firstname}}</td>
        <td>{{$row->user->lastname}}</td>
    </tr>
    @endforeach
  </tbody>
</table>