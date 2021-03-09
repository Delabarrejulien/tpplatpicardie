

<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center">Connectez-vous</h2>

                <div class="error big">
                    <?=$errorsArray['login_error'] ?? ''; ?>
                </div>
                <form action="" method="POST" class="login-form">
                    <div class="form-group">

                        <label for="exampleInputEmail1" class="text-uppercase">mail</label>
                        <input type="email" class="form-control" required placeholder="mail" name="mail">


                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase">Mot de passe</label>
                        <input type="password" class="form-control" id="password" required placeholder="Mot de passe"
                            name="password">

                    </div>


                    <div class="form-check">
                        <label class="form-check-label">
                        
                            <a href="../../controllers/registerCtrl.php">Pas encore inscrit?</a>
                        </label>
                        <button type="submit" value="Connexion" class="btn btn-login float-right">Connect</button>
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