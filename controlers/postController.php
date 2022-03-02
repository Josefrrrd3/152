<?php
require "modeles/postModel.php";

$message = "";
$commentaire = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);
$action      = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

switch ($action) {
    case 'submit':

        $nbFile = count($_FILES['fileToUpload']['name']);

        for ($i = 0; $i < $nbFile; $i++) {

            $target_dir = "media/imgdownload/"; // specifies the directory where the file is going to be placed
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
            $uploadOk = 1;
            $fileToUploadType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
                if ($check !== false) {
                    $message = "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $message = "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                $message = "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"][$i] > 3000000) {
                $message = "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($fileToUploadType != "jpg" && $fileToUploadType != "png" && $fileToUploadType != "jpeg" && $fileToUploadType != "gif") {
                $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $message = "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                createPost($commentaire, date("Y-m-d H:i:s"));
                createMedia($fileToUploadType, $_FILES["fileToUpload"]["name"][$i], date("Y-m-d H:i:s"));

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
                    $message = "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$i])) . " has been uploaded.";
                } else {
                    $message = "Sorry, there was an error uploading your file.";
                }
            }
        }
        break;
}

include('vues/post.php');


//var_dump($_FILES);


?>