<?php

require_once('Manager.php');

class MembersManager extends Manager
{
    public function getAdmin($pseudo)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM members WHERE category = \'admin\' AND pseudo = ?');
        $req->execute(array($pseudo));
        $admin = $req->fetch();

        return $admin;
    }
}
