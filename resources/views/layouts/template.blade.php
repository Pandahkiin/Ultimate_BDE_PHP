<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/DOMInteraction.js') }}" defer></script>
    <script src="{{ asset('js/interaction.js') }}" defer></script>
    <script src="{{ asset('js/ajax.js') }}" defer></script>
    <script src="{{ asset('js/cesi_management.js') }}" defer></script>

    <script src="{{ asset('vendor/DataTables/datatables.min.js') }}" defer></script>
    @stack('head')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav_foot.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/DataTables/datatables.min.css') }}" rel="stylesheet">

    <script>
        var connected_user = ({!! json_encode(Auth::user()) !!});
        var APItoken = {!! json_encode(Session::get('APItoken')) !!};
    </script>
</head>
<body>
    <div id="alert" class="alert alert-hidden" onclick="$(this).addClass('alert-hidden')">Alerte</div>
    <div class="modal fade" id="upload-picture" tabindex="-1" role="dialog" aria-labelledby="upload-picture-title" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="upload-picture-title">Chargement d'image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <form id="upload-picture-form" enctype="multipart/form-data" method="post" action="{{url('adminUploadPicture')}}">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <input type="hidden" name="id_user" value="{{ Auth::id()}}">
                        <input id="upload-picture-form-id_event" type="hidden" name="id_event" value="">
                        <label>Fichier</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="button" data-target="" id="upload-picture-ok" class="btn btn-primary" onclick="uploadPicture('upload-picture', $(this).data('target'))">Ok</button>
          </div>
        </div>
      </div>
    </div>
    <div id="app">
        
        @include('layouts.navigation')

        <main>
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>
