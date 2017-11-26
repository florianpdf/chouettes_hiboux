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
	public function listAllUserAction(){
		$em = $this->getDoctrine()->getManager();
		$users = $em->getRepository(Newsletter::class)->findAll();
		return $this->render('@Chouettes/Admin/newsletter/listAllUser.html.twig', array(
			'users' => $users
		));
	}

	public function deleteUserAction(Newsletter $newsletter){
		$em = $this->getDoctrine()->getManager();
		$em->remove($newsletter);
		$em->flush();

		return $this->redirectToRoute('show_all_users');
	}

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
	    $em->flush();

	    return $this->render('ChouettesBundle:user:newsletterUnscribe.html.twig');
    }

}
