<?php
// Class loading
require_once(__DIR__.'/../model/PostManager.php');
require_once(__DIR__.'/../model/CommentManager.php');

function showHome()
{
    require(__DIR__.'/../view/frontend/home.php');
}

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require(__DIR__.'/../view/frontend/list_posts.php');
}

function post($id)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($id);
    $comments = $commentManager->getComments($id);
    if ($post) {
        require(__DIR__.'/../view/frontend/post.php');
    } else {
        throw new \Exception("Aucun billet à ce numéro", 1);
    }
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new \Exception("Impossible d'ajouter le commentaire.", 1);
    } else {
        header('location: index.php?action=post&id='. $postId);
    }
}
