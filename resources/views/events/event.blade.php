<div class="card m-2 col-sm-12 col-md-2" style="width: 18rem;">
    <img class="card-img-top" src="{{$event->image}}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{$event->name}}</h5>
        <p class="card-text" style="height: 100px;text-overflow: ellipsis;overflow: hidden;">{{ $event->description }}</p>
        
        @if($registeredEvents->contains('id_Events', $event->id))
        <button type="button" class="btn btn-outline-primary btn-lg btn-block" onclick="unregisterEvent({{$event->id}}, this)">Se désinscrire</button>
        @else
        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="registerEvent({{$event->id}}, this)">S'inscrire</button>
        @endif
    </div>
</div>