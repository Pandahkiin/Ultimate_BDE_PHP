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
                @auth
                <button type="button" class="btn btn-outline-primary" onclick="setUploadPictureModal(false,'{{$pastEvent->id}}')"  data-toggle="modal" data-target="#upload-picture">Poster une image</button>
                @endauth
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
                                                    @if(App\Models\Site\Comment::haveUserComment($picture->id))
                                                    <textarea class="form-control" id="picture-comment-{{$picture->id}}" rows="2" placeholder="Ajouter un commentaire"></textarea>
                                                    <button type="button" id="picture-comment-button-{{$picture->id}}" class="btn btn-primary float-right mt-1 mx-5" onclick="sendComment({{$picture->id}})">Envoyé</button>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                @foreach (App\Models\Site\Comment::getPictureComments($picture->id) as $comment)
                                                    <div class="card">
                                                      <div class="card-header">
                                                            {{ $comment->author->firstname.' '.$comment->author->lastname }}
                                                      </div>
                                                      <div class="card-body">
                                                        <blockquote class="blockquote mb-0">
                                                          <p>{{$comment->content}}</p>
                                                          <footer class="blockquote-footer">{{$comment->date}}</footer>
                                                        </blockquote>
                                                      </div>
                                                    </div>
                                                @endforeach
                                            </div>
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