@extends('layouts.template')

@section('content')

<div class="row" id="shopRow">
    <aside class="categories col-2">

            <form class="mx-4 mt-2">
                <div class="form-group">
                    <h5 class="text-center">Rechercher un article</h5>
                    <input type="search" class="form-control" id="exampleFormControlInput1" placeholder="Article">
                </div>
            </form>

            <form>
                <h5 class="text-center">Filtrer par prix</h5>
                <div class="form-row ml-2">
                    
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Min">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Max">
                    </div>
                </div>
            </form>

            <h5 class="text-center mt-3">Filtrer par catégorie</h5>
            <div class="form-check my-3 mx-3">
                
                <input class="form-check-input" type="checkbox" value="" id="checkMaison">
                <label class="form-check-label" for="checkMaison">
                    Maison
                </label><br>
                <input class="form-check-input" type="checkbox" value="" id="checkAccessoires">
                <label class="form-check-label" for="checkAccessoires">
                    Accessoires
                </label><br>
                <input class="form-check-input" type="checkbox" value="" id="checkVetements">
                <label class="form-check-label" for="checkVetements">
                    Vêtements
                </label><br>
                <input class="form-check-input" type="checkbox" value="" id="checkDivers">
                <label class="form-check-label" for="checkDivers">
                    Divers
                </label>
            </div>
    </aside>

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