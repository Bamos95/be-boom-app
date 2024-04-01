<?php if (session_status() === PHP_SESSION_NONE) {
  session_start();
  // header file
}
// logout button action
if (isset($_POST['logout'])) {
  session_unset();
  header('location: ../index.php');
  exit;
} ?>


<!-- <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
   Navbar content 
</nav> -->


<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
  <div class="container px-4 px-lg-5">
    <a class="navbar-brand" href="#page-top">BeBoom</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto my-2 my-lg-0">
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" type="submit" name="deconnecter">Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="user/dashboard.php">Contact</a></li>   
                       
        <li class="nav-item"><form action="#" method="post"><button class="btn btn-primary btn-sm" name="logout" type="submit"> <?= ucfirst(strtolower($_SESSION['user']['userName'])) ?> | logout</button></form></li>

      </ul>
    </div>
  </div>
</nav>






















<!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
  <div class="container px-4 px-lg-5">
    <a class="navbar-brand" href="#page-top">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto my-2 my-lg-0">
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        <form class="container-fluid justify-content-start">
          <button class="btn btn-outline-success me-2" type="button">Main button</button>
          <button class="btn btn-sm btn-outline-secondary" type="button">Smaller button</button>
        </form>

      </ul>
    </div>
  </div>
</nav> -->