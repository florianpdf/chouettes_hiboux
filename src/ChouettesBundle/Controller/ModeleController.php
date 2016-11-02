<?php

namespace ChouettesBundle\Controller;

use ChouettesBundle\Entity\Image;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ChouettesBundle\Entity\Modele;
use ChouettesBundle\Form\ModeleType;

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
            $em->persist($modele);
            $em->flush();

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
        $em = $this->getDoctrine()->getEntityManager();
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
            $em = $this->getDoctrine()->getEntityManager();
            $modele = $em->getRepository('ChouettesBundle:Modele')->findOneById($id);
            $image = $em->getRepository('ChouettesBundle:Image')->findOneById($modele->getImage()->getId());
            $em->remove($modele);
            $em->remove($image);
            $em->flush();

            return $this->redirectToRoute('modele_index');
        } else
            return $this->redirectToRoute('modele_index');

    }
}


