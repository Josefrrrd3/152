<?php
//require le model pour la page post
require "modeles/postModel.php";

//Declaration des variables et recuperation des valeur
$message = "";
define('fileMaxSize', 3 * 1024 * 1024);
$commentaire = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);
$action      = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

switch ($action) {
    case 'submit':

        $nbFile = count($_FILES['fileToUpload']['name']);
        $target_dir = "media/imgdownload/";
        $validation = 1;

        //Upload et enregistre l'image au bon endroi
        for ($i = 0; $i < $nbFile; $i++) {
            
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
            $fileToUploadType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $uniqueName = uniqid() . "." . $fileToUploadType;


            //Verifie si le fichier est bien une image
            if (isset($_POST["submit"])) {
                $verification = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
                //verification est correct
                if ($verification !== false) {
                    $message .= "Le fichier est de type " . $verification["mime"] . ".";
                    $validation = 1;
                    //verification est incorrecte
                } else {
                    $message .= "Le fichier n'est pas une image";
                    $validation = 0;
                }
            }

            // verification php du type de fichier
            if ($fileToUploadType != "jpg" && $fileToUploadType != "png" && $fileToUploadType != "jpeg" && $fileToUploadType != "gif" && $fileToUploadType != "mp3" && $fileToUploadType != "wav" && $fileToUploadType != "mp4") {
                $message .= "Vous ne pouvez que upload des fichier de type JPG, JPEG, PNG, mp3 ou GIF";
                $validation = 0;
            }

            // verifier la taille du fichier
            if ($_FILES["fileToUpload"]["size"][$i] > fileMaxSize) {
                $message .= "Votre fichier est trop grand";
                $validation = 0;
            }

            //upload si tout est correcte
            if ($validation == 0) {
                $message .= "Le fichier la n'a pas été upload";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_dir . $uniqueName)) {
                    $message .= "Le fichier " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$i])) . " a été upload.";
                    createMediaAndPost($fileToUploadType, $uniqueName, date("Y-m-d H:i:s"), $commentaire);
                    header("Location: index.php?uc=home");
                } else {
                    $message = "Erreur lors de l'upload du fichier";
                }
            }
        }
        break;
}
//Inclure la vue pour la page post
include('vues/post.php');
