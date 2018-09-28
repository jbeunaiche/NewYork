<?php

namespace Julien\Models\Manager;

use Julien\Models\Manager;
use Julien\Models\Entity\News;
use Julien\Models\Entity\Comment;

/**
 * Class NewsManager
 * @package Julien\Models\Manager
 */
class NewsManager extends Manager

{
    /*
      public function getList()
         {
             $listNews = array();
             $i = 0;
             $req = ('SELECT a.id, a.title, a.content,  COUNT(b.newsid) AS nb  FROM news a LEFT JOIN comment b ON b.newsid = a.id   GROUP BY
         a.id ');
             $req = $this->getDb()->query($req);
             $req->setFetchMode(\PDO::FETCH_ASSOC);
             while ($news = $req->fetch())

             {

                 $comment = new Comment(['id' =>$news['nb']]);
                 $art = new News(['id' => $news['id'], 'title' => $news['title'], 'content' => $news['content'] , 'comments' => $comment ]);


                 $listPosts[$i++] = $art;
                 var_dump ($news['nb']);
                 var_dump ($news['title']);
             }



             $req->closeCursor();
             return $listNews;
         }
  */
    /**
     * @return mixed
     */
    public function getList()
        {

            $req = $this->_db->prepare('SELECT id, title, content, DATE_FORMAT(created, \'%d/%m/%Y à %Hh%imin%ss\') AS created FROM news ORDER BY id DESC ');

            $req->execute();
            $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, News::class);
            $post = $req->fetchAll();
            return $post;
        }


    /**
     * @param $id
     * @return mixed
     */
    public function getNews($id)
    {
        $req = $this->_db->prepare('SELECT id, title, content FROM news WHERE id = :id');
        $req->bindValue(':id', (int)$id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, News::class);
        $post = $req->fetch();
        return $post;

    }

    /**
     * @param News $news
     */
    public function add(News $news)
    {
        $req = $this->_db->prepare('INSERT INTO news(title,content, created) VALUES(:title, :content, NOW())');
        $req->bindValue(':title', $news->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':content', $news->getContent(), \PDO::PARAM_STR);
        $req->execute();
    }

    /**
     * @param News $news
     */
    public function delete(News $news)
    {
        $this->_db->exec('DELETE FROM news WHERE id = ' . $_GET['id']);
    }

    /**
     * @param News $news
     */
    public function edit(News $news)
    {
        $req = $this->_db->prepare('UPDATE news SET title = :title, content = :content WHERE id = :id');
        $req->bindValue(':title', $news->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':content', $news->getContent(), \PDO::PARAM_STR);
        $req->bindValue(':id', $news->getId(), \PDO::PARAM_INT);
        $req->execute();
    }


}