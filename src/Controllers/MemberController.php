<?php

namespace Julien\Controllers;

use Julien\Models\Manager\MemberManager;

class MemberController extends Controller

{
    public function connexion()
    {
        echo $this->twig->render('connexion.twig');

    }


    public function login($pseudo, $password)
    {
        if (!empty($pseudo) && !empty($password)) {
        $logManager = new MemberManager();
        $user = $logManager->getMember ($pseudo);
        if (password_verify ($password, $user['password'])) {
            $_SESSION['pseudo'] = $user[0];
            echo $this->twig->render('admin/administration.twig');
        } else {
            echo 'Le mot de passe est invalide.';
        }
        }
        else
        {
            echo('Tous les champs ne sont pas remplis !');
        }
    }

    public function logout ()
    {
        unset($_SESSION['pseudo']);
        header("Location: index.php?c=index&t=index");
        exit();
    }
}