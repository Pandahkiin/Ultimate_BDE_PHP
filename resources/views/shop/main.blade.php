@extends('layouts.template')

@section('content')

<div class="row" id="shopRow">

    @include('shop.filter')

    <div class="mainShop col-10">
        <h1 class="text-center mt-3">INSANE BOUTIQUE</h1>

        <div class="card-deck mx-3 my-3">

            @foreach($bestSellers as $bestSeller)
                @include('shop.bestSeller')
            @endforeach

        </div>

        <div class="container">
            <div class="row deckSize my-3">

                @foreach ($goodies as $goodie)
                    @include('shop.product')
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection