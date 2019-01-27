@extends('layouts.template')

@section('content')
    <div class="w-100 row">
        <div class="col-md-8 px-1 m-0"> 
            <h2 class="text-center bg-info">Évenements à venir</h2>
            <div class="row">
                @if($topEvent)
                    <!-- Event of the month -->
                    <div>
                        @include('events.topEvent')
                    </div>
                @endif
            </div>
            <!-- Events planned -->
            @foreach ($events->chunk(2) as $chunk)
                <div class="row card-deck">
                    @foreach($chunk as $event)
                        @include('events.event')
                    @endforeach 
                </div>
            @endforeach 
        </div>
        <div class="col-md-4 px-1 m-0">
            <h2 class="text-center bg-success">Évenements passés</h2>
            @foreach ($pastEvents as $pastEvent)
                @include('events.pastEvent')
            @endforeach
        </div>
    </div>
@endsection