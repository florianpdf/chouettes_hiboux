<?php

namespace ChouettesBundle\Controller;

use Doctrine\DBAL\Types\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

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

    public function sendAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $emails = $em->getRepository('@Chouettes/user/contact.html.twig')->findAll();
        foreach ($emails as $email){
            $mail_ch = $email->getEmailcontact();
        }
        $name = $request->request->get('nom');
        $mail = $request->request->get('email');
        $sujet = $request->request->get('sujet');
        $message = $request->request->get('message');
        $message = \Swift_Message::newInstance()
            ->setSubject('Contact Chouettes')
            ->setFrom($mail)
            ->setTo($mail_ch)
            ->setBody(
                $this->renderView(
                    '@Chouettes/user/contact.html.twig',
                    array(
                        'nom' => $name,
                        'email' => $mail,
                        'sujet' => $sujet,
                        'message' => $message
                    )
                ),
                'text/html'
            )
        ;
        $this->get('mailer')->send($message);
        return $this->render('@Chouettes/user/contact.html.twig');
    }


}
