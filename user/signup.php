<?php session_start();
// this file is a sign up file

//import of method file
require('../config/method.php');
if (isset($_SESSION['user'])) {
    header("location: dashboard.php");
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription | SPORTSCORES</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/monstyle.css">
</head>

<body ccclass="bg-dark">
    <!-- form connexion -->
    <div class="container col-xl-10 col-xxl-10 px-5 py-5 my-3" style="background: #575858">
        <div class="row align-items-center g-lg-5 py-2">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-6 fw-bold lh-1 mb-3 text-center text-primary">Be Boom</h1>
                <img src="../assets/img/bg-header.png" class="d-block mx-lg-auto img-fluid rounded-3" alt="SPORTSCORES" width="500" height="200" loading="lazy">
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form action="" method="post" class="p-4 p-md-5 border rounded-3 bg-light">
                    <div class=" form-floating mb-3">
                        <input type="text" name="userName" class="form-control" required>
                        <label for="userName">Nom et Prenom</label>
                    </div>
                    <div class=" form-floating mb-3">
                        <input type="text" name="userCountry" class="form-control" required>
                        <label for="userCountry">Pays</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="mail" name="userMail" class="form-control" required>
                        <label for="userMail">Email</label>
                    </div>

                    <div class=" form-floating mb-3">
                        <input type="password" name="userPassword" class="form-control" required>
                        <label for="userPassword">Mot de passe</label>
                    </div>
                    <div class=" form-floating mb-3">
                        <input type="password" name="userPasswordConf" class="form-control" required>
                        <label for="userPasswordConf">Confirmer mot de passe</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="signup"> S'inscrire</button>
                    <small class="text-muted">En cliquant sur le bouton S'inscrire, vous acceptez nos conditions d'utilisation.</small>
                    <hr class="my-4">
                    <a href="login.php" class="w-100 btn btn-lg  btn-outline-primary"> Se connecter </a>

                </form>
            </div>
        </div>
    </div>
    <!-- end form -->
    <?php

    // actionif form is submit
    if (isset($_POST['signup'])) {

        $userName = $_POST['userName'];
        $userCountry = $_POST['userCountry'];
        $userMail = $_POST['userMail'];
        $userPassword = $_POST['userPassword'];
        $userPasswordConf = $_POST['userPasswordConf'];

        //we verify the password
        if ($userPassword === $userPasswordConf) {
            // we encrypt password
            $userPasswordHashed = password_hash($userPassword, PASSWORD_DEFAULT);
            //we save user data
            insertUser($userName, $userCountry, $userMail, $userPasswordHashed);
            echo '<script> alert("Inscription reussie !");</script>';
            // header('location:login.php');
        } else {
            echo '<script> alert("Erreur : Mots de passe non identiques");</script>';
        }
    }
    ?>
    <script src="../js/bootstrap.js"></script>
</body>

</html>