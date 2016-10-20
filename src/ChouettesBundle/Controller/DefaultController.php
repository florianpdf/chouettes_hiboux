<?php

namespace ChouettesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        // Recupération des données CITATIONS
        $citations=$em->getRepository('ChouettesBundle:Citation')->findAll();
        // Recupération des données MODELE par catégorie
        $modelesImages=$em->getRepository('ChouettesBundle:Categorie')->findAll();
        var_dump($modelesImages);

        // Mise en place random pour afficher aléatoirement les CITATIONS sur la page
        // d'accueil. Si aucune citation existe dans la base de données on renvoi comme contenu un chaine vide
        // Dans Default/index.html.twig
        if(!empty($citations)) {
            $randomcitation=$citations[array_rand($citations)];
            return $this->render('@Chouettes/Default/index.html.twig', array(
                'citation'=>$randomcitation->getText()
            ));
        }
        else {
            return $this->render('@Chouettes/Default/index.html.twig', array(
                'citation'=>''));
        }

        // Mise en place random pour afficher aléatoirement les PHOTOS CATEGORIES sur la page
        // d'accueil.
        // Dans Default/index.html.twig

        return $this->render('@Chouettes/Default/index.html.twig', array(
            'categorie'=>$modelesImages->getId()
        ));


    }


    public function doudousAction()
    {
        return $this->render('@Chouettes/user/doudous.html.twig');
    }

    public function bijouxAction()
    {
        return $this->render('@Chouettes/user/bijoux.html.twig');
    }

    public function accessoiresAction()
    {
        return $this->render('@Chouettes/user/accessoires.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('@Chouettes/user/about.html.twig');
    }

    public function contactAction()
    {
        return $this->render('@Chouettes/user/contact.html.twig');
    }
}
