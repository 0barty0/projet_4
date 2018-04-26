<?php
function getPosts()
{
    $db = dbConnect();

    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');

    return $req;
}

function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', 'wlxrwlxr');

    return $db;
}
