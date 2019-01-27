<div class="card mt-2">
    <div class="card-body row d-flex flex-column mx-1">
        <h5 class="card-title">{{ $pastEvent->name }}</h5>
        @if(Auth::user()->role->name === 'Personnel CESI')
        <button type="button" class="btn btn-outline-danger m-1 report-button" onclick="reportEvent({{$pastEvent->id}})" title="Signaler l'événement">
            <i class="fas fa-exclamation-triangle"></i>
        </button>
        @endif
        <h6 class="card-subtitle mb-2 text-muted">{{ $event->date }}</h6>
        <p class="card-text">{{ $pastEvent->description }}</p>

        <div class="mt-auto">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPastEvent{{ $pastEvent->id }}">En savoir plus</button>
            @if(Auth::check() && App\Models\Site\Register::isUserRegister(Auth::id()))
                <button type="button" class="btn btn-outline-primary" onclick="setUploadPictureModal(false,'{{$pastEvent->id}}')"  data-toggle="modal" data-target="#upload-picture">Poster une image</button>
            @endif
            @if(Auth::user()->role->name === 'Personnel CESI')
            <button type="button" onclick="getEventPictures({{$pastEvent->id}})" class="btn btn-outline-dark">Télécharger les images</button>
            @endif
        </div>
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
                    <div class="row w-100 mx-auto">
                        <div id="carouselEventPicture" class="carousel slide w-100" data-interval="false" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ $pastEvent->image }}">
                                </div>
                                @foreach (App\Models\Site\Picture::getEventPictures($pastEvent->id) as $picture)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{$picture->link}}">
                                        @auth
                                        <div class="my-2">
                                            <div class="row">
                                                <div class="col">
                                                    @if(App\Models\Site\Like::haveUserLike($picture->id))
                                                    <button type="button" class="btn btn-outline-danger btn-lg btn-block" onclick="unlikePicture({{$picture->id}},this)"><i class="fas fa-heart-broken"></i></button>
                                                    @else
                                                    <button type="button" class="btn btn-outline-success btn-lg btn-block" onclick="likePicture({{$picture->id}},this)"><i class="far fa-heart"></i></button>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row my-2">
                                                <div class="col">
                                                    @if(App\Models\Site\Comment::haveUserComment($picture->id))
                                                    <textarea class="form-control" id="picture-comment-{{$picture->id}}" rows="2" placeholder="Ajouter un commentaire"></textarea>
                                                    <button type="button" id="picture-comment-button-{{$picture->id}}" class="btn btn-primary float-right mt-1" onclick="sendComment({{$picture->id}})">Envoyé</button>
                                                    @endif
                                                </div>
                                            </div>
                                            @foreach (App\Models\Site\Comment::getPictureComments($picture->id) as $comment)
                                            @if($comment->date != '1970-01-01')
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <div class="card">
                                                      <div class="card-header">
                                                            {{ $comment->author->firstname.' '.$comment->author->lastname }}
                                                            @if(Auth::user()->role->name === 'Personnel CESI')
                                                            <button type="button" class="btn btn-outline-danger m-1 report-button" onclick="reportComment({{$comment->id_Users}},{{$comment->id_Pictures}})" title="Signaler l'événement">
                                                                <i class="fas fa-exclamation-triangle"></i>
                                                            </button>
                                                            @endif
                                                      </div>
                                                      <div class="card-body">
                                                        <blockquote class="blockquote mb-0">
                                                          <p>{{$comment->content}}</p>
                                                          <footer class="blockquote-footer">{{$comment->date}}</footer>
                                                        </blockquote>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        @endauth
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselEventPicture" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselEventPicture" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>