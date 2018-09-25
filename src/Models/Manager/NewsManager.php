<?php

namespace Julien\Models\Manager;

use Julien\Models\Manager;
use Julien\Models\Entity\News;

class NewsManager extends Manager

{

    public function getList()
    {

        $req = $this->_db->prepare('SELECT id, title, content FROM news ORDER BY id DESC ');

        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, News::class);
        $post = $req->fetchAll();
        return $post;
    }

    public function getNews($id)
    {
        $req = $this->_db->prepare('SELECT id, title, content FROM news WHERE id = :id');
        $req->bindValue(':id', (int)$id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, News::class);
        $post = $req->fetch();
        return $post;

    }

    public function add(News $news)
    {
        $req = $this->_db->prepare('INSERT INTO news(title,content) VALUES(:title, :content)');
        $req->bindValue(':title', $news->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':content', $news->getContent(), \PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(News $news)
    {
        $this->_db->exec('DELETE FROM news WHERE id = ' . $_GET['id']);
    }

    public function edit(News $news)
    {
        $req = $this->_db->prepare('UPDATE news SET title = :title, content = :content WHERE id = :id');
        $req->bindValue(':title', $news->getTitle() , \PDO::PARAM_STR);
        $req->bindValue(':content', $news->getContent() , \PDO::PARAM_STR);
        $req->bindValue(':id', $news->getId() , \PDO::PARAM_INT);
        $req->execute();
    }


}