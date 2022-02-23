<?php
/*       
Nom du projet:Page Facebook du CFPT
Nom du developpeur: José Ferreira
Date de création: 26.01.2022
Version du projet:1.0
Description: M152 Chapitre 1
*/
ob_start();
//Lance la session
session_start();
//recuperer la variable uc
$uc = empty($_GET['uc']) ? "home" : $_GET['uc'];
//Inclure le header
require('modeles/connexionDB.php');
include("vues/header.php");
//Choisir la page en fonction de uc
switch ($uc) {
    case 'home':
        require('controlers/homeController.php');
        break;
    case 'post':
        require('controlers/postController.php');
        break;
}
//Inclure le footer
include("vues/footer.php");

