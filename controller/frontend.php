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
    if ($post) {
        require(__DIR__.'/../view/frontend/post.php');
    } else {
        throw new \Exception("Aucun billet à ce numéro", 1);
    }
}
