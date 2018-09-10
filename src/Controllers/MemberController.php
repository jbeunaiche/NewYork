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

    public function login ($pseudo, $password)
    {
        
        $logManager = new MemberManager();
        $user = $logManager->getMember ($pseudo);
        if (password_verify ($password, $user['password'])) {
            $_SESSION['pseudo'] = $user[0];
            echo $this->twig->render('admin.twig');
        } else {
            echo 'Le mot de passe est invalide.';
        }
    }
    
   
}