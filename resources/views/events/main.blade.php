@extends('layouts.template')

@section('content')

@push('head')
<script src="{{ asset('js/interaction.js') }}" defer></script>
@endpush
    <div class="row">
    @foreach ($events as $event)
        @include('events.event')
    @endforeach
    </div>
@endsection