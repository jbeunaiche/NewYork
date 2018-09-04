<?php

namespace Julien\Controllers;

use Julien\Models\Manager\NewsManager;

class NewsController extends Controller
{
    public function index()
    {
        echo "Test !";
    }
    
    public function list()
    {
    
        $newsmanager = new NewsManager();
        $lists = $newsmanager->getList();
        
        echo $this->twig->render('list.twig',
                                [
                                    'list' => $lists
                                ]);
    }
        
}