@extends('layouts.template')

@section('content')
@push('head')
<script src="{{ asset('js/shop.js') }}" defer></script>
@endpush

@if($user_cart->count() > 0)
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Quantité</th>
            <th scope="col">Prix</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user_cart->first()->contain as $contain)
        <tr>
          <th scope="row">{{$contain->goodie->name}}</th>
          <td>{{$contain->quantity}}</td>
          <td>{{$contain->quantity*$contain->goodie->price}} €</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="1"></td>
            <th class="text-right">Total :</th>
            <th>{{App\Models\Site\Order::totalOrderCost($user_cart->first()->id)}} €</th>
        </tr>
    </tfoot>
</table>
<button type="button" class="btn btn-primary float-right" onclick="sendOrder({{$user_cart->first()->id}})">Envoyer la commande</button>
@else
<h3 class="my-5 mr-2 w-100 text-center">Panier vide, n'hésitez pas à visiter la boutique !</h3>
@endif
@endsection