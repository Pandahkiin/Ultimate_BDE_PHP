@extends('layouts.template')

@section('content')
    <div class="w-100 row">
        <div class="col-sm-12 col-md-8 px-1 m-0"> 
            <h2 class="text-center my-2">Évenements à venir</h2>
            <div class="row">
                @if($topEvent)
                    <!-- Event of the month -->
                    <div class="pl-5">
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
        <div class="col-sm-12 col-md-4 px-1 pl-4">
            <h2 class="text-center my-2">Évenements passés</h2>
            @foreach ($pastEvents as $pastEvent)
                @include('events.pastEvent')
            @endforeach
        </div>
    </div>
@endsection