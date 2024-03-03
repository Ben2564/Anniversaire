<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/creer-compte", name="creer_Compte")
     */
    public function creerCompte(): Response
    {
        return $this->render('home/creerCompte.html.twig');
    }

    /**
     * @Route("/se-connecter", name="se_Connecter")
     */
    public function seConnecter(): Response
    {
        return $this->render('home/seConnecter.html.twig');
    }

    /**
     * @Route("/connecter", name="valider_se_connecter")
     */
    public function validerSeConnecter(): Response
    {
        return $this->render('home/connecter.html.twig');
    }

    /**
     * @Route("/", name="valider_creer_compte")
     */
    public function validerCreerCompte(): Response
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/anniversaire", name="afficher_tout")
     */
    public function listAnniv(): Response
    {
        return $this->render('anniversaire/index.html.twig');
    }
}
