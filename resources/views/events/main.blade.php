@extends('layouts.template')

@section('content')
    <div class="w-100 row">
        <div class="col-md-8 px-1 m-0"> 
            <h2 class="text-center bg-info">Évenements à venir</h2>
            <div class="col-md-12">
                @foreach($topEvents as $topEvent)
                    @include('events.topEvent')
                @endforeach
            </div><div class="col-md-6">
                @foreach ($events as $event)
                    @include('events.event')
                @endforeach
            </div>
        </div>
        <div class="col-md-4 px-1 m-0">
            <h2 class="text-center bg-success">Évenements passés</h2>
            @foreach ($pastEvents as $pastEvent)
                @include('events.pastEvent')
            @endforeach
    </div>
@endsection