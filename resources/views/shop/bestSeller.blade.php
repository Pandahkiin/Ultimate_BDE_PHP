    <div class="card border-primary px-3 pt-3">
      <div class="row">
        <div class="col-md-6">
          <div class="card-block">
            <h2 class="card-title">{{ $bestSeller->name }}</h2>
            <p class="card-text description">{{ $bestSeller->description }}</p>
            <p class="card-text">Prix : {{ $bestSeller->price }} €</p>
            <p class="card-text">Stock : {{ $bestSeller->stock }}</p>
            <a href="#" class="btn btn-primary">BUY IT</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card-img-bottom">
              <img class="bestSellImg" src="{{ $bestSeller->image }}" alt="{{ $bestSeller->name }}">
          </div>
        </div>
      </div>
    </div>