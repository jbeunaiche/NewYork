<?php

namespace Julien\Controllers;

use Julien\Models\Entity\News;
use Julien\Models\Manager\NewsManager;
use Julien\Models\Manager\CommentManager;

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

    public function addComment($varComment)
    {
        $newsManager    = new NewsManager();
        $news = new News(['id' => $_POST['postid']]);
        $comment        = new Comment(
            [
                'author' => $author,
                'comment' => $comment
            ]
        );
        $commentmanager = new CommentManager();
        $comment-> setNews($news);
        $commentmanager->addComment($comment);

        if ($commentmanager === false)
        {
            throw new Exception('Impossible d\'ajouter l\'article!');
        }
        else
        {
            //$_SESSION['flash'] = 'Commentaire ajouté';
            header("Location:" . $_SERVER['HTTP_REFERER'] . "");
            //exit();
        }
    }
}
