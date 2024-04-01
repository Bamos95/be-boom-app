<?php session_start();
// this file is a sign up file

//import of method file
require('../config/method.php');
if (empty($_SESSION['user'])) {
    header("location: login.php");
}

if (isset($_POST['new'])) {
    $beboomId = $_POST['beboomId'];
    $beboomName = $_POST['beboomName'];
    $beboomTitle = $_POST['beboomTitle'];
    $beboomPicture = updateVideo();
    $userId = $_SESSION['user']['userId'];

    insertBeboom(beboomId:$beboomId, beboomName:$beboomName, beboomTitle:$beboomTitle, beboomPicture:$beboomPicture, userId:$userId);

    header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>New - Be other Boom</title>
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
                    <a class="btn btn-primary btn-xl" href="user/dashboard.php">New Beboom</a>
                </div>
            </div>
        </div>
    </header>
    <!-- new beboom form -->
    <div class="container-fluid col-xl-10 col-xxl-10 px-5 py-5 mt-5 my-3 " style="background: #575858;">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-7 align-self-end text-center text-lg-start">
                <h1 class="display-6 fw-bold lh-1 mb-3 text-center font-weight-bold " style="color: #E10004;" >Créez la surprise à vos proche</h1>
                <img src="../assets/img/bg-header.png" class="d-block mx-lg-auto img-fluid rounded-3" alt="Be Boom" width="500" height="200" loading="lazy">
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form action="" method="post" class="p-4 p-md-5 border rounded-3 bg-light" enctype="multipart/form-data">
                    <!-- id for beboom -->
                    <input type="text" class="form-control" value="<?= generateRandomID(20) ?>" name="beboomId"  hidden required>
                        
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="beboomName" required>
                        <label for="beboomName">Beboom Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="beboomTitle" required>
                        <label for="beboomTitle">Beboom Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" accept="video/*" name="beboomPicture" required>
                        <label for="beboomPicture">Beboom Picture</label>
                    </div>

                    <button class="w-100 btn btn-sm btn-primary" type="submit" name="new"> Creer</button>

                </form>
            </div>
        </div>
    </div>









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