<?php

namespace Julien\Controllers;

use Julien\Models\Manager\MemberManager;
use Julien\Tools\Recaptcha;

class MemberController extends Controller

{
    public function connexion()
    {
        echo $this->twig->render('connexion.twig');

    }

    public function loginMember ($pseudo, $password)
    {
        if (isset($_POST['login'])) {
            if (isset($_POST['g-recaptcha-response'])) {
                $recaptcha = new Recaptcha();
                $resp = $recaptcha->verify ($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            } else {
                var_dump ($_POST);
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
}