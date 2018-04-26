<?php
function getPosts()
{
    $db = dbConnect();

    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM posts ORDER BY creation_date');

    return $req;
}

function getPost($idPost)
{
    $db = dbConnect();

    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM posts WHERE id=?');
    $req->execute(array($idPost));
    $post = $req->fetch();

    return $post;
}

function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', 'wlxrwlxr');

    return $db;
}
