<?php
session_start();
require('./controller/frontend.php');
require('./controller/backend.php');

try {
    if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'deconnexion') {
                disconnect();
            } elseif ($_GET['action'] == 'createPost') {
                createPost();
            } elseif ($_GET['action'] == 'addPost') {
                if (isset($_POST['title']) && isset($_POST['content'])) {
                    if (!empty($_POST['title']) && !empty($_POST['content'])) {
                        $newTitle = htmlspecialchars($_POST['title']);
                        $newContent = $_POST['content'];
                        addPost($newTitle, $newContent);
                    } else {
                        $_SESSION['articleTitle'] = $_POST['title'];
                        $_SESSION['articleContent'] = $_POST['content'];
                        
                        throw new \Exception("Tous les champs ne sont pas remplis", 1);
                    }
                }
            } else {
                adminAccess();
            }
        } else {
            adminAccess();
        }
    } else {
        if (isset($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);

            if ($action == "listPosts") {
                listPosts();
            } elseif ($action == "post") {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post($_GET['id']);
                } else {
                    throw new \Exception("Aucun identifiant de billet envoyé", 1);
                }
            } elseif ($action == "addComment") {
                if (isset($_GET['id']) && isset($_GET['id']) > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        $postId = htmlspecialchars($_GET['id']);
                        $author = htmlspecialchars($_POST['author']);
                        $comment = htmlspecialchars($_POST['comment']);
                        addComment($postId, $author, $comment);
                    } else {
                        throw new \Exception("Tous les champs ne sont pas remplis", 1);
                    }
                } else {
                    throw new \Exception("Aucun identifiant de billet envoyé", 1);
                }
            } elseif ($action == "login") {
                if (isset($_POST['pseudo']) && isset($_POST['password'])) {
                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    $password = htmlspecialchars($_POST['password']);

                    login($pseudo, $password);
                } else {
                    loginForm();
                }
            } else {
                showHome();
            }
        } else {
            showHome();
        }
    }
} catch (\Exception $e) {
    $errorMessage = $e->getMessage();
    if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
        require('view/backend/errorView.php');
    } else {
        require('view/frontend/errorView.php');
    }
}
