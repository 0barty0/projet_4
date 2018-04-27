<?php
require(__DIR__.'/../model/frontend.php');

function showHome()
{
    require(__DIR__.'/../view/frontend/home.php');
}

function listPosts()
{
    $posts = getPosts();

    require(__DIR__.'/../view/frontend/list_posts.php');
}

function post($id)
{
    $post = getPost($id);
    $comments = getComments($id);
    if ($post) {
        require(__DIR__.'/../view/frontend/post.php');
    } else {
        throw new \Exception("Aucun billet à ce numéro", 1);
    }
}

function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new \Exception("Impossible d'ajouter le commentaire.", 1);
    } else {
        header('location: index.php?action=post&id='. $postId);
    }
}
