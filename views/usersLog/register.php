<div class="row">
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
                        <input type="password" id="password" required placeholder="Password" name="password">
                        <input type="password" id="confirm_password" required placeholder="Password verif" name="confirm_password">
                        <input type="submit" value="Inscription">
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>

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