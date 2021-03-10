

<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center" id >Inscrivez-vous</h2>

                <div class="error big">
                    <?=$errorsArray['login_error'] ?? ''; ?>
                </div>
                <form action="" method="POST" class="login-form">
                    <div class="form-group">

                        <label for="exampleInputEmail1" class="text-uppercase" id="text">mail</label>
                        <input type="email" class="form-control" required placeholder="mail" name="mail">


                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase" id="text">Mot de passe</label>
                        <input type="password" class="form-control" id="password" required placeholder="Mot de passe"
                            name="password">

                    </div>


                    <div class="form-check">
                        <label class="form-check-label">
                        
                            <p class="text-danger" id="text">votre profil pourra être complété par la suite. </p>
                        </label>
                        <button type="submit" value="Connexion" class="btn btn-login float-right" id=textbox>Valider</button>
                    </div>

                </form>
                <div class="copy-text"> I <i class="fa fa-heart"></i> Picardie</div>
            </div>
            <div class="col-md-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="../../assets/img/oeufs.jpg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    <h2>Cuisine</h2>

                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="../../assets/img/pelican.jpg" alt="second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    <h2>Découverte...</h2>

                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="../../assets/img/tracteur.jpg" alt="third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    <h2>Terroir... </h2>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>







<!-- <div class="row">
    <div class="col">
        
        <div class="login-reg-panel mt-3">

            <div class="register-info-box">
                <h2>Déjà inscrit?</h2>
                <p>Connectez-vous!</p>
                <label id="label-login" for="log-login-show">
                    <a href="/controllers/loginCtrl.php">Connexion</a>
                </label>
                <input type="radio" name="active-log-panel" id="log-login-show">
            </div>
                                
            <div class="white-panel">
                <div class="login-show">
                    <h2>Inscrivez-vous</h2>
                    <form action="" method="post">
                        <input type="text" required placeholder="Pseudo" name="pseudo" pattern="[A-Za-z-éèêëàâäôöûüç0-9\-\.]+">
                        <input type="email" required placeholder="Email" name="mail">
                        <input type="password" id="password" required placeholder="Mot de passe" name="password">
                        <input type="password" id="confirm_password" required placeholder="confirmer mot de passe" name="confirm_password">
                        <input type="submit" value="Inscription">
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div> -->



<script>
    var password = document.getElementById("password");
    var confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Les mots de passe ne correspondent pas!");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

</script>