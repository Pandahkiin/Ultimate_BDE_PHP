<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    
    <a class="navbar-brand" href="{{ route('Acceuil') }}">
        <img src="{{ asset('img/navlogo.png') }}" width="50" height="50" class="d-inline-block align-top" alt="Logo BDE">
        <h5 id="logonav"><b>BDE</b> CESI</h5>
      </a>
    
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav navbarFont">
      <li class="nav-item">
        <a class="nav-link mx-2" href="{{ route('Evenements') }}"><i class="far fa-calendar mx-2"></i> Événements</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-2" href="{{ route('Boite à idées') }}"><i class="far fa-lightbulb mx-2"></i> Boite à idées</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mx-2" href="{{ route('Boutique') }}" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-shopping-cart mx-2"></i> Boutique
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('Boutique') }}">Produits</a>
          <a class="dropdown-item" href="{{ route('Boutique') }}">Catégories</a>
          <a class="dropdown-item" href="{{ route('Boutique') }}">Panier</a>
        </div>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        @if(Auth::check() && Auth::user()->role->name === 'Membre BDE')
          <a class="mr-4 navbarFont" href="{{ route('Admin') }}"><i class="fas fa-user-cog mx-2"></i> Administration</a>
        @endif
        <a class="navbarFont" href="{{ url('/logout') }}">Se déconnecter</a>
    </ul>

  </div>
</nav>