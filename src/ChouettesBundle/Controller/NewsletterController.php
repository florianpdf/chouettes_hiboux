<?php

namespace ChouettesBundle\Controller;

use ChouettesBundle\Entity\Newsletter;
use ChouettesBundle\Form\NewsletterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Newsletter controller.
 *
 */
class NewsletterController extends Controller
{
    public function inscriptionAction(Request $request){
        $user = new Newsletter();
        $form = $this->createForm(NewsletterType::class, $user);

        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
	        $user->setEmail($_POST['newsletter']['email']);
	        $user->setToken(sha1($user->getEmail()));
            $em->persist($user);
            $em->flush();

            return new JsonResponse(array('message' => 'Success!'), 200);
        }

        return $this->render('@Chouettes/user/newsletterForm.html.twig', array(
            'formNews' => $form->createView()
        ));
    }

    public function unscribeAction($token){
		$em = $this->getDoctrine()->getManager();
	    $user = $em->getRepository(Newsletter::class)->findOneByToken($token);
	    $em->remove($user);

	    return $this->render('ChouettesBundle:user:newsletterUnscribe.html.twig');
    }

}
