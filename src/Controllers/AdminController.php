<?php

namespace Julien\Controllers;

use Julien\Models\Entity\News;
use Julien\Models\Entity\Monument;
use Julien\Models\Entity\Comment;
use Julien\Models\Manager\NewsManager;
use Julien\Models\Manager\MonumentManager;
use Julien\Models\Manager\CommentManager;
use Julien\Models\Manager\MemberManager;

class AdminController extends Controller
{

    /* Public function pour les News  */


    public function admin()
    {
        if (isset($_SESSION['pseudo'])) {
            echo $this->twig->render('admin/administration.twig');
        } else {
            echo "Accès interdit";
        }
    }

    public function listNews()
    {
        if (isset($_SESSION['pseudo'])) {
            $newsmanager = new NewsManager();
            $lists = $newsmanager->getList();

            echo $this->twig->render('admin/list-news.twig',
                [
                    'list' => $lists
                ]);
        } else {
            echo "Accès interdit";
        }
    }

    public function addViewNews()
    {
        if (isset($_SESSION['pseudo'])) {
            echo $this->twig->render('admin/add-news.twig');
        } else {
            echo "Accès interdit";
        }
    }

    public function addNews($title, $content)
    {
        if (isset($_SESSION['pseudo'])) {

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

                    echo $this->twig->render('admin/administration.twig');

                }

        } else {
            echo "Accès interdit";
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
        if (isset($_SESSION['pseudo'])) {

            $newsManager = new NewsManager();
            $news = $newsManager->getNews($_GET['id']);
            echo $this->twig->render('admin/edit-news.twig',
                [
                    'news' => $news
                ]);
        } else {
            echo "Accès interdit";
        }

    }

    public function editNews()
    {
        if (isset($_SESSION['pseudo'])) {

            $news = new News($_POST);
            $newsmanager = new NewsManager();
            $newsmanager->edit($news);
            if ($newsmanager === false) {
                throw new Exception('Impossible d\'ajouter l\'article!');
            } else {

                echo $this->twig->render('admin/administration.twig');

            }
        } else {
            echo "Accès interdit";
        }
    }

    /* Public function pour les monuments  */

    public function listMonument()
    {
        if (isset($_SESSION['pseudo'])) {
            $monumentsmanager = new MonumentManager();
            $lists = $monumentsmanager->getList();

            echo $this->twig->render('admin/list-monuments.twig',
                [
                    'list' => $lists
                ]);
        } else {
            echo "Accès interdit";
        }
    }

    public function addViewMonument()
    {
        if (isset($_SESSION['pseudo'])) {
            echo $this->twig->render('admin/add-monument.twig');
        } else {
            echo "Accès interdit";
        }

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

            echo $this->twig->render('admin/list-monuments.twig');
        }
    }

    /* Public function pour les commentaires   */

    public function listComments()
    {
        if (isset($_SESSION['pseudo'])) {
            $commentmanager = new CommentManager();
            $comment = $commentmanager->getSignaled();

            echo $this->twig->render('admin/comments.twig',
                [
                    'comment' => $comment,

                ]);
        } else {
            echo "Accès interdit";
        }

    }

    public function signalCom()
    {
        $comment = new Comment($_GET);
        $commentmanager = new CommentManager();
        $commentmanager->signal($comment);
        if ($commentmanager === false) {
            throw new Exception('Erreur');
        } else {
            header("Location:" . $_SERVER['HTTP_REFERER'] . "");
        }
    }

    public function deleteComment()
    {
        if (isset($_SESSION['pseudo'])) {
            $comment = new Comment($_GET);
            $commentmanager = new CommentManager();
            $commentmanager->delete($comment);
            if ($commentmanager === false) {
                throw new Exception('Impossible de supprimer');
            } else {
                header("Location:" . $_SERVER['HTTP_REFERER'] . "");
            }
        } else {
            echo "Accès interdit";
        }
    }

    public function change()
    {
        if (isset($_SESSION['pseudo'])) {
            $comment = new Comment($_GET);
            $commentmanager = new CommentManager();
            $commentmanager->change($comment);
            if ($commentmanager === false) {
                throw new Exception('Erreur');
            } else {
                header("Location:" . $_SERVER['HTTP_REFERER'] . "");
            }
        } else {
            echo "Accès interdit";
        }
    }


}