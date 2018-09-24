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
        $single = $newsmanager->getPost($_GET['id']);
        $commentManager = new CommentManager();
        $comment        = $commentManager->getComments($_GET['id']);

        echo $this->twig->render('singlenews.twig',
            [
                'comments' => $comment,
                'single' => $single
            ]);

    }

    public function added()
    {
        echo $this->twig->render('districts/central.twig');

    }

    public function addPost()
    {
        $news        = new News($_POST);
        $newsmanager = new NewsManager();
        $newsmanager->add($news); // Méthode add
        if ($newsmanager === false)
        {
            throw new Exception('Impossible d\'ajouter l\'article!');
        }
        else
        {

            echo $this->twig->render('home.twig');

        }
    }
}
