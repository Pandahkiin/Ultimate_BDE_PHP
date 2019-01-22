@extends('layouts.template')

@section('content')

@foreach ($goodies as $goodie)
    @include('shop.product') 
@endforeach

@endsection