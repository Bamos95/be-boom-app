<?php session_start();
// this file is a sign up file

//import of method file
require('../config/method.php');
if (empty($_SESSION['user'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BeBoom - Be other Boom</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <?php include('../template/navbar.php') ?>

    <!-- Masthead -->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Creer des moments de folies et innX</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Start Bootstrap can help you build better websites using the Bootstrap framework! Just download a theme and start customizing, no strings attached!</p>
                    <a class="btn btn-primary btn-xl" href="new-beboom.php">New Beboom</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Beboom display -->

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                // Recuperation de tout les velos via la metho getAllVelo
                $userId = $_SESSION['user']['userId'];
                $bebooms = getBeboom($userId);
                //on parcour la liste pour afficher les velos
                foreach ($bebooms as $beboom) {
                ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <!-- media  -->
                            <!-- <img src="img/images/" alt="" class="bd-placeholder-img card-img-top" width="100%" height="400"> -->
                            <video src="../media/<?= $beboom['beboomPicture']; ?>" class="bd-placeholder-img card-img-top" width="100%" height="200"></video>
                            <div class="card-body">
                                <h3 class="card-title "><?= $beboom['beboomName']; ?></h3>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <!-- Caracterique -->
                                    <li>Titre : <?= $beboom['beboomTitle']; ?> </li>
                                    <li>Views : <?= $beboom['beboomViews']; ?> </li>
                                    
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="localhost/monsite/beboom/beboom.php?bbi=<?= $beboom['beboomId']; ?>" name="beboomName" readonly required>
                                        <label for="beboomName">link</label>
                                    </div>
                                    <a href="../beboom.php?bbi=<?= $beboom['beboomId']; ?>" target="_blank" rel="noopener noreferrer">lien beboom</a>

                                </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Bouton delete velo -->
                                    <div class="btn-group">
                                        <form action="delete.php" method="post">
                                            <!-- recuperation id velo && envoi de Id velo sur la page delete -->
                                            <input type="hidden" name="idVelo" value="<?= $beboom['beboomName']; ?>" required>
                                            <button type="submit" class="btn btn-sm btn-danger" name="delete">Supprimer</button>
                                        </form>
                                    </div>
                                    <small class="text-body-secondary"> <?php if ($beboom['beboomStatus'] == 1) {
                                                                            echo "Actif";
                                                                        } else {
                                                                            echo "Inactif";
                                                                        } ?> </small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Fin affichage velo pour admin -->

    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2023 - Company Name</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>