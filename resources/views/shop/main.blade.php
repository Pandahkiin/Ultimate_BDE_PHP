@extends('layouts.template')

@section('content')

<div class="row" id="shopRow">
    @include('shop.filter')
    <div class="col-md-10 col-sm-12 h-100" id="shop-best-sellers">
        <h1 class="text-center mt-3">Meilleurs articles</h1>
        <div class="row mb-3">
            @foreach ($bestSellers as $bestSeller)
                <div class="col">
                @include('shop.bestSeller')
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-10 col-sm-12 h-100 d-none" id="shop-search-result">
        @foreach ($goodies->chunk(4) as $chunk)
            <div class="row card-deck">
                @foreach($chunk as $goodie)
                    @include('shop.product')
                @endforeach 
            </div>
        @endforeach 
    </div>
</div>
@endsection