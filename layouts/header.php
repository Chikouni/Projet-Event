<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("head.php"); session_start(); ?>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#"><img src="images/logonav.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <?php 
                if (!isset($_SESSION['connect'])|| (empty($_SESSION['connect']))){ ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/projet-wis/index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/projet-wis/layouts/signup.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/projet-wis/layouts/signin.php">Inscription</a>
                    </li>
                </ul>
                <?php  } else {
                    ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="event.php">Événements</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="account.php">Mon compte</a>
                            <a class="dropdown-item" href="message.php">Messagerie</a>
                            <a class="dropdown-item" href="/projet-wis/layouts/logout.php">Déconnexion</a>
                        </div>
                    </li>
                </ul>
                <?php } ?>

            </div>
        </nav>
        <!-- particles.js container -->
        <div id="particles-js"></div>



    </header>
