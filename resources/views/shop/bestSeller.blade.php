      <section class="card border-primary">
          <div class="card">
            <div class="row">
              <div class="col-md-6">
                <div class="card-block">
                  <h2 class="card-title">{{ $bestOne->name }}</h2>
                  <p class="card-text description">{{ $bestOne->description }}</p>
                  <p class="card-text">Prix : {{ $bestOne->price }} €</p>
                  <p class="card-text">Stock : {{ $bestOne->stock }}</p>
                  <a href="#" class="btn btn-primary">BUY IT</a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card-img-bottom">
                    <img class="bestSellImg" src="{{ $bestOne->image }}" alt="{{ $bestOne->name }}">
                </div>
              </div>
            </div>
          </div>
      </section>