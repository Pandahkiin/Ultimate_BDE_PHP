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
        <p class="text-center overflow-auto">{{ $bestSeller->description }}</p>
        <form>
          <div class="form-group">
            <label for="qty">Quantité</label>
            <input type="email" class="form-control" id="qty" value="1">
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