@extends('layouts.template')

@section('content')
@push('head')
<script src="{{ asset('js/shop.js') }}" defer></script>
@endpush

<div class="row h-100">
    @include('shop.filter')
    <div class="col-md-10 col-sm-12 h-100" id="shop-best-sellers">
        <h1 class="text-center mt-3">Meilleurs articles</h1>
        <div class="row mb-3">
            @foreach ($bestSellers as $bestSeller)
                <div class="col-sm-12 col-lg-6 col-xl-4 mt-3">
                @include('shop.bestSeller')
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-10 col-sm-12 h-100 d-none" id="shop-search-result">
        @foreach ($goodies->chunk(4) as $chunk)
            <div class="row">
                @foreach($chunk as $goodie)
                <div class="col-sm-12 col-md-6 col-lg-3 p-0">
                    @include('shop.product')
                </div>
                @endforeach 
            </div>
        @endforeach 
    </div>
</div>
@endsection