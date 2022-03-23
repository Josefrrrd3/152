<?php
function DeleteMediaAndPost($idPost)
{
    static $ps = null;
    $answer = false;
    $array = "";
    try {
        connectDB()->beginTransaction();

        $sql = 'SELECT m.nomMedia ';
        $sql .= 'FROM dbM152.media as m ';
        $sql .= 'WHERE m.idPost = ' . $idPost ;
        $ps = connectDB()->prepare($sql);
        $array = $ps->execute();
        $array = $ps->fetchAll(PDO::FETCH_ASSOC);
        for ($i=0; $i < count($array) ; $i++) { 
            unlink("media/imgdownload/".$array[$i]["nomMedia"]);
        }
        var_dump($array);
        $ps->close;

        $sql = "DELETE FROM `dbM152`.`post` WHERE (`idPost` = $idPost);";
        $ps = connectDB()->prepare($sql);
        $answer = $ps->execute();
        $ps->close;

        $sql = "DELETE FROM `dbM152`.`media` WHERE (`idPost` = $idPost);";
        $ps = connectDB()->prepare($sql);
        $answer = $ps->execute();
        $ps->close;


        connectDB()->commit();
    } catch (PDOException $e) {
        echo $e->getMessage();
        connectDB()->rollBack();
    }
    return $answer;
}

/**
 * Retourne le nombre maximal du nombre de post
 * @return answer
 */
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
    //return $answer[0]["idPost"];
    return $answer[0]["MAX(idPost)"];
}

function countIdPost()
{
    static $ps = null;
    $sql = 'SELECT COUNT(idPost) ';
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
    //return $answer[0]["idPost"];
    return $answer[0]["COUNT(idPost)"];
}
?>