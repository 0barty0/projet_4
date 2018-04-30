<?php
// Class loading
require_once(__DIR__.'/../model/PostManager.php');
require_once(__DIR__.'/../model/CommentManager.php');
require_once(__DIR__ .'/../model/MembersManager.php');

function loginForm()
{
    require(__DIR__ .'/../view/frontend/login.php');
}

function login($pseudo, $password)
{
    $membersManager = new MembersManager();
    $admin = $membersManager->getAdmin($pseudo);

    if ($admin) {
        if (password_verify($password, $admin['password'])) {
            $_SESSION['pseudo']=$admin['pseudo'];
            require(__DIR__.'/../view/frontend/home.php');
        } else {
            throw new \Exception("Mauvais mot de passe.", 1);
        }
    } else {
        throw new \Exception("Vous n'êtes pas administrateur de ce site.", 1);
    }
}

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
