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
        $_SESSION['articleTitle'] = $newTitle;
        $_SESSION['articleContent'] = $newContent;
        throw new \Exception("L'article n'a pas pu être publié.", 1);
    }
}

function adminListPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require(__DIR__. '/../view/backend/listPosts.php');
}

function modify($id)
{
    $postManager = new PostManager();

    $post = $postManager->getPost($id);

    require(__DIR__ . '/../view/backend/modifyPost.php');
}

function update($id, $newTitle, $newContent)
{
    $postManager = new PostManager();
    if ($postManager->exists($id)) {
        $result = $postManager->updatePost($id, $newTitle, $newContent);
        if ($result !== 0) {
            $_SESSION['message'] = "L'article a bien été modifié !";
            header('location:index.php');
            exit();
        } else {
            $_SESSION['articleTitle'] = $newTitle;
            $_SESSION['articleContent'] = $newContent;
            throw new \Exception("L'article n'a pas pu être publié.", 1);
        }
    } else {
        throw new \Exception("Aucun article avec cet identifiant", 1);
    }
}
