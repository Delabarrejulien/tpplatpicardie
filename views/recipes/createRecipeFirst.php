<h1>Créer une recette...</h1>
<form action="" method="POST">
    <fieldset>
        <br>
        <br>
        <?= isset($error1)? $error1: '';?>
        <div class="container col-8">
            <br>
            <div class="form-group">
                <label class="text">Titre de la recette</label>
                <input type="text" value="<?= $name ?? '' ?>" class="form-control" title="en toutes lettres" name='name'
                    id="name" placeholder="Titre de la recette" pattern="[A-Za-z-éèêëàâäôöûüç' ]+" required>

            </div>

            <br>

            <div class="form-group">
                <label class="text">choissisez parmis les 3 catégories</label>
                <br>
                <select class="form-select text" aria-label="Default select example" name="categorie" id="categorie">
                    <option  selected required>Catégorie</option>
                    <option   value="Viande">Viande</option>
                    <option   value="Poisson">Poisson</option>
                    <option   value="Déssert">Déssert</option>
                </select>
            </div>

            <div class="form-group">
                <label id="text">Description courte du plat</label>
                <input type="textearea" class="form-control" name='description' id="description"
                    placeholder="une courte description " minlength="3" maxlenght="100"
                    pattern="[A-Za-z-éèêëàâäôöûüç0-9\-\.\,\']+" required>
            </div>

            <div class="form-group">
                <label for="form_message" class="text">les ingrédients</label>
                <textarea id="ingredient" name="ingredient" class="form-control"
                    placeholder="inscrivez un ingredient suivie de la quantité puis passer a la ligne avant d'en reinscrire un nouveau. " maxlenght="300" rows="4"
                    pattern="[A-Za-z-éèêëàâäôöûüç0-9\-\.\,\']+" required></textarea>
                <div class="help-block with-errors"></div>
            </div>




            <div class="form-group">
                <label for="form_message" class="text">Etapes...</label>
                <textarea id="step" name="step" class="form-control"
                    placeholder="D'écrivez les etpes de la recettes et les temps de cuisons" maxlenght="300" rows="4"
                    pattern="[A-Za-z-éèêëàâäôöûüç0-9\-\.\,\']+" required></textarea>
                <div class="help-block with-errors"></div>
            </div>

            <input id=text type="submit" value="Valider" />
            <br>
            <br>

        </div>
    </fieldset>
</form>