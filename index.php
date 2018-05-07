<?php
session_start();
require('./controller/frontend.php');
require('./controller/backend.php');

try {
    if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
        if (isset($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);
            if ($action == 'deconnexion') {
                disconnect();
            } elseif ($action == 'createPost') {
                createPost();
            } elseif ($action == 'addPost') {
                addPost();
            } elseif ($action == 'listPosts') {
                adminListPosts();
            } elseif ($action == 'modify') {
                modify();
            } elseif ($action == 'update') {
                update();
            } elseif ($action == 'delete') {
                deletePost();
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
                post();
            } elseif ($action == "addComment") {
                addComment();
            } elseif ($action == "login") {
                login();
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
