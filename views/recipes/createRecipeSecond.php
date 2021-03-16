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

            <div class="form-group ">

                <label for="tentacles" id="text">Ingrédient =</label>
                <input type="text" id="ingredient1" name="ingredient1" min="3" maxlength="20">

                <label for="tentacles" id="text">Quantité =</label>
                <input type="number" id="quantity1" name="quantity1" min="1" max="1000">

                <label for="tentacles" id="text">Poids =</label>
                <select class="form-select" aria-label="Default select example">
                    <option id="text" selected></option>
                    <option id="text" name='gramme' id="gramme" value="1">Gramme</option>
                    <option id="text" name='kilo' id="kilo" value="2">Kilo</option>
                    <option id="text" name='litre' id="litre" value="3">Litre</option>
                    <option id="text" name='centilitre' id="centilitre" value="3">Centilitre</option>
                </select>
            </div>

            <div class="form-group ">

                <label for="tentacles" id="text">Ingrédient =</label>
                <input type="text" id="ingredient2" name="ingredient2" min="3" maxlength="20">

                <label for="tentacles" id="text">Quantité =</label>
                <input type="number" id="quantity2" name="quantity2" min="1" max="1000">

                <label for="tentacles" id="text">Poids =</label>
                <select class="form-select" aria-label="Default select example">
                    <option id="text" selected></option>
                    <option id="text" name='gramme' id="gramme" value="1">Gramme</option>
                    <option id="text" name='kilo' id="kilo" value="2">Kilo</option>
                    <option id="text" name='litre' id="litre" value="3">Litre</option>
                    <option id="text" name='centilitre' id="centilitre" value="3">Centilitre</option>
                </select>
            </div>

            <div class="form-group ">

                <label for="tentacles" id="text">Ingrédient =</label>
                <input type="text" id="ingredient3" name="ingredient3" min="3" maxlength="20">

                <label for="tentacles" id="text">Quantité =</label>
                <input type="number" id="quantity3" name="quantity3" min="1" max="1000">

                <label for="tentacles" id="text">Poids =</label>
                <select class="form-select" aria-label="Default select example">
                    <option id="text" selected></option>
                    <option id="text" name='gramme' id="gramme" value="1">Gramme</option>
                    <option id="text" name='kilo' id="kilo" value="2">Kilo</option>
                    <option id="text" name='litre' id="litre" value="3">Litre</option>
                    <option id="text" name='centilitre' id="centilitre" value="3">Centilitre</option>
                </select>
            </div>

            <div class="form-group ">

                <label for="tentacles" id="text">Ingrédient =</label>
                <input type="text" id="ingredient4" name="ingredient4" min="3" maxlength="20">

                <label for="tentacles" id="text">Quantité =</label>
                <input type="number" id="quantity4" name="quantity4" min="1" max="1000">

                <label for="tentacles" id="text">Poids =</label>
                <select class="form-select" aria-label="Default select example">
                    <option id="text" selected></option>
                    <option id="text" name='gramme' id="gramme" value="1">Gramme</option>
                    <option id="text" name='kilo' id="kilo" value="2">Kilo</option>
                    <option id="text" name='litre' id="litre" value="3">Litre</option>
                    <option id="text" name='centilitre' id="centilitre" value="3">Centilitre</option>
                </select>
            </div>

            <div class="form-group ">

                <label for="tentacles" id="text">Ingrédient =</label>
                <input type="text" id="ingredient5" name="ingredient5" min="3" maxlength="20">

                <label for="tentacles" id="text">Quantité =</label>
                <input type="number" id="quantity5" name="quantity5" min="1" max="1000">

                <label for="tentacles" id="text">Poids =</label>
                <select class="form-select" aria-label="Default select example">
                    <option id="text" selected></option>
                    <option id="text" name='gramme' id="gramme" value="1">Gramme</option>
                    <option id="text" name='kilo' id="kilo" value="2">Kilo</option>
                    <option id="text" name='litre' id="litre" value="3">Litre</option>
                    <option id="text" name='centilitre' id="centilitre" value="3">Centilitre</option>
                </select>
            </div>

            <div class="form-group ">

                <label for="tentacles" id="text">Ingrédient =</label>
                <input type="text" id="ingredient6" name="ingredient6" min="3" maxlength="20">

                <label for="tentacles" id="text">Quantité =</label>
                <input type="number" id="quantity6" name="quantity6" min="1" max="1000">

                <label for="tentacles" id="text">Poids =</label>
                <select class="form-select" aria-label="Default select example">
                    <option id="text" selected></option>
                    <option id="text" name='gramme' id="gramme" value="1">Gramme</option>
                    <option id="text" name='kilo' id="kilo" value="2">Kilo</option>
                    <option id="text" name='litre' id="litre" value="3">Litre</option>
                    <option id="text" name='centilitre' id="centilitre" value="3">Centilitre</option>
                </select>
            </div>

            <div class="form-group ">

                <label for="tentacles" id="text">Ingrédient =</label>
                <input type="text" id="ingredient7" name="ingredient7" min="3" maxlength="20">

                <label for="tentacles" id="text">Quantité =</label>
                <input type="number" id="quantity7" name="quantity7" min="1" max="1000">

                <label for="tentacles" id="text">Poids =</label>
                <select class="form-select" aria-label="Default select example">
                    <option id="text" selected></option>
                    <option id="text" name='gramme' id="gramme" value="1">Gramme</option>
                    <option id="text" name='kilo' id="kilo" value="2">Kilo</option>
                    <option id="text" name='litre' id="litre" value="3">Litre</option>
                    <option id="text" name='centilitre' id="centilitre" value="3">Centilitre</option>
                </select>
            </div>

            <div class="form-group ">

                <label for="tentacles" id="text">Ingrédient =</label>
                <input type="text" id="ingredient8" name="ingredient8" min="3" maxlength="20">

                <label for="tentacles" id="text">Quantité =</label>
                <input type="number" id="quantity8" name="quantity8" min="1" max="1000">

                <label for="tentacles" id="text">Poids =</label>
                <select class="form-select" aria-label="Default select example">
                    <option id="text" selected></option>
                    <option id="text" name='gramme' id="gramme" value="1">Gramme</option>
                    <option id="text" name='kilo' id="kilo" value="2">Kilo</option>
                    <option id="text" name='litre' id="litre" value="3">Litre</option>
                    <option id="text" name='centilitre' id="centilitre" value="3">Centilitre</option>
                </select>
            </div>

            <div class="form-group ">

                <label for="tentacles" id="text">Ingrédient =</label>
                <input type="text" id="ingredient9" name="ingredient9" min="3" maxlength="20">

                <label for="tentacles" id="text">Quantité =</label>
                <input type="number" id="quantity9" name="quantity9" min="1" max="1000">

                <label for="tentacles" id="text">Poids =</label>
                <select class="form-select" aria-label="Default select example">
                    <option id="text" selected></option>
                    <option id="text" name='gramme' id="gramme" value="1">Gramme</option>
                    <option id="text" name='kilo' id="kilo" value="2">Kilo</option>
                    <option id="text" name='litre' id="litre" value="3">Litre</option>
                    <option id="text" name='centilitre' id="centilitre" value="3">Centilitre</option>
                </select>
            </div>

            <div class="form-group ">

                <label for="tentacles" id="text">Ingrédient =</label>
                <input type="text" id="ingredient10" name="ingredient10" min="3" maxlength="20">

                <label for="tentacles" id="text">Quantité =</label>
                <input type="number" id="quantity10" name="quantity10" min="1" max="1000">

                <label for="tentacles" id="text">Poids =</label>
                <select class="form-select" aria-label="Default select example">
                    <option id="text" selected></option>
                    <option id="text" name='gramme' id="gramme" value="1">Gramme</option>
                    <option id="text" name='kilo' id="kilo" value="2">Kilo</option>
                    <option id="text" name='litre' id="litre" value="3">Litre</option>
                    <option id="text" name='centilitre' id="centilitre" value="3">Centilitre</option>
                </select>
            </div>


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