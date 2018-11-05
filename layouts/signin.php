<?php 
$title='Inscription';
$description='';

?>
<?php include_once("header.php"); ?>

<main>

    <div class="container-fluid bg-light py-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body">
                    <h3 class="text-center mb-4">Inscription</h3>
                    <fieldset>
                        <form method="POST" action="signin_action.php" class="form validity">
                            <div class="form-group has-success">
                                <input class="form-control input-lg" placeholder="Identifiant" name="username" value="" type="text" id="username" data-missing="Ce champs est obligatoire" required>
                            </div>
                            <div class="form-group has-success">
                                <input class="form-control input-lg" placeholder="Nom" name="lastname" value="" type="text" id="lastname" data-missing="Ce champs est obligatoire" required>
                            </div>
                            <div class="form-group has-success">
                                <input class="form-control form-control-success form-control-danger input-lg" placeholder="Adresse E-mail" name="email" type="email" id="inputEmail" required>
                            </div>

                            <div class="form-group has-error">
                                <input class="form-control form-control-success form-control-danger input-lg" data-minlength="6" placeholder="Mot de passe" name="password" id="inputPass" value="" type="password">
                            </div>
                            <div class="form-group has-error">
                                <input class="form-control form-control-success form-control-danger input-lg" placeholder="Confirmer le mot de passe" name="passwordverif" value="" type="password" id="inputPassverif">
                            </div>
                            <input class="btn btn-lg btn-primary btn-block" value="Enregistrer" id="submit" type="submit" name="submit">
                        </form> <br>
                        <p>
                            <a href="./signup.php" tabindex="4">J'ai déjà un compte</a>
                        </p>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include_once("footer.php"); ?>
