<?php

namespace ChouettesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ChouettesBundle\Entity\Citation;
use ChouettesBundle\Form\CitationType;

/**
 * Citation controller.
 *
 */
class CitationController extends Controller
{


/**
 * Lists all Citation entities.
 *
 */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $citations = $em->getRepository('ChouettesBundle:Citation')->findAll();

        return $this->render('@Chouettes/Admin/citation/index.html.twig', array(
            'citations' => $citations,
        ));
    }


/**
 * Creates a new Citation entity.
 *
 */
    public function newAction(Request $request)
    {
        $citation = new Citation();
        $form = $this->createForm('ChouettesBundle\Form\CitationType', $citation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($citation);
            $em->flush();

            return $this->redirectToRoute('citation_index', array('id' => $citation->getId()));
        }

        return $this->render('@Chouettes/Admin/citation/new.html.twig', array(
            'citation' => $citation,
            'form' => $form->createView(),
        ));
    }


/**
 * Displays a form to edit an existing Citation entity.
 *
 */
    public function editAction(Request $request, Citation $citation)
    {
        $deleteForm = $this->createDeleteForm($citation);
        $editForm = $this->createForm('ChouettesBundle\Form\CitationType', $citation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($citation);
            $em->flush();

            return $this->redirectToRoute('citation_index', array('id' => $citation->getId()));
        }

        return $this->render('@Chouettes/Admin/citation/edit.html.twig', array(
            'citation' => $citation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


/**
 * Deletes a Citation entity.
 *
 */
    public function deleteAction($id)
    {
        if ($id) {
            $em = $this->getDoctrine()->getEntityManager();
            $citation = $em->getRepository('ChouettesBundle:Citation')->findOneById($id);
            $em->remove($citation);
            $em->flush();

            return $this->redirectToRoute('citation_index');
        } else
            return $this->redirectToRoute('citation_index');
    }


/**
 * Creates a form to delete a Citation entity.
 *
 * @param Citation $citation The Citation entity
 *
 * @return \Symfony\Component\Form\Form The form
 */
    private function createDeleteForm(Citation $citation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('citation_delete', array('id' => $citation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
