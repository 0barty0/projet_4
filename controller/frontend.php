<?php
require_once(__DIR__.'/../model/frontend.php');

function showHome()
{
    require_once(__DIR__.'/../view/frontend/home.php');
}

function listPosts()
{
    $posts = getPosts();

    require_once(__DIR__.'/../view/frontend/list_posts.php');
}

function post($id)
{
    $post = getPost($id);

    require_once(__DIR__.'/../view/frontend/post.php');
}
