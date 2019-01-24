@extends('layouts.template')

@section('content')
    <div class="row">
    @foreach ($events as $event)
        @include('events.event')
    @endforeach
    </div>
@endsection