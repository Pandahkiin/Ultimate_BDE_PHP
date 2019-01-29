<!--
<div class="card border-primary px-3 pt-3">
  <div class="row">
    <div class="col-md-6">
      <div class="card-block">
        <h2 class="card-title">{{ $bestSeller->name }}</h2>
        <p class="card-text description">{{ $bestSeller->description }}</p>
        <p class="card-text">Prix : {{ $bestSeller->price }} €</p>
        <p class="card-text">Stock : {{ $bestSeller->stock }}</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalbestSeller{{ $bestSeller->id }}">BUY IT</button>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card-img-bottom">
          <img class="bestSellImg" src="{{ $bestSeller->image }}" alt="{{ $bestSeller->name }}">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalbestSeller{{ $bestSeller->id }}" tabindex="-1" role="dialog" aria-labelledby="modalbestSeller{{ $bestSeller->id }}Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalbestSeller{{ $bestSeller->id }}Title">{{ $bestSeller->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="{{ $bestSeller->image }}" alt="Image de {{ $bestSeller->name }}" width="150px" height="auto;" class="text-left">
        <p class="d-block float-right overflow-auto">{{ $bestSeller->description }}</p>
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
<div class="jumbotron h-100 d-flex flex-column p-4">
  <h1 class="display-4">{{ $bestSeller->name }}</h1>
  <div class="shop-img">
    <img class="w-100" src="{{ $bestSeller->image }}" alt="{{ $bestSeller->name }}">
  </div>
  <hr class="my-4 ml-0 mr-0">
  <p class="lead">{{ $bestSeller->description }}</p>
  <div class="row mt-2">
    <div class="col"><p>Prix : {{ $bestSeller->price }} €</p></div>
    <div class="col text-right"><p>Stock : {{ $bestSeller->stock }}</p></div>
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
  @endauth
</div>