<?php

namespace Julien\Controllers;

use Julien\Models\Manager\NewsManager;

class NewsController extends Controller
{
    public function single()
    {
        $newsmanager    = new NewsManager();
        $single           = $newsmanager->getPost($_GET['id']);
        
        echo $this->twig->render('singlenews.twig',
                                [
                                    'list' => $single
                                ]);

    }
}
