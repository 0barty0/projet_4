<?php

require_once(__DIR__ .'/../model/MembersManager.php');

function adminForm()
{
    require(__DIR__ .'/../view/backend/login.php');
}

function adminAccess($pseudo, $password)
{
    $membersManager = new MembersManager();
    $admin = $membersManager->getAdmin($pseudo);

    if ($admin) {
        if (password_verify($password, $admin['password'])) {
            require(__DIR__ .'/../view/backend/admin.php');
        } else {
            throw new \Exception("Mauvais mot de passe.", 1);
        }
    } else {
        throw new \Exception("Vous n'êtes pas administrateur de ce site.", 1);
    }
}
