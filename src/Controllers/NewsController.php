<?php

namespace Julien\Controllers;

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
}
