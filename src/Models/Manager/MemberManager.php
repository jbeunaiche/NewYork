<?php
// Connexion..

namespace Julien\Models\Manager;
 
use Julien\Models\Manager;
use Julien\Models\Entity\Member;

class MemberManager extends Manager

{

    public function getMember($pseudo)

 {
  $req = $this->_db->prepare('SELECT * FROM member WHERE pseudo = :pseudo');
  $req->bindValue(':pseudo', $pseudo);
  $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Member::class);
  $req->execute();

  $member = $req->fetch();
  return $member; 
 }
}