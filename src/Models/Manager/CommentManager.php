<?php

namespace Julien\Models\Manager;

use Julien\Models\Manager;
use Julien\Models\Entity\Comment;

class CommentManager extends Manager
{

    public function getComments($postid)
    {
        $req = $this->_db->prepare('SELECT id, postid, author, comment, DATE_FORMAT(createdCom, \'%d/%m/%Y à %Hh%imin%ss\') AS createdCom  FROM comment WHERE postid = :postid ORDER BY createdCom DESC');
        $req->bindValue(':postid', (int) $postid);
        $req->execute();
        $listsComments = $req->fetchAll(\PDO::FETCH_CLASS, "Julien\Models\Entity\Comment");
        $req->closeCursor();
        return $listsComments;
    }




}