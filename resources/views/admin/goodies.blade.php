<!-- Modal -->
<div class="modal fade" id="modal-goodie-delete" tabindex="-1" role="dialog" aria-labelledby="modal-goodie-delete-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-goodie-delete-title">Confirmer la suppression</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Etes vous vraiment sure de supprimer le goodie <b id="modal-goodie-delete-name" class="font-weight-bold"></b> ? Cette action est définitive.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" id="modal-goodie-delete-function" data-dismiss="modal">Confirmer</button>
        </div>
      </div>
    </div>
  </div>
  
  <div class="card">
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#adminAddGoodie" aria-expanded="false" aria-controls="adminAddGoodie">
        Ajouter un goodie
    </button>
    <div class="collapse" id="adminAddGoodie">
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
                            <option value="{{ $categorie->id }}"> {{ $categorie->category }} </option>
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
    </div>

    <div class="card card-body">
        <table id="AJAXgoodieTable" class="table display">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Déscription</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Commandes totales</th>
                    <th scope="col">Campus d'origine</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="col">Row 1 Data 1</td>
                    <td scope="col">Row 1 Data 2</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>