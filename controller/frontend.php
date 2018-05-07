<?php
// Class loading
require_once(__DIR__.'/../model/PostManager.php');
require_once(__DIR__.'/../model/CommentManager.php');
require_once(__DIR__ .'/../model/MembersManager.php');

function loginForm()
{
    require(__DIR__ .'/../view/frontend/login.php');
}

function login()
{
    if (isset($_POST['pseudo']) && isset($_POST['password'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $password = htmlspecialchars($_POST['password']);
        $membersManager = new MembersManager();
        $admin = $membersManager->getAdmin($pseudo);

        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $_SESSION['pseudo'] = $admin['pseudo'];
                $_SESSION['authenticated'] = true;
                header("location:index.php");
            } else {
                throw new \Exception("Mauvais mot de passe.", 1);
            }
        } else {
            throw new \Exception("Vous n'êtes pas administrateur de ce site.", 1);
        }
    } else {
        loginForm();
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

    require(__DIR__.'/../view/frontend/listPosts.php');
}

function post()
{
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $id = htmlspecialchars($_GET['id']);
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->getPost($id);
        $comments = $commentManager->getComments($id);
        if ($post) {
            require(__DIR__.'/../view/frontend/post.php');
        } else {
            throw new \Exception("Aucun billet à ce numéro", 1);
        }
    } else {
        throw new \Exception("Aucun identifiant de billet envoyé", 1);
    }
}

function addComment()
{
    if (isset($_GET['id']) && isset($_GET['id']) > 0) {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            $postId = htmlspecialchars($_GET['id']);
            $author = htmlspecialchars($_POST['author']);
            $comment = htmlspecialchars($_POST['comment']);

            $commentManager = new CommentManager();
            $affectedLines = $commentManager->postComment($postId, $author, $comment);

            if ($affectedLines === false) {
                throw new \Exception("Impossible d'ajouter le commentaire.", 1);
            } else {
                header('location: index.php?action=post&id='. $postId);
            }
        } else {
            throw new \Exception("Tous les champs ne sont pas remplis", 1);
        }
    } else {
        throw new \Exception("Aucun identifiant de billet envoyé", 1);
    }
}
