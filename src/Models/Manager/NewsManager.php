<?php

namespace Julien\Models\Manager;

use Julien\Models\Manager;
use Julien\Models\Entity\News;

class NewsManager extends Manager

{

    public function getList()
    {

        $req = $this->_db->prepare('SELECT id, title, content FROM news ');

        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, News::class);
        $post = $req->fetchAll();
        return $post;
    }

    public function getPost($id)
    {
        $req = $this->_db->prepare('SELECT id, title, content FROM news WHERE id = :id');
        $req->bindValue(':id', (int)$id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, News::class);
        $post = $req->fetch();
        return $post;

    }


}