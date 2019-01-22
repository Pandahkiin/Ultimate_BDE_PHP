<div class="card" style="width: 18rem;">
<img src="{{ $goodie->image }}" class="card-img-top" alt="{{ $goodie->name }}">
    <div class="card-body">
    <h2 class="card-title">{{ $goodie->name }}</h2>
      <p class="card-text">{{ $goodie->description }}</p>
      <p class="card-text">Prix :<b>{{ $goodie->price }}</b></p>
      <p class="card-text">Stock :{{ $goodie->stock }}</p>
      <a href="#" class="btn btn-primary">ACHETER ACHETER</a>
    </div>
  </div>