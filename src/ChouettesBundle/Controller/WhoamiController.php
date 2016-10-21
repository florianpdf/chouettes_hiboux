<?php

namespace ChouettesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ChouettesBundle\Entity\Whoami;
use ChouettesBundle\Form\WhoamiType;

/**
 * Whoami controller.
 *
 */
class WhoamiController extends Controller
{
    /**
     * Lists all Whoami entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $whoamis = $em->getRepository('ChouettesBundle:Whoami')->findAll();

        return $this->render('@Chouettes/Admin/whoami/index.html.twig', array(
            'whoamis' => $whoamis,
        ));
    }

    /**
     * Creates a new Whoami entity.
     *
     */
    public function newAction(Request $request)
    {
        $whoami = new Whoami();
        $form = $this->createForm('ChouettesBundle\Form\WhoamiType', $whoami);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($whoami);
            $em->flush();

            return $this->redirectToRoute('whoami_index', array('id' => $whoami->getId()));
        }

        return $this->render('@Chouettes/Admin/whoami/new.html.twig', array(
            'whoami' => $whoami,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Whoami entity.
     *
     */
    public function showAction(Whoami $whoami)
    {
        $deleteForm = $this->createDeleteForm($whoami);

        return $this->render('@Chouettes/Admin/whoami/show.html.twig', array(
            'whoami' => $whoami,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Whoami entity.
     *
     */
    public function editAction(Request $request, Whoami $whoami)
    {
        $deleteForm = $this->createDeleteForm($whoami);
        $editForm = $this->createForm('ChouettesBundle\Form\WhoamiType', $whoami);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($whoami);
            $em->flush();

            return $this->redirectToRoute('whoami_edit', array('id' => $whoami->getId()));
        }

        return $this->render('@Chouettes/Admin/whoami/edit.html.twig', array(
            'whoami' => $whoami,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Whoami entity.
     *
     */
    public function deleteAction(Request $request, Whoami $whoami)
    {
        $form = $this->createDeleteForm($whoami);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($whoami);
            $em->flush();
        }

        return $this->redirectToRoute('whoami_index');
    }

    /**
     * Creates a form to delete a Whoami entity.
     *
     * @param Whoami $whoami The Whoami entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Whoami $whoami)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('whoami_delete', array('id' => $whoami->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
