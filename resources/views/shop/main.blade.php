@extends('layouts.template')

@section('content')

<p class="text-center">INSANE BOUTIQUE</p>

<div class="card-deck mx-3 my-5">

    @for($i=0; $i<3; $i++)
        @include('shop.bestSeller', ['bestOne'=>$bestSeller[$i]])
    @endfor
</div>

<div class="card-deck deckSize ml-3 my-3">

@foreach ($goodies as $goodie)
    @include('shop.product')
@endforeach

</div>

@endsection