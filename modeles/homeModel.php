<?php

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

function getCountFromDifferentIdPost()
{
    static $ps = null;
    $sql = 'SELECT m.idPost, count(*) ';
    $sql .= ' FROM dbM152.media as m ';
    $sql .= ' GROUP BY idPost;';

    if ($ps == null) {
        $ps = connectDB()->prepare($sql);
    }
    $answer = false;
    try {
        if ($ps->execute())
            $answer = $ps->fetchAll(PDO::FETCH_KEY_PAIR);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $answer;
}

function readPostAndMediaWithId($id)
{
    static $ps = null;
    $sql = 'SELECT m.idPost, m.nomMedia, m.typeMedia, p.commentaire ';
    $sql .= 'FROM dbM152.media as m, dbM152.post as p ';
    $sql .= 'WHERE m.idPost = p.idPost AND p.idPost = :ID ';

    if ($ps == null) {
        $ps = connectDB()->prepare($sql);
    }
    $answer = false;
    try {
        $ps->bindParam(':ID', $id, PDO::PARAM_STR);
        if ($ps->execute())
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $answer;
}

function ShowMedia()
{
    $html = "";
    $array = getCountFromDifferentIdPost();
    if (!empty($array)) {
        // Chaque ligne
        for ($i = getLastId(); $i > 0; $i--) {
            $Media = readPostAndMediaWithId($i);
            $html .= "\n <div id=\"my-pics$i\" class=\"carousel slide\" data-ride=\"carousel\" data-interval=\"false\" style=\"margin:auto;\" >";

            $html .= "\n <ol class=\"carousel-indicators\">";

            for ($j = 1; $j < $array[$i]["count(*)"] + 1; $j++) {
                $html .= "\n <li data-target=\"#my-pics$i\" data-slide-to=\"$i\" class=\"active\"></li>";
            }

            $html .= "\n </ol>";
            $html .= "\n <div class=\"carousel-inner\" role=\"listbox\">";

            for ($k = 0; $k < $array[$i]["count(*)"]; $k++) {
                if ($k == 0) {
                    $html .= "\n <div align=\"center\" class=\"item active\">";
                } else {
                    $html .= "\n <div align=\"center\" class=\"item\">";
                }
                if ($Media[$k]["typeMedia"] == "mp4" || $Media[$k]["typeMedia"] == "m4v") {
                    $html .= "\n <video width=\"100%\" height=\"100%\" autoplay loop controls>";
                    $html .= "\n <source src=\"media/imgdownload/" . $Media[$k]["nomMedia"] . "\" type=\"video/mp4\">";
                    $html .= "\n </video>";
                    $html .= "\n </div>";
                }
                if ($Media[$k]["typeMedia"] == "png" || $Media[$k]["typeMedia"] == "jpg" || $Media[$k]["typeMedia"] == "jpeg" || $Media[$k]["typeMedia"] == "gif" || $Media[$k]["typeMedia"] == "jpg") {
                    $html .= "\n <img src=\"media/imgdownload/" . $Media[$k]["nomMedia"] . "\" alt=\"" . $Media[$k]["nomMedia"] . "\">";
                    $html .= "\n </div>";
                }

                if ($Media[$k]["typeMedia"] == "mp3" || $Media[$k]["typeMedia"] == "wav" || $Media[$k]["typeMedia"] == "ogg") {
                    $html .= "\n <audio controls autoplay";
                    $html .= "\n <source src=\"media/imgdownload/" . $Media[$k]["nomMedia"] . "\" type=\"audio/mp3\">";
                    $html .= "\n </audio>";
                    $html .= "\n </div>";
                }
            }
            $html .= "\n </div>";

            if ($array[$i]["count(*)"] > 1) {
                $html .= "\n <a class=\"left carousel-control\" href=\"#my-pics$i\" role=\"button\" data-slide=\"prev\">";
                $html .= "\n <span class=\"icon-prev\" aria-hidden=\"true\"></span>";
                $html .= "\n <span class=\"sr-only\">Previous</span>";
                $html .= "\n </a>";
    
                $html .= "\n <a class=\"right carousel-control\" href=\"#my-pics$i\" role=\"button\" data-slide=\"next\">";
                $html .= "\n <span class=\"icon-next\" aria-hidden=\"true\"></span>";
                $html .= "\n <span class=\"sr-only\">Next</span>";
                $html .= "\n </a>";
            }

            $html .= "\n </div>";

            $html .= "\n <div class=\"panel-body\">";
            $html .= "\n " . $Media[0]["commentaire"];
            $html .= "\n <a><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span></a>";
            $html .= "\n <a href=\"?uc=delete&id=".$i."\" role=\"button\" data-toggle=\"modal\"><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></a>";
            $html .= "\n <hr>";
            $html .= "\n </div>";
        }
    }
    return $html;
}
?>