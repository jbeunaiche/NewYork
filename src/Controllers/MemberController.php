<?php

namespace Julien\Controllers;

use Julien\Models\Manager\MemberManager;

class MemberController extends Controller
    
{
    public function logout ()
    {
        unset($_SESSION['pseudo']);
        $_SESSION['flash'] = 'Vous avez été déconnecté';
        header ('Location: index.php');
        exit();
    }

    public function login ($pseudo, $password)
    {
        if (isset($_POST['login'])) {
            
        }
        $logManager = new MemberManager();
        $user = $logManager->getMember ($pseudo);
        if (password_verify ($password, $user['password'])) {
            $_SESSION['pseudo'] = $user[0];
            echo $this->twig->render('home.twig');
        } else {
            echo 'Le mot de passe est invalide.';
        }
    }

    public function connexion ()
    {
        echo $this->twig->render('connexion.twig');

    }
   
}