@extends('layouts.template')

@section('content')
    <div class="home-main">
        <h1 class="home-main-title">Bienvenue au BDE du CESI</h1>
        <div>
            @if($topEvent)
                <h2 class="home-secondary-titles py-4">Ne ratez pas l'événement du mois !</h2>
                <div class="card col-11 mx-auto rounded-0">
                    <div class="row">
                        <div class="w-100 bg-dark text-white">
                            <h2 class="card-title text-center w-100 my-auto">{{ $topEvent->name }}</h2>
                        </div>
                        <div class="col-sm-8 col-md-6">
                            <div class="card-block">
                                <div class="my-3">
                                    <p class="text-justify card-text">{{ $topEvent->description }}</p>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8 col-md-6">
                                        <p class="card-text"><h5>Prix d'entrée : {{ $topEvent->price_participation }} €</h5></p>
                                        <p class="card-text"><h5>Date : {{ $topEvent->date }}</h5></p>
                                    </div>
                                    <div class="col-6 my-auto">
                                        <a type="button" class="btn btn-primary" href={{ route('Evenements') }}><h4     class="my-auto">Voir les événements</h4></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img class="mx-auto my-auto" src="{{ $topEvent->image }}" alt="{{ $topEvent->name }}">
                    </div>
                </div>
            @endif
        </div>


        <h2 class="home-secondary-titles my-5">Les incontournables de la boutique</h2>
        <div class="col-12 card-deck mx-auto mb-4">
            @foreach($bestSellers as $bestSeller)
                <div class="card rounded-0 px-3 pt-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-block">
                                <h2 class="card-title text-center bg-dark text-white">{{ $bestSeller->name }}</h2>
                                <p class="card-text description text-justify">{{ $bestSeller->description }}</p>
                                <p class="card-text"><h3 class="text-center">{{ $bestSeller->price }} €</h3></p>
                                <p class="card-text"><h5 class="text-center">{{ $bestSeller->stock }} restantes</h5></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-img-bottom">
                                <img class="bestSellImg" src="{{ $bestSeller->image }}" alt="{{ $bestSeller->name }}">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-inline-block w-100 mb-4">
            <a type="button" class="btn btn-primary btn-lg btn-block py-2" href={{ route('Boutique') }}><h4     class="my-auto">Visiter la boutique</h4></a>
        </div>
    </div>
@endsection