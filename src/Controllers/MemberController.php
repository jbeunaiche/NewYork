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

    public function loginMember ($pseudo, $password)
    {
        if (isset($_POST['login'])) {
            if (isset($_POST['g-recaptcha-response'])) {
                $recaptcha = new Recaptcha();
                $resp = $recaptcha->verify ($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            } else {
                
                exit();
            }
        }
        $logManager = new MemberManager();
        $user = $logManager->getMember ($pseudo);
        if (password_verify ($password, $user['password'])) {
            $_SESSION['pseudo'] = $user[0];
            header ('Location: index.php?action=admin');
        } else {
            echo 'Le mot de passe est invalide.';
        }
    }

    public function login ()
    {
        echo $this->twig->render('connexion.twig');

    }
   
}