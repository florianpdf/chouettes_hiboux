<?php

namespace ChouettesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Chouettes/Default/index.html.twig');
    }
}
