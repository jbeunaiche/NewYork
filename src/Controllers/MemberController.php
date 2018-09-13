<?php

namespace Julien\Controllers;

use Julien\Models\Manager\MemberManager;
use Julien\Tools\Recaptcha;

class MemberController extends Controller
    
{
    public function connexion ()
    {
        echo $this->twig->render('connexion.twig');

    }

    public function login ($params)
    {
        
        $logManager = new MemberManager();
        var_dump ($params);
        $user = $logManager->getMember ($params);

        if (password_verify ($password, $user->getPassword())) {
            $_SESSION['pseudo'] = $user->getPseudo();
            echo $this->twig->render('admin.twig');
        } else {
            echo 'Le mot de passe est invalide.';
        }
    }
    
   
}