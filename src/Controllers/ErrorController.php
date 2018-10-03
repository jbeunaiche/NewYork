<?php

namespace Julien\Controllers;

class ErrorController extends Controller
{
    public function erreur()
    {

        echo $this->twig->render('erreur.twig');
    }
}