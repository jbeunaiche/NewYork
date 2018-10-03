<?php

namespace Julien\Controllers;

use Julien\Models\Manager\NewsManager;

/**
 * Class IndexController
 * @package Julien\Controllers
 */
class IndexController extends Controller
{

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        $newsmanager = new NewsManager();
        $newsPerPage = 4;
        // On compte le nombre total d'articles présents dans la bdd.
        $numberOfNews = $newsmanager->count();
        // Nombre de pages.
        $numberOfPages = ceil($numberOfNews / $newsPerPage);
        if(isset($_GET['page']) AND empty($_GET['page'])) {
            $currentPage = 1;
        } elseif(isset($_GET['page']) AND !empty($_GET['page'])) {
            $currentPage = intval($_GET['page']);
            if($currentPage > $numberOfPages) {
                $currentPage = $numberOfPages;
            }
        } else {
            $currentPage = 1;
        }
        $firstNews = ($currentPage - 1) * $newsPerPage;
        $lists = $newsmanager->getList($firstNews, $newsPerPage);

        echo $this->twig->render('home.twig',
            [
                'list' => $lists,
                'currentPage' => $currentPage,
                'numberOfPage' => $numberOfPages
            ]);
    }
}
