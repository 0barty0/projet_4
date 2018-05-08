<?php
session_start();
require('./controller/AdminController.php');
require('./controller/PublicController.php');

try {
    if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
        $adminController = new AdminController();
        if (isset($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);

            switch ($action) {
              case 'deconnexion':
                $adminController->disconnect();
                break;
              case 'createPost':
                $adminController->createPost();
                break;
              case 'addPost':
                $adminController->addPost();
                break;
              case 'listPosts':
                $adminController->listPosts();
                break;
              case 'listComments':
                $adminController->listComments();
                break;
              case 'modify':
                $adminController->modify();
                break;
              case 'update':
                $adminController->update();
                break;
              case 'deletePost':
                $adminController->deletePost();
                break;
              case 'deleteComment':
                $adminController->deleteComment();
                break;
              default:
                $adminController->showHome();
                break;
            }
        } else {
            $adminController->showHome();
        }
    } else {
        $publicController = new PublicController();
        if (isset($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);
            switch ($action) {
              case 'listPosts':
                $publicController->listPosts();
                break;
              case 'post':
                $publicController->post();
                break;
              case 'addComment':
                $publicController->addComment();
                break;
              case 'login':
                $publicController->login();;
                break;
              case 'reportComment':
                $publicController->reportComment();
                break;
              default:
                $publicController->showHome();
                break;
            }
        } else {
            $publicController->showHome();
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
