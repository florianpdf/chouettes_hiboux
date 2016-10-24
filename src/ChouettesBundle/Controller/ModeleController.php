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
     * Finds and displays a Modele entity.
     *
     */
    public function showAction(Modele $modele)
    {
//        $deleteForm = $this->createDeleteForm($modele);

        print_r($modele);

        return $this->render('@Chouettes/Admin/modele/show.html.twig', array(
            'modele' => $modele,
//            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Modele entity.
     *
     */
    public function editAction(Request $request, Modele $modele)
    {
//        $deleteForm = $this->createDeleteForm($modele);
        $editForm = $this->createForm('ChouettesBundle\Form\ModeleType', $modele);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();

            return $this->redirectToRoute('modele_edit', array('id' => $modele->getId()));
        }

        return $this->render('@Chouettes/Admin/modele/edit.html.twig', array(
            'modele' => $modele,
            'edit_form' => $editForm->createView(),
//            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction($id)
    {
        if ($id){
            $em = $this->getDoctrine()->getEntityManager();
            $modele = $em->getRepository('ChouettesBundle:Modele')->findOneById($id);
            $image = $em->getRepository('ChouettesBundle:Image')->findOneById($modele->getImage()->getId());
            $em->remove($modele);
            $em->remove($image);
            $em->flush();

            return $this->redirectToRoute('modele_index');
        }
        else
            return $this->redirectToRoute('modele_index');


    }
//    /**
//     * Deletes a Modele entity.
//     *
//     */
//    public function deleteAction(Request $request, Modele $modele)
//    {
//        $form = $this->createDeleteForm($modele);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($modele);
//            $em->flush();
//        }
//
//        return $this->redirectToRoute('modele_index');
//    }
//
//    /**
//     * Creates a form to delete a Modele entity.
//     *
//     * @param Modele $modele The Modele entity
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createDeleteForm(Modele $modele)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('modele_delete', array('id' => $modele->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }
}
