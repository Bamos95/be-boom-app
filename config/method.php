<?php
require("../config/database.php");


function insertUser($userName, $userCountry, $userMail, $userPassword)
{   
    $pdo = dbConnect();
    $request = $pdo->prepare("INSERT INTO user (`userName`, `userCountry`, `userMail`, `userPassword`) VALUES (?, ?, ?, ?)");
    $request->bindValue(1, $userName);
    $request->bindValue(2, $userCountry);
    $request->bindValue(3, $userMail);
    $request->bindValue(4, $userPassword);   

    $request->execute();
     '<script> alert("Inscription reussie");</script>';
}

function getBeboom($userId){
    $pdo = dbConnect();
    $sql = "SELECT * FROM beboom where userID = '$userId' ";
    $request = $pdo->query($sql);
    $bebooms = $request->fetchAll();
    return $bebooms;
}

function getOneBeboom($beboomId)
{
    $pdo = dbConnect();
    $sql = "SELECT FROM beboom where beboomId = '$beboomId' ";
    $request = $pdo->query($sql);
    $beboom = $request->fetch();
    return $beboom;
}

// Generer le ID du beboom
function generateRandomID($length = 8) {
    return substr(bin2hex(random_bytes(($length + 1) / 2)), 0, $length);
}


function updateVideo()
{
    // Vérification de la video et enregistrement du nom du fichier
    if (isset($_FILES['beboomPicture']) && $_FILES['beboomPicture']['error'] === UPLOAD_ERR_OK) {
        // Chemin du répertoire de destination
        $repertoireDestination = "../media/";

        // Récupération des informations de la video
        $nomFichier = $_FILES['beboomPicture']['name'];
        $cheminTemporaire = $_FILES['beboomPicture']['tmp_name'];
        $tailleFichier = $_FILES['beboomPicture']['size'];

        // ... (Vérifications de la taille et du type de l'image)
        // Vérification de la taille de l'image (maximum 2 Mo)
        $tailleMax = 20 * 1024 * 1024; // 20 Mo


        if ($tailleFichier > $tailleMax) {

            ?>
                <div class="container pt-3">
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" style="width:30px; height:30px; " role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            Erreur : La taille de l'image est trop grande. Veuillez choisir une image plus petite.
                        </div>
                    </div>
                </div>
            <?php
                
            exit;
        } 

        // Génération d'un nom de fichier unique
        $beboomPicture = uniqid() . "_" . $nomFichier;

        // Chemin complet de destination de l'image
        $cheminDestination = $repertoireDestination . $beboomPicture;

        // Déplacement de l'image vers le répertoire de destination
        if (move_uploaded_file($cheminTemporaire, $cheminDestination)) {
            

            // Gestion des messages de succes
            // $msg = "Photo mise à jour !";

            // $_SESSION['message'] = [
            //     'succes' => $msg
            // ];
           return $beboomPicture;
            
        } else {

            ?>
                <div class="container pt-3">
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" style="width:30px; height:30px; " role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            Erreur : Une erreur s'est produite lors du téléchargement de l'image.
                        </div>
                    </div>
                </div>
            <?php
            // Arrêter le traitement ou rediriger vers une autre page
            exit;
        }
    } else {

        ?>
        <div class="container pt-3">
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" style="width:30px; height:30px; " role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    Erreur : Une erreur s'est produite lors du téléchargement de l'image.
                </div>
            </div>
        </div>
       <?php
        // Arrêter le traitement ou rediriger vers une autre page
        exit;
    } 
}



function insertBeboom($beboomId, $beboomName, $beboomTitle, $beboomPicture, $userId)
{   
    $pdo = dbConnect();
    $request = $pdo->prepare("INSERT INTO beboom (`beboomId`, `beboomName`, `beboomTitle`, `beboomPicture`, `userId`) VALUES (?, ?, ?, ?, ?)");
    $request->bindValue(1, $beboomId);
    $request->bindValue(2, $beboomName);
    $request->bindValue(3, $beboomTitle);
    $request->bindValue(4, $beboomPicture);   
    $request->bindValue(5, $userId);   

    $request->execute();
     '<script> alert("Inscription reussie");</script>';
}