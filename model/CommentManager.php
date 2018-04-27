<?php
require_once('Manager.php');

class CommentManager extends Manager
{
    public function getComments($idPost)
    {
        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date_fr FROM comments WHERE post_id=?');
        $comments->execute(array($idPost));

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
