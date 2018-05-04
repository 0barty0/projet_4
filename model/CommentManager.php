<?php
require_once('Manager.php');
require_once('Comment.php');

class CommentManager extends Manager
{
    public function getComments($idPost)
    {
        $db = $this->dbConnect();
        $comments = [];

        $req = $db->prepare('SELECT id, post_id, author, comment, comment_date, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date_fr FROM comments WHERE post_id=?');
        $req->execute(array($idPost));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())');
        $affectedLines = $req->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
}
