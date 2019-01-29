<!--
<div class="card border-dark">
<img src="{{ $goodie->image }}" class="card-img-top" alt="Image de {{ $goodie->name }}">
  <div class="card-body">
  <h2 class="card-title">{{ $goodie->name }}</h2>
    <p class="card-text description">{{ $goodie->description }}</p>
    <p class="card-text">Prix : {{ $goodie->price }} €</p>
    <p class="card-text">Stock : {{ $goodie->stock }}</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGoodie{{ $goodie->id }}">ACHETER ACHETER</button>
  </div>
</div>

<div class="modal fade" id="modalGoodie{{ $goodie->id }}" tabindex="-1" role="dialog" aria-labelledby="modalGoodie{{ $goodie->id }}Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalGoodie{{ $goodie->id }}Title">{{ $goodie->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="{{ $goodie->image }}" alt="Image de {{ $goodie->name }}" width="150px" height="auto;" class="text-left">
        <p class="float-right overflow-auto d-block">{{ $goodie->description }}</p>
        <form>
          <div class="form-group">
            <label for="qty">Quantité</label>
            <input type="number" class="form-control" id="qty" value="1" name="quantity">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
        <button type="button" class="btn btn-primary">Ajouter au panier</button>
      </div>
    </div>
  </div>
</div>
-->

<div id="shop-goodie-{{ $goodie->id }}" class="card m-3" style="height:750px">
  <input class="shop-goodie" type="hidden" data-goodie='["{{ $goodie->id }}","{{ $goodie->name }}","{{ $goodie->price }}","{{ $goodie->category->category }}"]'>
  <div class="shop-img">
      <img class="w-100" src="{{ $goodie->image }}" alt="{{ $goodie->name }}">
  </div>
  <div class="card-body d-flex flex-column">
      <h2 class="card-title">{{ $goodie->name }}</h2>
      <p class="card-text description">{{ $goodie->description }}</p>
      <hr class="my-4 ml-0 mr-0">

      <div class="row mt-2">
          <div class="col"><p>Prix : {{ $goodie->price }} €</p></div>
          <div class="col text-right"><p>Stock : {{ $goodie->stock }}</p></div>
        </div>
      @auth
        <div class="row">
          <div class="col-4">
            <button type="button" class="btn btn-primary w-100" onclick="addToCart({{ $bestSeller->id }}, $(this).next().val())"><i class="fas fa-cart-plus"></i></button>
          </div>
          <div class="col-8">
            <input type="number" class="form-control input-number" value="1" min="1" max="{{ $bestSeller->stock }}">
          </div>
        </div>
      @endAuth
  </div>
</div>