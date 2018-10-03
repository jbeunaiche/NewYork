<?php

namespace Julien\Models\Manager;

use Julien\Models\Manager;
use Julien\Models\Entity\Comment;
use Julien\Models\Entity\News;

/**
 * Class CommentManager
 * @package Julien\Models\Manager
 */
class CommentManager extends Manager
{

    /**
     * @param $newsid
     * @return mixed
     */
    public function getComments($newsid)
    {
        $req = $this->_db->prepare('SELECT id, newsid, author, comment, DATE_FORMAT(createdCom, \'%d/%m/%Y à %Hh%imin%ss\') AS createdCom  FROM comment WHERE newsid = :newsid AND status = 0 ORDER BY createdCom DESC ');
        $req->bindValue(':newsid', (int)$newsid);
        $req->execute();
        $listsComments = $req->fetchAll(\PDO::FETCH_CLASS, "Julien\Models\Entity\Comment");
        $req->closeCursor();
        return $listsComments;
    }

    /**
     * @param Comment $comment
     */
    public function addComment(Comment $comment)
    {

        $req = $this->_db->prepare('INSERT INTO comment (newsid, author, comment, createdCom) VALUES(:newsid, :author, :comment, NOW())');
        $req->bindValue(':author', $comment->getAuthor(), \PDO::PARAM_STR);
        $req->bindValue(':comment', $comment->getComment(), \PDO::PARAM_STR);
        $req->bindValue(':newsid', $comment->getNews()->getId(), \PDO::PARAM_INT);
        $req->execute();



    }

    /**
     * @param $comment
     */
    public function signal($comment)
    {
        $req = $this->_db->prepare('UPDATE comment SET status = 1  WHERE id = :id ');
        $req->bindValue(':id', (int) $comment->getId());
        $req->execute();
    }

    /**
     * @return array
     */
    public function getSignaled()
    {
        $signaledList = array();
        $req = $this->_db->query('SELECT comment.*, news.title FROM comment LEFT JOIN news ON comment.newsid = news.id WHERE status > 0');
        $i = 0;
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        while ($comment = $req->fetch()) {
            $news = new News(['id' => $comment['id'], 'title' => $comment['title']]);
            $com = new Comment(['author' => $comment['author'], 'comment' => $comment['comment'], 'createdCom' => $comment['createdCom'], 'status' => $comment['status'], 'news' => $news]);
            $signaledList[$i++] = $com;

        }
        $req->closeCursor();
        return $signaledList;

    }

    /**
     * @param Comment $comment
     */
    public function delete(Comment $comment)
    {
        $this->_db->exec('DELETE FROM comment WHERE id = ' . $_GET['id']);
    }

    /**
     * @param $comment
     */
    public function change($comment)
    {
        $req = $this->_db->prepare('UPDATE comment SET status = 0  WHERE id = :id ');
        $req->bindValue(':id', (int) $comment->getId());
        $req->execute();
    }


}