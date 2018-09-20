<?php

namespace Julien\Controllers;

use Julien\Models\Manager\MemberManager;

class MemberController extends Controller

{
    public function connexion()
    {
        echo $this->twig->render('connexion.twig');

    }

    public function login ($pseudo, $password)
    {


        $logManager = new MemberManager();
        $user = $logManager->getMember ($pseudo);
       // var_dump($user);
        if (password_verify ($password, $user->password())) {
            $_SESSION['pseudo'] = $user->pseudo();

           echo $this->twig->render('home.twig');
        } else {
            echo 'Le mot de passe est invalide.';
        }
    }
}