<?php
require_once('Manager.php');

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();

        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM posts ORDER BY creation_date');

        return $req;
    }

    public function getPost($idPost)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM posts WHERE id=?');
        $req->execute(array($idPost));
        $post = $req->fetch();

        return $post;
    }
}