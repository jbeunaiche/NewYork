<?php

namespace Julien\Controllers;

use Julien\Models\Entity\News;
use Julien\Models\Entity\Monument;
use Julien\Models\Manager\NewsManager;
use Julien\Models\Manager\MonumentManager;

class AdminController extends Controller
{

    public function admin()
    {
        echo $this->twig->render('admin/administration.twig');
    }

    public function listNews()
    {
        $newsmanager = new NewsManager();
        $lists = $newsmanager->getList();

        echo $this->twig->render('admin/list-news.twig',
            [
                'list' => $lists
            ]);
    }

    public function deleteNews()
    {
        $news        = new News($_GET);
        $newsmanager = new NewsManager();
        $newsmanager->delete($news);
        if ($newsmanager === false)
        {
            throw new Exception('Impossible de supprimer');
        }
        else
        {
            echo $this->twig->render('admin/administration.twig');
        }
    }

    public function listMonument()
    {
        $monumentsmanager = new MonumentManager();
        $lists = $monumentsmanager->getList();

        echo $this->twig->render('admin/list-monuments.twig',
            [
                'list' => $lists
            ]);
    }

    public function addViewMonument()
    {
        echo $this->twig->render('admin/add-monument.twig');

    }
    public function addMonument($params)
    {
        $monument        = new Monument($_POST);
        $monumentmanager = new MonumentManager();
        $monumentmanager->addMonument($params['name'],$params['lat'],$params['lon'],$params['price']);
        if ($monumentmanager === false)
        {
            throw new Exception('Impossible d\'ajouter l\'article!');
        }
        else
        {
            //$_SESSION['flash'] = 'Article ajouté';
            echo $this->twig->render('admin/list-monuments.twig');

        }
    }



}