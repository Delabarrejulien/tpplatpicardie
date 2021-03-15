<h1>Créer une recette...</h1>
<form action="" method="POST">
    <fieldset>
        <br>
        <br>
        <?= isset($error1)? $error1: '';?>
        <div class="container col-8">
            <br>
            <div class="form-group">
                <label id="text">Titre de la recette</label>
                <input type="text" value="<?= $name ?? '' ?>" class="form-control" title="en toutes lettres"
                    name='name' id="name" placeholder="Titre de la recette" pattern="[A-Za-z-éèêëàâäôöûüç' ]+" required>

            </div>

            <br>

            <div class="form-group">
                <select class="form-select" aria-label="Default select example">
                    <option id="text" selected required>Catégorie</option>
                    <option id="text" name='viande' id="viande" value="1">Viande</option>
                    <option id="text" name='poisson' id="poisson" value="2">Poisson</option>
                    <option id="text" name='dessert' id="dessert" value="3">Déssert</option>
                </select>
            </div>


            <br>
            <div class="form-group">
                <label id="text">Description courte du plat</label>
                <input type="textearea" class="form-control" name='description' id="description"
                    placeholder="une courte description " minlength="3" maxlenght="100"
                    pattern="[A-Za-z-éèêëàâäôöûüç' ]+" required>
            </div>

            <br>

            <div class="form-group">
                <label for="form_message" id="text">ingredients...</label>
                <textarea id="ingredient" name="ingredient" class="form-control"
                    placeholder="ex:
                    ingredient 15G
                    ingredient 1L"
                     maxlenght="300" rows="4"
                    pattern="[A-Za-z-éèêëàâäôöûüç0-9\-\.]+" required></textarea>
                <div class="help-block with-errors"></div>
            </div>

            <br>

            <br>
            <br>

            <div class="form-group">
                <label for="form_message" id="text">Etapes...</label>
                <textarea id="step" name="step" class="form-control"
                    placeholder="D'écrivez les etpes de la recettes et les temps de cuisons" maxlenght="300" rows="4"
                    pattern="[A-Za-z-éèêëàâäôöûüç0-9\-\.]+" required></textarea>
                <div class="help-block with-errors"></div>
            </div>

            <br>

            <input id=text type="submit" value="Valider" />
            <br>
            <br>

        </div>
    </fieldset>
</form>