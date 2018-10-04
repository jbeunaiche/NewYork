<?php

namespace Julien\Controllers;

use Julien\Models\Entity\News;
use Julien\Models\Entity\Monument;
use Julien\Models\Entity\Comment;
use Julien\Models\Manager\NewsManager;
use Julien\Models\Manager\MonumentManager;
use Julien\Models\Manager\CommentManager;
use Julien\Models\Manager;

/**
 * Class AdminController
 * @package Julien\Controllers
 */
class AdminController extends Controller
{

    /* Public function pour les News  */


    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function admin()
    {
        if (isset($_SESSION['pseudo'])) {
            echo $this->twig->render('admin/administration.twig');
        } else {
            echo "Accès interdit";
        }
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
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

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function addViewNews()
    {
        if (isset($_SESSION['pseudo'])) {
            echo $this->twig->render('admin/add-news.twig');
        } else {
            echo "Accès interdit";
        }
    }

    /**
     * @param $title
     * @param $content
     */
    public function addNews($title, $content)
    {

        if (isset($_SESSION['pseudo'])) {
            if (!empty($title) && !empty($content)) {
                $news = new News(
                    [
                        'title' => $title,
                        'content' => $content
                    ]
                );
                $newsmanager = new NewsManager();
                $newsmanager->add($news);
                if ($newsmanager === false) {
                    echo('Impossible d\'ajouter l\'article!');
                } else {
                    header("Location: index.php?c=admin&t=listNews");

                }
            } else {
                echo('Tous les champs ne sont pas remplis !');
            }
        } else {
            echo "Accès interdit";
        }
    }

    /**
     *
     */
    public function deleteNews()
    {
        $news = new News($_GET);
        $newsmanager = new NewsManager();
        $newsmanager->delete($news);
        if ($newsmanager === false) {
            echo('Impossible de supprimer');
        } else {
            header("Location:" . $_SERVER['HTTP_REFERER'] . "");
        }
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
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

    /**
     * @param $title
     * @param $content
     * @param $id
     */
    public function editNews($title, $content, $id)
    {
        if (isset($_SESSION['pseudo'])) {
            if (!empty($title) && !empty($content)) {
                $news = new News([

                    'title' => $title,
                    'content' => $content,
                    'id' => $id

                ]);
                $newsmanager = new NewsManager();
                $newsmanager->edit($news);

            if ($newsmanager === false) {
                echo('Impossible d\'ajouter l\'article!');
            } else {

                header("Location: index.php?c=admin&t=listNews");

            }
            }
            else
                {
                    echo('Tous les champs ne sont pas remplis !');
                }
        } else {
            echo "Accès interdit";
        }
    }

    /* Public function pour les monuments  */

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
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

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function addViewMonument()
    {
        if (isset($_SESSION['pseudo'])) {
            echo $this->twig->render('admin/add-monument.twig');
        } else {
            echo "Accès interdit";
        }

    }

    /**
     * @param $name
     * @param $description
     * @param $lat
     * @param $lon
     * @param $price
     */
    public function addMonument($name, $description, $lat, $lon, $price)

    {
        if (isset($_SESSION['pseudo'])) {
            if (!empty($name) && !empty($description)&& !empty($lat)&& !empty($lon)&& !empty($price)) {
        $monument = new Monument(
            [
                'name' => $name,
                'description' => $description,
                'lat' => $lat,
                'lon' => $lon,
                'price' => $price
            ]
        );

        $monumentmanager = new MonumentManager();
        $monumentmanager->addMonument($monument);
        if ($monumentmanager === false) {
            echo('Impossible d\'ajouter l\'article!');
        } else {

            header("Location: index.php?c=admin&t=list-monuments");
        }
            }
            else
            {
                echo('Tous les champs ne sont pas remplis !');
            }
        } else {
            echo "Accès interdit";
        }
    }

    /* Public function pour les commentaires   */

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
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

    /**
     *
     */
    public function signalCom()
    {
        $comment = new Comment($_GET);
        $commentmanager = new CommentManager();
        $commentmanager->signal($comment);
        if ($commentmanager === false) {
            echo('Erreur');
        } else {
            header("Location:" . $_SERVER['HTTP_REFERER'] . "");
        }
    }

    /**
     *
     */
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

    /**
     *
     */
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


/* Projet d'ajout de photo par article */

/* if( isset($_POST['upload']) ) // si formulaire soumis
        {
            $content_dir = 'newsimage/'; // dossier où sera déplacé le fichier
            $tmp_file = $_FILES['fichier']['tmp_name'];
            if( !is_uploaded_file($tmp_file) )
            {
                exit("Le fichier est introuvable");
            }
            // on vérifie maintenant l'extension
            $type_file = $_FILES['fichier']['type'];
            if( !strstr($type_file, 'JPG') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
            {
                exit("Le fichier n'est pas une newsimage");
            }
            // on copie le fichier dans le dossier de destination
            $name_file = $_FILES['fichier']['name'];
            if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
            {
                exit("Impossible de copier le fichier dans $content_dir");
            }
            echo "Le fichier a bien été uploadé";
        }
*/