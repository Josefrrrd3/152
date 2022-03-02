<?php
require "modeles/postModel.php";

$message = "";
$commentaire = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);
$action      = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

switch ($action) {
    case 'submit':
        $nbFile = count($_FILES['fileToUpload']['name']);

        for ($i = 0; $i < $nbFile; $i++) {

            $target_dir = "media/imgdownload/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
            $validation = 1;
            $fileToUploadType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            //Verifie si le fichier est bien une image
            if (isset($_POST["submit"])) {
                $verification = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
                if ($verification !== false) {
                    $message = "Le fichier est de type " . $verification["mime"] . ".";
                    $validation = 1;
                } else {
                    $message = "Le fichier n'est pas une image";
                    $validation = 0;
                }
            }
            // verification php du type de fichier
            if ($fileToUploadType != "jpg" && $fileToUploadType != "png" && $fileToUploadType != "jpeg" && $fileToUploadType != "gif") {
                $message = "Vous ne pouvez que upload des fichier de type JPG, JPEG, PNG ou GIF";
                $validation = 0;
            }
            // verifier si $validation est a 0 (donc il y a une erreur)
            if ($validation == 0) {
                $message = "Le fichier la n'a pas été upload";
            }
            // verifier si le fichier existe deja
            if (file_exists($target_file)) {
                $message = "Le fichier existe deja.";
                $validation = 0;
            }
            // verifier la taille du fichier
            if ($_FILES["fileToUpload"]["size"][$i] > 3000000) {
                $message = "Votre fichier est trop grand";
                $validation = 0;
            }
            //upload si tout est correcte
            else {
                $idPost = createPost($commentaire, date("Y-m-d H:i:s"));
                if ($idPost) {
                    //$fileName = ;
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
                        $message = "Le fichier " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$i])) . " a été upload.";
                    } else {
                        $message = "Erreur lors de l'upload du fichier";
                    }
                    createMedia($fileToUploadType, $_FILES["fileToUpload"]["name"][$i], date("Y-m-d H:i:s"),$idPost);
                    
                }                
            }
        }
        break;
}
include('vues/post.php');
