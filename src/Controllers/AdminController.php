<?php

namespace Julien\Controllers;

use Julien\Models\Entity\News;
use Julien\Models\Entity\Monument;
use Julien\Models\Manager\NewsManager;
use Julien\Models\Manager\MonumentManager;
use Julien\Models\Manager\CommentManager;

class AdminController extends Controller
{

    /* Public function pour les News  */


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

    public function addViewNews()
    {
        echo $this->twig->render('admin/add-news.twig');

    }

    public function addNews($title, $content)

    {
        $news = new News(
            [
                'title' => $title,
                'content' => $content
            ]
        );
        $newsmanager = new NewsManager();
        $newsmanager->add($news);
        if ($newsmanager === false) {
            throw new Exception('Impossible d\'ajouter l\'article!');
        } else {
            //$_SESSION['flash'] = 'Article ajouté';
            echo $this->twig->render('admin/administration.twig');

        }
    }

    public function deleteNews()
    {
        $news = new News($_GET);
        $newsmanager = new NewsManager();
        $newsmanager->delete($news);
        if ($newsmanager === false) {
            throw new Exception('Impossible de supprimer');
        } else {
            echo $this->twig->render('admin/administration.twig');
        }
    }

    public function editNewsView()
    {
        $newsManager = new NewsManager();
        $news        = $newsManager->getNews($_GET['id']);
        echo $this->twig->render('admin/edit-news.twig',
            [
                'news' => $news
            ]);

    }

    public function editNews()
    {
        $news = new News($_POST);
        $newsmanager = new NewsManager();
        $newsmanager->edit($news);
        if ($newsmanager === false) {
            throw new Exception('Impossible d\'ajouter l\'article!');
        } else {
            //$_SESSION['flash'] = 'Article ajouté';
            echo $this->twig->render('admin/administration.twig');

        }
    }

    /* Public function pour les monuments  */

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

    public function addMonument($name, $lat, $lon, $price)

    {

        $monument = new Monument(
            [
                'name' => $name,
                'lat' => $lat,
                'lon' => $lon,
                'price' => $price
            ]
        );

        $monumentmanager = new MonumentManager();
        $monumentmanager->addMonument($monument);
        if ($monumentmanager === false) {
            throw new Exception('Impossible d\'ajouter l\'article!');
        } else {
            //$_SESSION['flash'] = 'Article ajouté';
            echo $this->twig->render('admin/list-monuments.twig');

        }
    }

    public function listComments()
    {

        $commentmanager = new CommentManager($_GET);
        $comment = $commentmanager->getSignaled();

        echo $this->twig->render('admin/comments.twig',
            [
                'comments' => $comment,

            ]);
    }


}