<?php
require_once('Manager.php');
require_once('Post.php');

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $posts = [];

        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM posts ORDER BY creation_date');

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new POST($data);
        }
        $req->closeCursor();
        return $posts;
    }

    public function getPost($idPost)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM posts WHERE id=?');
        $req->execute(array($idPost));
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $post = new Post($data);

        return $post;
    }

    public function add($title, $content)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES (:title, :content, NOW())');
        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        $affectedLines = $req->execute();

        return $affectedLines;
    }

    public function exists($id)
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) FROM posts WHERE id='. $id);
        return (bool) $req->fetchColumn();
    }

    public function updatePost($id, $title, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');
        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        $req->bindValue(':id', $id);
        $affectedLines = $req->execute();

        return $affectedLines;
    }
}
