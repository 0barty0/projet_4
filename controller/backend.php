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

function addPost($newTitle, $newContent)
{
    $postManager = new PostManager();
    $result=$postManager->add($newTitle, $newContent);

    if ($result !== 0) {
        $_SESSION['message'] = "L'article a bien été publié !";
        header('location:index.php');
        exit();
    } else {
        $_SESSION['articleTitle'] = $_POST['title'];
        $_SESSION['articleContent'] = $_POST['content'];
        throw new \Exception("L'article n'a pas pu être publié.", 1);
    }
}
