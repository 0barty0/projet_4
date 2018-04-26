<?php
require_once(__DIR__.'/../model/frontend.php');

$req = getPosts();

require_once(__DIR__.'/../view/frontend/lists_posts.php');
