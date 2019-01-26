@extends('layouts.template')

@section('content')

@push('head')
<script src="{{ asset('js/admin.js') }}" defer></script>
<script src="{{ asset('js/admin_edit.js') }}" defer></script>
@endpush

<!-- Delete -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-modal-title">Confirmer la suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Etes vous vraiment sure de supprimer le goodie <b id="delete-modal-name" class="font-weight-bold"></b> ? Cette action est définitive.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="delete-modal-function" data-dismiss="modal">Confirmer</button>
            </div>
        </div>
    </div>
</div>

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