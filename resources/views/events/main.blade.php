@extends('layouts.template')

@section('content')
    <div class="w-100 row">
        @foreach ($events as $event)
            @include('events.event')
        @endforeach
    </div>
@endsection