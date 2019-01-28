<div class="card col-md-6">
    <div class="row">
        <div class="w-100 bg-light">
            <h2 class="card-title text-center w-100">{{ $event->name }}</h2>
            @if(Auth::check() && Auth::user()->role->name === 'Personnel CESI')
            <button type="button" class="btn btn-outline-danger m-1 report-button" onclick="reportEvent({{$event->id}})" title="Signaler l'événemebnt">
                <i class="fas fa-exclamation-triangle"></i>
            </button>
            @endif
        </div>
        <div class="col-md-6">
            <div class="card-block">
                <div id="eventText">
                    <p class="eventDescription text-justify card-text">{{ $event->description }}</p>
                </div>
                <br>
                <p class="card-text">Prix d'entrée : {{ $event->price_participation }} €</p>
                <p class="card-text">Date : {{ $event->date }}</p>
                @auth
                    @if(App\Models\Site\Register::isUserRegister($event->id))
                        <button type="button" class="btn btn-outline-primary btn-lg btn-block"onclick="unregisterEvent({{$event->id}}, this)">Se désinscrire</button>
                    @else
                        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="registerEvent({{$event->id}}, this)">S'inscrire</button>
                    @endif
                @endauth
            </div>
        </div>
        <img class="mx-auto my-auto" src="{{ $event->image }}" alt="{{ $event->name }}" width="250" height="250">
    </div>
</div>