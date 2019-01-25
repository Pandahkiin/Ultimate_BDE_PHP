@extends('layouts.template')

@section('content')
    <div class="w-100 row">
        <div class="row col-sm-6 col-md-8"> 
            <h2 class="w-100 text-center pt-2 bg-info">Évenements à venir</h2>
            @foreach ($events as $event)
                @include('events.event')
            @endforeach
        </div>
        <div class="col-sm-6 col-md-4">
            <h2 class="w-100 text-center pt-2 bg-success">Évenements passés</h2>
            @foreach ($pastEvents as $pastEvent)
                @include('events.pastEvent')
            @endforeach
    </div>
@endsection