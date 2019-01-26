@extends('layouts.template')

@section('content')

<div class="container mx-auto p-4">
    <div class="row">
        <div class="col-6">
            <h3>Dernières suggestions</h3>
        </div>
        <div class="col-6">
            @auth
                <button class="btn btn-primary float-right" type="button" data-toggle="collapse" data-target="#add-suggestion-form" aria-expanded="false" aria-controls="add-suggestion-form">
                    Proposer une idée
                </button>
            @endauth
        </div>
    </div>
    <div class="row">
        @auth
            <div class="card card-body collapse my-3" id="add-suggestion-form">
                <form id="add-suggestion">
                    <div class="form-group">
                        <label for="add-suggestion-name">Nom de l'événement</label>
                        <input type="text" class="form-control" name="name" maxlength="50" id="add-suggestion-name" required>
                        <label class="form-text text-danger"></label>
                    </div>
                    <div class="form-group">
                        <label for="add-suggestion-id_repetition">Récurrence</label>
                        <select class="form-control" id="add-suggestion-id_repetition" name="id_repetition">
                            @foreach ($repetitions as $repetition)
                                <option value="{{ $repetition->id }}"> {{ $repetition->repetition }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add-suggestion-description">Description (1500 caractères)</label>
                        <textarea class="form-control" rows="3" maxlength="1500" name="description" id="add-suggestion-description" required></textarea>
                        <label class="form-text text-danger"></label>
                    </div>
                    <button type="button" class="btn btn-primary mt-3" onclick="sendNewSuggestion()">Proposer !</button>
                </form>
            </div>
        @endauth
    </div>
    @foreach ($bestVotes as $event)
    <div class="row">
        <div class="card m-2 w-100">
            <div class="card-header">
                <div class="row">
                    <h4 class="col m-0">{{$event->name}}</h4>
                    <cite class="col text-right">Par {{$event->user->firstname}} {{$event->user->lastname}}</cite>
                </div>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{$event->description}}</p>
                </blockquote>
                <div class="float-right">
                    <label class="text-secondary">{{$event->votedBy->count()}} vote(s)</label>
                    @if(App\Models\User::haveVoteFor($event->id))
                        <button type="button" class="btn btn-outline-danger" onclick="unlikeSuggestion({{$event->id}}, this)"><i class="fas fa-heart-broken"></i></i></i></button>
                    @else
                        <button type="button" class="btn btn-outline-success" onclick="likeSuggestion({{$event->id}}, this)"><i class="far fa-heart"></i></i></button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection