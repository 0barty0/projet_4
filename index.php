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
        } else {
            showHome();
        }
    } else {
        showHome();
    }
} catch (\Exception $e) {
    echo 'Erreur :'. $e->getMessage();
}
