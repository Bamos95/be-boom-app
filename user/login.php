<?php session_start();
//  this is a login file

//import of method file
require('../config/method.php');
if (isset($_SESSION['user'])) {
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | BeBoom</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/monstyle.css">
</head>

<body class="bg-dark">

    <!-- login form -->
    <div class="container-fluid col-xl-10 col-xxl-10 px-5 py-5 mt-5 my-3 " style="background: #575858;">
        <div class="row align-items-center g-lg-5 py-2">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-6 fw-bold lh-1 mb-3 text-center text-primary">Connectez-vous !</h1>
                <img src="../assets/img/bg-header.png" class="d-block mx-lg-auto img-fluid rounded-3" alt="Be Boom" width="500" height="200" loading="lazy">
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form action="" method="post" class="p-4 p-md-5 border rounded-3 bg-light">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="userMail" required>
                        <label for="floatingInput">Email </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="userPassword" required>
                        <label for="floatingPassword">Mot de passe</label>
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Se souvenir de moi
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="connect"> Se connecter</button>
                    <hr class="my-4">
                    <a href="signup.php" class="w-100 btn btn-lg btn-outline-primary "> S'inscrire </a>


                </form>
            </div>
        </div>
    </div>
    <!-- end form -->

    <?php

    $pdo = dbConnect();

    if (isset($_POST['connect'])) {
        $userMail = $_POST['userMail'];
        $userPassword = $_POST['userPassword'];

        //select data from database
        $sql = "SELECT * FROM `user` WHERE userMail = '$userMail' ";
        $select = $pdo->query($sql);
        $user = $select->fetch();

        if (!empty($user)) {
            // we verify the password
            if (password_verify($userPassword, $user['userPassword'])) {
                //we put user information in Session variable 
                $_SESSION["user"] = [
                    "userId" => $user["userId"],
                    "userName" => $user["userName"],
                    "userMail" => $user["userMail"],
                    "userCountry" => $user["userCountry"],
                    "userGroup" => $user["userGroup"],
                    "userStatus" => $user["userStatus"],
                ];
                header("location: dashboard.php");
            } else {
                echo '<script> alert("Erreur : Mot de passe incorrect");</script>';
            }
        } else {

            echo '<script> alert("Erreur identifiant");</script>';
        }
    }

    ?>
    </div>


    <script src="../js/bootstrap.js"></script>
</body>

</html>