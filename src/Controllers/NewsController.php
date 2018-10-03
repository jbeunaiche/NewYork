<?php

namespace Julien\Controllers;


use Julien\Models\Entity\News;
use Julien\Models\Manager\NewsManager;
use Julien\Models\Manager\CommentManager;
use Julien\Models\Entity\Comment;

/**
 * Class NewsController
 * @package Julien\Controllers
 */
class NewsController extends Controller
{
    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
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

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function list()
    {
        $newsmanager = new NewsManager();
        $lists = $newsmanager->getList();

        echo $this->twig->render('news.twig',
            [
                'list' => $lists
            ]);
    }

    /**
     * @param $author
     * @param $comment
     * @param $newsid
     */
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

        $commentmanager = new CommentManager();
        $comment-> setNews($news);
        $commentmanager->addComment($comment);

        if ($commentmanager === false)
        {
            echo ('Impossible d\'ajouter l\'article!');
        }
        else
        {

           header("Location:" . $_SERVER['HTTP_REFERER'] . "");

        }
    }


}
