<?php

namespace Julien\Models\Manager;

use Julien\Models\Manager;
use Julien\Models\Entity\Comment;
use Julien\Models\Entity\News;

class CommentManager extends Manager
{

    public function getComments($postid)
    {
        $req = $this->_db->prepare('SELECT id, postid, author, comment, DATE_FORMAT(createdCom, \'%d/%m/%Y à %Hh%imin%ss\') AS createdCom  FROM comment WHERE postid = :postid ORDER BY createdCom DESC');
        $req->bindValue(':postid', (int)$postid);
        $req->execute();
        $listsComments = $req->fetchAll(\PDO::FETCH_CLASS, "Julien\Models\Entity\Comment");
        $req->closeCursor();
        return $listsComments;
    }

    public function addComment(Comment $comment)
    {

        $req = $this->_db->prepare('INSERT INTO comment (postid, author, comment, createdCom) VALUES(:postid, :author, :comment, NOW())');
        $req->bindValue(':author', $comment->getAuthor(), \PDO::PARAM_STR);
        $req->bindValue(':comment', $comment->getComment(), \PDO::PARAM_STR);
        $req->bindValue(':postid', $comment->getNews()->getId(), \PDO::PARAM_INT);
        $req->execute();



    }

    public function getSignaled()
    {
        $signaledList = array();
        $req = $this->_db->query('SELECT comment.*, news.title FROM comment LEFT JOIN post ON comment.postid = post.id WHERE status > 0');
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


}