<?php

namespace Cocina\ComprasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cocina\ComprasBundle\Entity\Proveedores;
use Cocina\ComprasBundle\Form\ProveedoresType;

/**
 * Proveedores controller.
 *
 */
class ProveedoresController extends Controller
{
    /**
     * Lists all Proveedores entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

/*
 * Utilizamos el paginador ideup
 */
        $paginador=$this->get('ideup.simple_paginator');
        $paginador->setItemsPerPage(10);
        $paginador->setMaxPagerItems(5);

        $entities=$paginador->paginate(
        	$em->getRepository('ComprasBundle:Proveedores')->findTodosLosProveedores())
        	->getResult();

         return $this->render('ComprasBundle:proveedores:index.html.twig', array(
             'proveedores' => $entities,
         ));		
    }

    /**
     * Creates a new Proveedores entity.
     *
     */
    public function newAction(Request $request)
    {
        $proveedore = new Proveedores();
        $form = $this->createForm('Cocina\ComprasBundle\Form\ProveedoresType', $proveedore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proveedore);
            $em->flush();

            return $this->redirectToRoute('proveedores_show', array('id' => $proveedore->getId()));
        }

        return $this->render('ComprasBundle:proveedores:new.html.twig', array(
            'proveedore' => $proveedore,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Proveedores entity.
     *
     */
    public function showAction(Proveedores $proveedore)
    {
        $deleteForm = $this->createDeleteForm($proveedore);
        $em=$this->getDoctrine()->getManager();
        $productos=$em->getRepository('ComprasBundle:Proveedores')->findProductosDeProveedor($proveedore->getId())->getResult();

        return $this->render('ComprasBundle:proveedores:show.html.twig', array(
            'proveedore' => $proveedore,
            'delete_form' => $deleteForm->createView(),
        	'productos' =>$productos	
        ));
    }

    /**
     * Displays a form to edit an existing Proveedores entity.
     *
     */
    public function editAction(Request $request, Proveedores $proveedore)
    {
        $deleteForm = $this->createDeleteForm($proveedore);
        $editForm = $this->createForm('Cocina\ComprasBundle\Form\ProveedoresType', $proveedore);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proveedore);
            $em->flush();

            return $this->redirectToRoute('proveedores_edit', array('id' => $proveedore->getId()));
        }

        return $this->render('ComprasBundle:proveedores:edit.html.twig', array(
            'proveedore' => $proveedore,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Proveedores entity.
     *
     */
    public function deleteAction(Request $request, Proveedores $proveedore)
    {
        $form = $this->createDeleteForm($proveedore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proveedore);
            $em->flush();
        }

        return $this->redirectToRoute('proveedores_index');
    }

    /**
     * Creates a form to delete a Proveedores entity.
     *
     * @param Proveedores $proveedore The Proveedores entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Proveedores $proveedore)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proveedores_delete', array('id' => $proveedore->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
