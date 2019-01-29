@extends('layouts.template')

@section('content')
    <div class="home-main">
        <h1 class="home-main-title py-5">Bienvenue au BDE du CESI</h1>
        @if($topEvent)
            @include('events.topEvent')
        @endif


        <h2 class="home-secondary-titles my-5">Les incontournables de la boutique</h2>

        <div class="container-fluid">
            <div class="row mb-3">
                @foreach ($bestSellers as $bestSeller)
                    <div class="col-sm-12 col-lg-6 col-xl-4 mt-3">
                    @include('shop.bestSeller')
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-inline-block w-100 mb-4">
            <a type="button" class="btn btn-primary btn-lg btn-block py-2" href={{ route('Boutique') }}><h4     class="my-auto">Visiter la boutique</h4></a>
        </div>
    </div>
@endsection