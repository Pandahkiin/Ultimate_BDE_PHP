@extends('layouts.template')

@section('content')
    @if ( Auth::user()->role->name === 'Membre BDE')
        <p>
            <a class="btn btn-dark" data-toggle="collapse" href="#add-event" role="button" aria-expanded="false" aria-controls="collapseExample">
                Ajouter un événement
            </a>
        </p>
        <div class="collapse" id="add-event">
            <div class="card card-body">
                
            </div>
        </div>

    @endif
    <p>Events page</p>
@endsection