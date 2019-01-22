<div class="card border-dark">
<img src="{{ $goodie->image }}" class="card-img-top" alt="{{ $goodie->name }}">
    <div class="card-body">
    <h2 class="card-title">{{ $goodie->name }}</h2>
      <p class="card-text description">{{ $goodie->description }}</p>
      <p class="card-text">Prix : {{ $goodie->price }} €</p>
      <p class="card-text">Stock : {{ $goodie->stock }}</p>
      <a href="#" class="btn btn-primary">ACHETER ACHETER</a>
    </div>
  </div>