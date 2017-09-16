<?php

namespace ChouettesBundle\Controller;

use ChouettesBundle\Entity\Modele;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * Modele controller.
 *
 */
class ModeleController extends Controller
{


/**
 * Lists all Modele entities.
 *
 */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $modeles = $em->getRepository('ChouettesBundle:Modele')->findAll();

        return $this->render('@Chouettes/Admin/modele/index.html.twig', array(
            'modeles' => $modeles,
        ));
    }

/**
 * Creates a new Modele entity.
 *
 */
    public function newAction(Request $request)
    {
        $modele = new Modele();
        $form = $this->createForm('ChouettesBundle\Form\ModeleType', $modele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
// Tells Doctrine you want to (eventually) save the Product (no queries yet). It utilizes cached prepared statement to slightly improve the performance.
            $em->persist($modele);
// Actually executes the queries (i.e. the INSERT query).
            $em->flush();

            $picture = [
                'caption' => $_REQUEST['modele']['facebook_description'] . "\n \nRetrouvez nous sur https://www.chouetteshiboux.com/",
                'source' => $modele->getImage()->getAbsolutePath(),
            ];
            $this->get('app_core.facebook')->postPicture($picture);

	        $users = $em->getRepository('ChouettesBundle:Newsletter')->findAll();
            $from = $this->getParameter('mailer_user');

            foreach ($users as $user){
                $message = \Swift_Message::newInstance()
                    ->setSubject('Les news de Chouettes Hiboux')
                    ->setFrom(array($from => 'ChouettesHiboux'))
                    ->setTo($user->getEmail())
                    ->setBody(
                        $this->renderView(
                            '@Chouettes/user/newsletter.html.twig',
                            array(
                                'modele' => $modele,
	                            'token' => $user->getToken()
                            )
                        ),
                        'text/html'
                    );
                $this->get('mailer')->send($message);
            }

            return $this->redirectToRoute('modele_index', array('id' => $modele->getId()));
        }

        return $this->render('@Chouettes/Admin/modele/new.html.twig', array(
            'modele' => $modele,
            'form' => $form->createView(),
        ));
    }

/**
 * Displays a form to edit an existing Modele entity.
 *
 */
    public function editAction(Request $request, Modele $modele)
    {
        $em = $this->getDoctrine()->getManager();
        $image = $em->getRepository('ChouettesBundle:Image')->findOneById($modele->getImage()->getId());
        $editForm = $this->createForm('ChouettesBundle\Form\ModeleType', $modele);
        $editForm->handleRequest($request);


        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $image->preUpload();
            $em->persist($modele);
            $em->flush();

            return $this->redirectToRoute('modele_index', array('id' => $modele->getId()));
        }

        return $this->render('@Chouettes/Admin/modele/edit.html.twig', array(
            'modele' => $modele,
            'edit_form' => $editForm->createView(),
        ));
    }

/**
 * Deletes a Modele entity.
 *
 */

    public function deleteAction($id)
    {
        if ($id) {
            $em = $this->getDoctrine()->getManager();
// Recherche LE MODELE à supprimer parmi LES MODELES
            $modele = $em->getRepository('ChouettesBundle:Modele')->findOneById($id);
// Recherche L'IMAGE DU MODELE visé
            $image = $em->getRepository('ChouettesBundle:Image')->findOneById($modele->getImage()->getId());
// Supprime LE MODELE et SON IMAGE associée
            $em->remove($modele);
            $em->remove($image);
// Envoie la requête à la BDD
            $em->flush();

            return $this->redirectToRoute('modele_index');
        } else
            return $this->redirectToRoute('modele_index');

    }
}


