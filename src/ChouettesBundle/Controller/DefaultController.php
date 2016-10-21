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

//    public function messageAction()
//    {
//        require_once '/lib/swift_required.php';
//
//        // Create the Transport
//        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 25);
//
//        // Create the Mailer using your created Transport
//        $mailer = Swift_Mailer::newInstance($transport);
//
//        // Create a message
//        $message = Swift_Message::newInstance('Wonderful Subject')
//        ->setFrom(array('john@doe.com' => 'John Doe'))
//        ->setTo(array('receiver@domain.org', 'other@domain.org' => 'A name'))
//        ->setFirstName("Here is the sender's first name")
//        ->setLastName("Here is the sender's last name")
//        ->setEmail('Here is user email')
//        ->setBody('Here is the message itself')
//        ;
//
//        // Send the message
////        $result = $mailer->send($message);
//        $status = $mailer->send($message);
//        if($status) echo "Success!";
//        else echo "Failure";
//    }
//}

    public function adminAction()
    {
        return $this->render('@Chouettes/Admin/index.html.twig');
    }

}

