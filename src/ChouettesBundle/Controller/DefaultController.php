<?php

namespace ChouettesBundle\Controller;

use ChouettesBundle\ChouettesBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        // Connexion à la BdD
        $em = $this->getDoctrine()->getManager();
        // Recupération des données CITATIONS
        $citations=$em->getRepository('ChouettesBundle:Citation')->findAll();
        // Recupération des données MODELE pour les images affichables sur la pages d'accueil
        $modeles=$em->getRepository('ChouettesBundle:Modele')->findBy(array('add_block' => true));

        // -----------------------------------------------------------------------------------------------------
        // Mise en place random pour afficher aléatoirement les CITATIONS sur la page
        // d'accueil. Si aucune citation existe dans la base de données on renvoi comme contenu un chaine vide
        // Dans Default/index.html.twig
        // -----------------------------------------------------------------------------------------------------
        if(!empty($citations)) {
            $randomcitation = $citations[array_rand($citations)]->getText();
        }
        else {
            $randomcitation = '';
        }

        // -----------------------------------------------------------------------------------------------------
        // Mise en place random pour afficher aléatoirement les PHOTOS par CATEGORIES sur la page
        // d'accueil.
        // -----------------------------------------------------------------------------------------------------
        // 1 - Bijoux
        // 2 - Doudous
        // 3 - Accessoires
        // Récuperation des champs contenus dans la variable $modeles

        // Initialisation des variables
        $bijoux = array();
        $doudou = array();
        $doudou2 = array();
        $accessoire = array();

        // Parcours de l'objet modeles
        foreach ($modeles as $modele){
            if($modele->getCategorie()->getNom()=='Bijoux')
            {
                $bijoux[] = $modele;
            }
            elseif ($modele->getCategorie()->getNom()=='Doudous')
            {
                $doudou[] = $modele;
            }
            else
                {
                $accessoire[] = $modele;
            }

        }

        $randomBijoux = $bijoux[array_rand($bijoux)];
        $randomDoudou = $doudou[array_rand($doudou)];
        $randomDoudou2 = $doudou[array_rand($doudou)];
        $randomAccessoire = $accessoire[array_rand($accessoire)];

        if($randomDoudou == $randomDoudou) {
            $randomDoudou2 = $doudou[array_rand($doudou)];
        }

        // -----------------------------------------------------------------------------------------------------
        // retourne citation et image dans Default/index.html.twig
        // -----------------------------------------------------------------------------------------------------
        return $this->render('@Chouettes/Default/index.html.twig', array(
            'bijoux' => $randomBijoux,
            'doudous' => $randomDoudou,
            'doudous2' => $randomDoudou2,
            'accessoire' =>$randomAccessoire,
            'citation'=> $randomcitation
        ));
    }


    public function doudousAction()
    {
        $em = $this->getDoctrine()->getManager();
        $modeles=$em->getRepository("ChouettesBundle:Modele")->findBy(array('categorie' => 2));
        return $this->render('@Chouettes/user/doudous.html.twig', array(
            'modeles'=>$modeles
        ));
    }

    public function bijouxAction()
    {
        $em = $this->getDoctrine()->getManager();
        $modeles=$em->getRepository("ChouettesBundle:Modele")->findBy(array('categorie' => 1));
        return $this->render('@Chouettes/user/bijoux.html.twig', array(
            'modeles'=>$modeles
        ));
    }

    public function accessoiresAction()
    {
        $em = $this->getDoctrine()->getManager();
        $modeles=$em->getRepository("ChouettesBundle:Modele")->findBy(array('categorie' => 3));
        return $this->render('@Chouettes/user/accessoires.html.twig', array(
            'modeles'=>$modeles
        ));
    }

    public function aboutAction()
    {
        return $this->render('@Chouettes/user/about.html.twig');
    }

    public function contactAction()
    {
        return $this->render('@Chouettes/user/contact.html.twig');
    }

    public function adminAction()
    {
        return $this->render('@Chouettes/Admin/index.html.twig');
    }

}
