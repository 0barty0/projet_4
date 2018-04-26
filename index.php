<?php
require_once('./controller/frontend.php');

if (isset($_GET['action'])) {
    $action = htmlspecialchars($_GET['action']);

    if ($action == "listPosts") {
        listPosts();
    } elseif ($action == "post") {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post($_GET['id']);
        } else {
            showHome();
        }
    } else {
        showHome();
    }
} else {
    showHome();
}
