<?php

namespace ChouettesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $citations=$em->getRepository('ChouettesBundle:Citation')->findAll();
        $randomcitation=$citations[array_rand($citations)];
        return $this->render('@Chouettes/Default/index.html.twig', array(
            'citation'=>$randomcitation
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

    public function adminAction()
    {
        return $this->render('@Chouettes/Admin/index.html.twig');
    }

}
