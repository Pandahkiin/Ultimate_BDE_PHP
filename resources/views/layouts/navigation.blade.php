<nav class="navbar navbar-dark bg-dark">
    
    <a class="navbar-brand" href="{{ route('Acceuil') }}">
        <img src="{{ asset('img/navlogo.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
        ULTIMATE BDE ++ 360
      </a>
    
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('Evenements') }}">Événements</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('Boite à idées') }}">Boite à idées</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{ route('Boutique') }}" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Boutique
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('Boutique') }}">Produits</a>
          <a class="dropdown-item" href="{{ route('Boutique') }}">Catégories</a>
          <a class="dropdown-item" href="{{ route('Boutique') }}">Panier</a>
        </div>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <a href="{{ url('/logout') }}">Se déconnecter</a>
    </ul>

  </div>
</nav>