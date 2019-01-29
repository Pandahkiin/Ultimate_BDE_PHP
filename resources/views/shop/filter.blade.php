<aside class="categories col-md-2 col-sm-12">
    <div class="mx-3">
        <form class="mt-2">
            <div class="form-group">
                <h5 class="text-center">Rechercher un article</h5>
                <input type="search" class="form-control" id="exampleFormControlInput1" placeholder="Article">
            </div>
        </form>

        <hr class="my-3">

        <h5>Filtrer par prix</h5>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Min" value="0" id="category-filter-priceMin">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Max" value="100" id="category-filter-priceMax">
            </div>
        </div>

        <h5 class="mt-2">Filtrer par catégorie</h5>
        <div class="mx-4">
            @foreach ($categories as $categorie)
            <div class="w-100">
                <input class="form-check-input" type="checkbox" name="category-filter" value="{{ $categorie->category }}" id="checkCategory{{ $categorie->id }}">
                <label class="form-check-label" for="checkCategory{{ $categorie->id }}">{{ $categorie->category }}</label>
            </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-primary btn-lg btn-block my-4" onclick="shopFilter()">Filtrer</button>
    </div>
</aside>