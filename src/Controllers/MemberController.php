<?php

namespace Julien\Controllers;

use Julien\Models\Manager\MemberManager;

/**
 * Class MemberController
 * @package Julien\Controllers
 */
class MemberController extends Controller

{
    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function connexion()
    {
        echo $this->twig->render('connexion.twig');

    }


    /**
     * @param $pseudo
     * @param $password
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function login($pseudo, $password)
    {
        if (!empty($pseudo) && !empty($password)) {
        $logManager = new MemberManager();
        $user = $logManager->getMember ($pseudo);
        if (password_verify ($password, $user['password'])) {
            $_SESSION['pseudo'] = $user[0];
            //echo $this->twig->render('admin/administration.twig');
            header("Location: index.php?c=admin&t=admin");
        } else {
            echo 'Le mot de passe est invalide.';
        }
        }
        else
        {
            echo('Tous les champs ne sont pas remplis !');
        }
    }

    /**
     *
     */
    public function logout ()
    {
        unset($_SESSION['pseudo']);
        header("Location: index.php?c=index&t=index");
        exit();
    }
}