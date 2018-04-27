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

function getComments($idPost)
{
    $db = dbConnect();

    $req = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date_fr FROM comments WHERE post_id=?');
    $req->execute(array($idPost));

    return $req;
}

function postComment($postId, $author, $comment)
{
    $db = dbConnect();

    $req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())');
    $affectedLines = $req->execute(array($postId, $author, $comment));

    return $affectedLines;
}

function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', 'wlxrwlxr');

    return $db;
}
