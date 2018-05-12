<?php
// Class loading
require_once(__DIR__.'/../model/PostManager.php');
require_once(__DIR__.'/../model/CommentManager.php');
require_once(__DIR__ .'/../model/MembersManager.php');

class AdminController
{
    public function showHome()
    {
        require(__DIR__ .'/../view/backend/admin.php');
    }

    public function disconnect()
    {
        session_destroy();
        header('location:index.php');
        exit();
    }

    public function createPost()
    {
        require(__DIR__.'/../view/backend/createPost.php');
    }

    public function addPost()
    {
        if (isset($_POST['title']) && isset($_POST['content'])) {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $newTitle = htmlspecialchars($_POST['title']);
                $newContent = $_POST['content'];

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
            } else {
                $_SESSION['articleTitle'] = $_POST['title'];
                $_SESSION['articleContent'] = $_POST['content'];

                throw new \Exception("Tous les champs ne sont pas remplis", 1);
            }
        } else {
            throw new \Exception("Erreur lors du traitement.", 1);
        }
    }

    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        require(__DIR__. '/../view/backend/listPosts.php');
    }

    public function modify()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $postManager = new PostManager();
            $post = $postManager->getPost($id);

            if ($post) {
                require(__DIR__ . '/../view/backend/modifyPost.php');
            } else {
                throw new \Exception("Aucun billet à ce numéro", 1);
            }
        } else {
            throw new \Exception("Aucun identifiant de billet envoyé.", 1);
        }
    }

    public function update()
    {
        if (isset($_GET['id'])) {
            if (isset($_POST['title']) && isset($_POST['content'])) {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    $id = htmlspecialchars($_GET['id']);
                    $newTitle = htmlspecialchars($_POST['title']);
                    $newContent = $_POST['content'];
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
                } else {
                    $_SESSION['articleTitle'] = $_POST['title'];
                    $_SESSION['articleContent'] = $_POST['content'];

                    throw new \Exception("Tous les champs ne sont pas remplis", 1);
                }
            } else {
                throw new \Exception("Erreur lors du traitement.", 1);
            }
        } else {
            throw new \Exception("Aucun identifiant de billet envoyé.", 1);
        }
    }

    public function deletePost()
    {
        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $postManager = new PostManager();
            $commentManager = new CommentManager();

            if ($postManager->exists($id)) {
                $resultPost = $postManager->deletePost($id);

                if ($resultPost === 0) {
                    throw new \Exception("L'article n'a pas pu être supprimé.", 1);
                }

                if ($commentManager->exists($id)) {
                    $resultComments = $commentManager->deleteComments($id);

                    if ($resultComments === 0) {
                        throw new \Exception("Les commentaires de l'article n'ont pas pu être supprimés.", 1);
                    }
                }

                $_SESSION['message'] = "L'article a bien été supprimé !";
                header('location:index.php?action=listPosts');
                exit();
            } else {
                throw new \Exception("Aucun article avec cet identifiant", 1);
            }
        } else {
            throw new \Exception("Aucun identifiant de billet envoyé.", 1);
        }
    }

    public function listComments()
    {
        $commentManager = new CommentManager();

        $comments = $commentManager->getReportedComments();

        require(__DIR__.'/../view/backend/listComments.php');
    }

    public function deleteComment()
    {
        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $commentManager = new CommentManager();

            $affectedLines = $commentManager->deleteComment($id);

            if ($affectedLines !== 0) {
                $_SESSION['message'] = "Commentaire supprimé";

                header('location:index.php?action=listComments');
            } else {
                throw new \Exception("Le commentaire n'a pas pu être supprimé", 1);
            }
        } else {
            throw new \Exception("Aucun identifiant de commentaire envoyé", 1);
        }
    }
}
