<?php

namespace Julien\Controllers;

use \Twig_Loader_Filesystem;
use \Twig_Environment;

class Controller
{
    protected $twig;

    function __construct()
    {

        // Twig Configuration
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../views/');
        $this->twig = new Twig_Environment($loader, array(
            'cache' => false,
            'debug' => true
        ));
        //
    }
}