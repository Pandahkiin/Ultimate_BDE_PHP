<div class="col card border-dark">
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
        <p class="text-center overflow-auto">{{ $goodie->description }}</p>
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