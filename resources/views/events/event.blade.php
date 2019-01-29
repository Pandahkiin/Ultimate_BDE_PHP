<div class="card m-2">
    <div class="row">
        <div class="col-md-6">
            <div class="card-body">
                <h4 class="card-title">{{ $event->name }}</h4>
                <p class="card-text">{{ $event->description }}</p>
                <p class="card-text">Prix d'entrée : {{ $event->price_participation }} €</p>
                <p class="card-text">Date : {{ $event->date }}</p>
              
                @auth
                    @if(App\Models\Site\Register::isUserRegister($event->id))
                        <button type="button" class="btn btn-outline-primary btn-lg"onclick="unregisterEvent({{$event->id}}, this)">Se désinscrire</button>
                    @else
                        <button type="button" class="btn btn-primary btn-lg" onclick="registerEvent({{$event->id}}, this)">S'inscrire</button>
                    @endif
                @endauth
            </div>
        </div>
        <div class="col-md-6 text-right">
            <img class="mx-auto my-auto" src="{{ $event->image }}" alt="{{ $event->name }}" style="height:100%">
        </div>
    </div>
</div>