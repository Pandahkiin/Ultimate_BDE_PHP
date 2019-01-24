<div class="card card-body">
    <form id="add-goodie">
        <div class="form-group">
            <label for="add-goodie-name">Nom du goodie</label>
            <input type="text" class="form-control" name="name" maxlength="50" id="add-goodie-name" required>
            <label class="form-text text-danger"></label>
        </div>
        <div class="form-group">
            <label for="add-goodie-image">Image d'illustration</label>
            <input type="text" class="form-control" name="image" id="add-goodie-image" placeholder="http://">
            <label class="form-text text-danger"></label>
        </div>
        <div class="form-group">
            <label for="add-goodie-description">Déscription (1500 caractères)</label>
            <textarea class="form-control" rows="3" maxlength="1500" name="description" id="add-goodie-description" required></textarea>
            <label class="form-text text-danger"></label>
        </div>
        <div class="form-group">
            <label for="add-goodie-id_category">Catégorie</label>
            <select class="form-control" id="add-goodie-id_category" name="id_category">
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}"> {{ $categorie->name }} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="add-goodie-price">Prix du goodie</label>
            <input type="text" class="form-control" name="price" id="add-goodie-price" aria-describedby="addon-euro" required>
            <label class="form-text text-danger"></label>
        </div>
        <div class="form-group">
            <label for="add-goodie-stock">Stock disponible</label>
            <input type="text" class="form-control" name="stock" id="add-goodie-stock" required>
            <label class="form-text text-danger"></label>
        </div>
        <button type="button" class="btn btn-primary mt-3" onclick="sendNewGoodie()">Créer le goodie !</button>
    </form>
</div>