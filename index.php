<?php
require('./controller/frontend.php');

try {
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
        } else {
            showHome();
        }
    } else {
        showHome();
    }
} catch (\Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}
