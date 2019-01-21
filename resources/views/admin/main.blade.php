@extends('layouts.template')

@section('content')
<div id="adminAccordion">
    <div class="card">
        <div class="card-header" id="headingAdminEvent">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAdminEvent" aria-expanded="true" aria-controls="collapseAdminEvent">
                    Administration des événements
                </button>
            </h5>
        </div>
        <div id="collapseAdminEvent" class="collapse" aria-labelledby="headingAdminEvent" data-parent="#adminAccordion">
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
</div>
@endsection