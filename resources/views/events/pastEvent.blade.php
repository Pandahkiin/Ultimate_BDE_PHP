<div class="card col-md-12 border-danger rounded-0">
        <div class="row">
            <div class="w-100 bg-light"><h2 class="card-title text-center w-100">{{ $pastEvent->name }}</h2></div>
            <div class="col-md-6">
            <div class="card-block">
                
                <div id="eventText">
                    <p class="eventDescription text-justify card-text">{{ $pastEvent->description }}</p>
                </div><br>
                <p class="card-text">Prix d'entrée : {{ $pastEvent->price_participation }} €</p>
                <p class="card-text">Date : {{ $pastEvent->date }}</p>
            </div>
        </div>
        <img class="mx-auto my-auto" src="{{ $pastEvent->image }}" alt="{{ $pastEvent->name }}" width="250" height="250">
    </div>
</div>