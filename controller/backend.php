<?php
// Class loading
require_once(__DIR__.'/../model/PostManager.php');
require_once(__DIR__.'/../model/CommentManager.php');
require_once(__DIR__ .'/../model/MembersManager.php');

function adminAccess()
{
    require(__DIR__ .'/../view/backend/admin.php');
}

function disconnect()
{
    session_destroy();
    header('location:index.php');
    exit();
}

function createPost()
{
    require(__DIR__.'/../view/backend/createPost.php');
}

function addPost($title, $content)
{
    $postManager = new PostManager();
    $postManager->add($title, $content);
    header('location:index.php');
    exit();
}
