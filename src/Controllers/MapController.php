<?php

namespace Julien\Controllers;

use Julien\Models\Manager\NewsManager;

class MapController extends Controller
{
    public function midtown()
    {
        
        
        echo $this->twig->render('districts/midtown.twig');
    }
    public function central()
    {
        
        
        echo $this->twig->render('districts/central.twig');
    }
    public function financial()
    {
        
        
        echo $this->twig->render('districts/financial.twig');
    }
    public function brooklyn()
    {
        
        
        echo $this->twig->render('districts/brooklyn.twig');
    }
}