<?php

namespace Julien\Controllers;

use Julien\Models\Manager\MonumentManager;
use Julien\Models\Manager\NewsManager;

/**
 * Class MapController
 * @package Julien\Controllers
 */
class MapController extends Controller
{
    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function midtown()
    {

        echo $this->twig->render('districts/midtown.twig');
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function central()
    {

        echo $this->twig->render('districts/central.twig');
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function financial()
    {

        echo $this->twig->render('districts/financial.twig');
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function brooklyn()
    {

        echo $this->twig->render('districts/brooklyn.twig');
    }

    /**
     *
     */
    public function getMonument()
    {
        $monumentmanager = new MonumentManager();
        $liste = $monumentmanager->getMonument();
        $json = json_encode($liste);
        echo $json;

    }
}