<div class="card col-md-12 border-0">
        <div class="row">
            <div class="w-100 bg-light"><h2 class="card-title text-center w-100">{{ $pastEvent->name }}</h2></div>
            <div class="col-md-6">
            <div class="card-block">
                <div id="eventText">
                    <p class="pastEventDescription text-justify card-text">{{ $pastEvent->description }}</p>
                </div><br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPastEvent{{ $pastEvent->id }}">En savoir plus</button>
                <p class="card-text">Date : {{ $pastEvent->date }}</p>
            </div>
        </div>
        <img class="mx-auto my-auto" src="{{ $pastEvent->image }}" alt="{{ $pastEvent->name }}" width="100" height="100">
    </div>
</div>

<div class="modal fade" id="modalPastEvent{{ $pastEvent->id }}" tabindex="-1" role="dialog" aria-labelledby="modalPastEvent{{ $pastEvent->id }}Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalPastEvent{{ $pastEvent->id }}Title">{{ $pastEvent->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="{{ $pastEvent->image }}" alt="Image de {{ $pastEvent->name }}" width="150px" height="auto;" class="text-left">
          <p class="float-right overflow-auto d-block">{{ $pastEvent->description }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Like</button>
        </div>
      </div>
    </div>
  </div>