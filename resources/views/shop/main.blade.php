@extends('layouts.template')

@section('content')
<div class="card-deck deckSize ml-3">
@foreach ($goodies as $goodie)
    @include('shop.product')
@endforeach
</div>
@endsection