@extends('layouts.template')

@section('content')

<div class="row">
    <aside class="categories col-2">

        

    </aside>

    <div class="mainShop col-10">
        <h1 class="text-center mt-3">INSANE BOUTIQUE</h1>

        <div class="card-deck mx-3 my-3">

            @foreach($bestSellers as $bestSeller)
                @include('shop.bestSeller')
            @endforeach

        </div>

        <div class="card-deck deckSize ml-3 my-3">

        @foreach ($goodies as $goodie)
            @include('shop.product')
        @endforeach

        </div>
    </div>
</div>
@endsection