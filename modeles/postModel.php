<?php
function updatePost($idPost, $commentaire, $modificationDate)
{
    static $ps = null;

    $sql = "UPDATE `dbM152`.`post` SET ";
    $sql .= "`commentaire` = :COMMENTAIRE, ";
    $sql .= "`modificationDate` = :MODIFICATIONDATE, ";
    $sql .= "WHERE (`idPost` = :IDPOST)";
    if ($ps == null) {
        $ps = connectDB()->prepare($sql);
    }
    $answer = false;
    try {
        $ps->bindParam(':IDPOST', $idPost, PDO::PARAM_INT);
        $ps->bindParam(':COMMENTAIRE', $commentaire, PDO::PARAM_STR);
        $ps->bindParam(':MODIFICATIONDATE', $modificationDate, PDO::PARAM_STR);
        $ps->execute();
        $answer = ($ps->rowCount() > 0);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $answer;
}

function deletePost($idPost)
{
    static $ps = null;
    $sql = "DELETE FROM `dbM152`.`post` WHERE (`idPost` = :IDPOST);";
    if ($ps == null) {
        $ps = connectDB()->prepare($sql);
    }
    $answer = false;
    try {
        $ps->bindParam(':IDPOST', $idPost, PDO::PARAM_INT);
        $ps->execute();
        $answer = ($ps->rowCount() > 0);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $answer;
}
function getLastId()
{
    static $ps = null;
    $sql = 'SELECT MAX(idPost) ';
    $sql .= 'FROM dbM152.post';
    if ($ps == null) {
        $ps = connectDB()->prepare($sql);
    }
    $answer = false;
    try {
        if ($ps->execute())
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $answer[0]["MAX(idPost)"];
}
function createMediaAndPost($typeMedia, $nomMedia, $creationDate, $commentaire)
{
    static $ps = null;
    $answer = false;
    try {
        connectDB()->beginTransaction();
        $sql = "INSERT INTO `dbM152`.`post` (`commentaire`, `creationDate`) ";
        $sql .= "VALUES (:COMMENTAIRE, :CREATIONDATE)";
        $ps = connectDB()->prepare($sql);
        $ps->bindParam(':COMMENTAIRE', $commentaire, PDO::PARAM_STR);
        $ps->bindParam(':CREATIONDATE', $creationDate, PDO::PARAM_STR);
        $answer = $ps->execute();
        $ps->close;
        
            $sql = "INSERT INTO `dbM152`.`media` (`typeMedia`, `nomMedia`, `creationDate`, `idPost`) ";
            $sql .= "VALUES (:TYPEMEDIA, :NOMMEDIA, :CREATIONDATE, :IDPOST)";
            $ps = connectDB()->prepare($sql);
            $ps->bindParam(':TYPEMEDIA', $typeMedia, PDO::PARAM_STR);
            $ps->bindParam(':NOMMEDIA', $nomMedia, PDO::PARAM_STR);
            $ps->bindParam(':CREATIONDATE', $creationDate, PDO::PARAM_STR);
            $ps->bindParam(':IDPOST', getLastId(), PDO::PARAM_INT);
            $answer = $ps->execute();
            $ps->close;
        
        connectDB()->commit();
    } catch (PDOException $e) {
        echo $e->getMessage();
        connectDB()->rollBack();
    }
    return $answer;
}

function updateMedia($idMedia, $typeMedia, $nomMedia, $modificationDate)
{
    static $ps = null;

    $sql = "UPDATE `dbM152`.`media` SET ";
    $sql .= "`typeMedia` = :TYPEMEDIA, ";
    $sql .= "`nomMedia` = :COMMENTAIRE, ";
    $sql .= "`modificationDate` = :MODIFICATIONDATE, ";
    $sql .= "WHERE (`idMedia` = :IDMEDIA)";
    if ($ps == null) {
        $ps = connectDB()->prepare($sql);
    }
    $answer = false;
    try {
        $ps->bindParam(':IDMEDIA', $idMedia, PDO::PARAM_INT);
        $ps->bindParam(':TYPEMEDIA', $typeMedia, PDO::PARAM_STR);
        $ps->bindParam(':NOMMEDIA', $nomMedia, PDO::PARAM_STR);
        $ps->bindParam(':MODIFICATIONDATE', $modificationDate, PDO::PARAM_STR);
        $ps->execute();
        $answer = ($ps->rowCount() > 0);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $answer;
}

function deleteMedia($idMedia)
{
    static $ps = null;
    $sql = "DELETE FROM `dbM152`.`media` WHERE (`idMedia` = :IDMEDIA);";
    if ($ps == null) {
        $ps = connectDB()->prepare($sql);
    }
    $answer = false;
    try {
        $ps->bindParam(':IDMEDIA', $idMedia, PDO::PARAM_INT);
        $ps->execute();
        $answer = ($ps->rowCount() > 0);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $answer;
}
