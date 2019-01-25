@extends('layouts.template')

@section('content')
<div>
    <h1 class="text-center mt-3">Bienvenue au BDE du CESI</h1>
        <div>
            @auth
                {{ Auth::user()->role->name }}
            @else
                レロレロレロレロ
            @endauth
        </div>
    </div>
@endsection