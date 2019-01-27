<div class="card col-md-12 border-0">
    <div class="row">
        <div class="w-100 bg-light">
            <h2 class="card-title text-center w-100">{{ $pastEvent->name }}</h2>
        </div>
        <div class="col-md-6">
            <div class="card-block">
                <div id="eventText">
                    <p class="pastEventDescription text-justify card-text">{{ $pastEvent->description }}</p>
                </div>
                <br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPastEvent{{    $pastEvent->id }}">En savoir plus</button>
                <p class="card-text">Date : {{ $pastEvent->date }}</p>
            </div>
        </div>
        <img class="mx-auto my-auto" src="{{ $pastEvent->image }}" alt="{{ $pastEvent->name }}" width="100" height="100">
    </div>
</div>

<div class="modal fade" id="modalPastEvent{{ $pastEvent->id }}" tabindex="-1" role="dialog" aria-labelledby="modalPastEvent{{ $pastEvent->id }}Title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPastEvent{{ $pastEvent->id }}Title">{{ $pastEvent->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="float-right overflow-auto d-block">{{ $pastEvent->description }}</p>
                <div id="carouselPastEvent" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ $pastEvent->image }}" class="d-block w-100" alt="Logo BDE">
                        </div>
                        @foreach ($pictures as $picture)
                            <div class="carousel-item">
                                <img src="{{ $picture->link }}" class="d-block w-100" alt="Event {{$pastEvent->name }} photo">
                            </div> 
                            <button type="button" class="btn btn-primary">Like</button>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselPastEvent" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselPastEvent" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="pictureAdd">
                        <label class="custom-file-label" for="pictureAdd"aria-describedby="pictureAddUpload">Ajouter une photo</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="pictureAddUpload">Publier</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>