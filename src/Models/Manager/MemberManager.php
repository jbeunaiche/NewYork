<?php
// Connexion..

namespace Julien\Models\Manager;

use Julien\Models\Manager;
use Julien\Models\Entity\Member;

/**
 * Class MemberManager
 * @package Julien\Models\Manager
 */
class MemberManager extends Manager

{
    /**
     * @param $pseudo
     * @return mixed
     */
    public function getMember($pseudo)

    {
        $req = $this->_db->prepare('SELECT * FROM member WHERE pseudo = :pseudo');
        $req->bindValue(':pseudo', $pseudo);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Member');
        $member = $req->fetch();
        return $member;
    }

}