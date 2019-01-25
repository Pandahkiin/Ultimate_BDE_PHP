@extends('layouts.template')

@section('content')

@push('head')
<script src="{{ asset('js/admin.js') }}" defer></script>
@endpush

<div id="adminAccordion">

    <div class="card">
        <div class="card-header" id="headingGoodies">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseGoodies" aria-expanded="true" aria-controls="collapseGoodies">
                    Administrer goodies
                </button>
            </h5>
        </div>
        <div id="collapseGoodies" class="collapse" aria-labelledby="headingGoodies" data-parent="#adminAccordion">
            <div class="card-body">
                @include('admin.goodies')
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingPastEvent">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsePastEvent" aria-expanded="true" aria-controls="collapsePastEvent">
                    Administrer événements
                </button>
            </h5>
        </div>
        <div id="collapsePastEvent" class="collapse" aria-labelledby="headingPastEvent" data-parent="#adminAccordion">
            <div class="card-body">
                @include('admin.events')
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header" id="headingAdminSuggestions">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAdminSuggestions" aria-expanded="true" aria-controls="collapseAdminSuggestions">
                    Administration de la boite à idée
                </button>
            </h5>
        </div>
        <div id="collapseAdminSuggestions" class="collapse" aria-labelledby="headingAdminSuggestions" data-parent="#adminAccordion">
            <div class="card-body">
                @include('admin.suggestions')
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingAdminImage">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAdminImage" aria-expanded="true" aria-controls="collapseAdminImage">
                    Ajouter une image
                </button>
            </h5>
        </div>
        <div id="collapseAdminImage" class="collapse" aria-labelledby="headingAdminImage" data-parent="#adminAccordion">
            <div class="card-body">
                @include('admin.image')
            </div>
        </div>
    </div>
</div>
@endsection