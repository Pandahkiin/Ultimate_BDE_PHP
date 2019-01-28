<aside class="categories col-2">

    <form class="ml-2 mt-2">
        <div class="form-group">
            <h5 class="text-center">Rechercher un article</h5>
            <input type="search" class="form-control" id="exampleFormControlInput1" placeholder="Article">
        </div>
    </form>

    <form>
        <h5 class="text-center">Filtrer par prix</h5>
        <div class="form-row ml-2">
            
            <div class="col">
                <input type="text" class="form-control" placeholder="Min">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Max">
            </div>
        </div>
    </form>

    <h5 class="text-center mt-3">Filtrer par catégorie</h5>
    <div class="form-check mx-4">
        @foreach ($categories as $categorie)
        <div class="row">
            <input class="form-check-input" type="checkbox" value="" id="checkCategory{{ $categorie->id }}">
            <label class="form-check-label" for="checkCategory{{ $categorie->id }}">{{ $categorie->category }}</label>
        </div>
        @endforeach
    </div>
</aside>