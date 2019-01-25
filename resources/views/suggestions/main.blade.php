@extends('layouts.template')

@section('content')

<div class="container mx-auto p-4">
    <div class="row">
        <div class="col-6">
            <h3>Derniere suggestions</h3>
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
</div>

@endsection