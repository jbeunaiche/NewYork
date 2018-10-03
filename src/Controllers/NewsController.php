<?php

namespace Julien\Controllers;


use Julien\Models\Entity\News;
use Julien\Models\Manager\NewsManager;
use Julien\Models\Manager\CommentManager;
use Julien\Models\Entity\Comment;

class NewsController extends Controller
{
    public function single()
    {
        $newsmanager = new NewsManager();
        $single = $newsmanager->getNews($_GET['id']);
        $commentManager = new CommentManager();
        $comment = $commentManager->getComments($_GET['id']);

        echo $this->twig->render('singlenews.twig',
            [
                'comments' => $comment,
                'single' => $single
            ]);

    }

    public function addComment($author, $comment, $newsid)
    {
        $newsManager    = new NewsManager();
        $news = new News(['id' => $newsid]);
        $comment        = new Comment(
            [
                'author' => $author,
                'comment' => $comment,
                'news' => $newsid

            ]
        );
        var_dump($comment);
        $commentmanager = new CommentManager();
        $comment-> setNews($news);
        $commentmanager->addComment($comment);

        if ($commentmanager === false)
        {
            throw new Exception('Impossible d\'ajouter l\'article!');
        }
        else
        {

           // header("Location:" . $_SERVER['HTTP_REFERER'] . "");

        }
    }
}
