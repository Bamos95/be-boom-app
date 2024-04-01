<?php 
require('config/database.php');

function getOneBeboom($beboomId)
{
    $pdo = dbConnect();
    $sql = "SELECT * FROM beboom where beboomId = '$beboomId' ";
    $request = $pdo->query($sql);
    $beboom = $request->fetch();
    return $beboom;
}

if(isset($_GET['bbi'])){
    $bbi = $_GET['bbi'];
    $beboom = getOneBeboom($bbi);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeBoom</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body class=" bg-dark">
    <div id="container" class="container">
    <div class="alert element">Intrusion system 
    <h1 ><?= $beboom['beboomTitle'] ?></h1>
</div>
    
       <div class="screen">
       <div class="progress-bar element"></div>
       </div>      
    
    <div class="alert element">Vol de données en cours</div>
    </div>
    <video class="video" id="myVideo" style="display:none;" controls>
        <source src="media/<?= $beboom['beboomPicture'] ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <audio id="myAudio" src="asset/sound.mp3"></audio>
    <script src="script.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
