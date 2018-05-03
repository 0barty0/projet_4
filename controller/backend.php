<?php

function adminAccess()
{
    require(__DIR__ .'/../view/backend/admin.php');
}

function disconnect()
{
    session_destroy();
    header('location:index.php');
    exit();
}

function createPost()
{
    require(__DIR__.'/../view/backend/createPost.php');
}
