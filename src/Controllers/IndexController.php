<?php

namespace Julien\Controllers;

use Julien\Models\Manager\NewsManager;

class IndexController extends Controller
{
    public function index()
    {
        $newsmanager = new NewsManager();
        $lists = $newsmanager->getList();
        
        echo $this->twig->render('home.twig',
                                [
                                    'list' => $lists
                                ]);
    }
}
