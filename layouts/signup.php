<?php 
$title='Connexion';
$description='';

?>
<?php include_once("header.php"); ?>

<main>
    <div class="limiter">
        <div class="container pt-5 mt-5">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-body">
                        <h3 class="text-center mb-4">Connexion</h3>
                        <fieldset>
                            <form method="post" action="signup_action.php" class="form validity" id="login-form"> <br>
                                <div class="form-group has-success" data-validate="Entrer votre identifiant">
                                    <input class="form-control input-lg" type="text" name="pseudo" placeholder="Identifiant/Mail">
                                </div>

                                <div class="form-group has-success" data-validate="Entrer votre mot de passe ">
                                    <input class="form-control form-control-success form-control-danger input-lg" type="password" name="password" placeholder="Mot de Passe">
                                </div>

                                <p>
                                    <a href="signin.php" tabindex="4" title="Pas encore de compte ?">Pas encore de compte ?</a>
                                </p>
                                <p>
                                    <a href="Login.html" tabindex="4" title="mdpoublie ?">Mot de passe oublié ? ?</a>
                                </p>


                                <input class="btn btn-lg btn-primary btn-block" id="submit" name="submit" type="submit" value="Connexion">

                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once("footer.php"); ?>
