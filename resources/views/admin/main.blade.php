@extends('layouts.template')

@section('content')

@push('head')
<script src="{{ asset('js/ajax.js') }}" defer></script>
@endpush

<div id="adminAccordion">
    <div class="card">
        <div class="card-header" id="headingAdminEvent">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAdminEvent" aria-expanded="true" aria-controls="collapseAdminEvent">
                    Ajouter des événements
                </button>
            </h5>
        </div>
        <div id="collapseAdminEvent" class="collapse" aria-labelledby="headingAdminEvent" data-parent="#adminAccordion">
            <div class="card-body">
                @include('admin.addEvent')
            </div>
        </div>
    </div>

    <div class="card">
            <div class="card-header" id="headingPastEvent">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsePastEvent" aria-expanded="true" aria-controls="collapseAdminEvent">
                        Administrer événements passés
                    </button>
                </h5>
            </div>
            <div id="collapsePastEvent" class="collapse" aria-labelledby="headingPastEvent" data-parent="#adminAccordion">
                <div class="card-body">
                    @include('admin.pastEvents')
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
</div>
@endsection