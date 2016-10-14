<?php

namespace Cocina\ComprasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cocina\ComprasBundle\Entity\Almacenes;
use Cocina\ComprasBundle\Form\AlmacenesType;

/**
 * Almacenes controller.
 *
 */
class AlmacenesController extends Controller
{
    /**
     * Lists all Almacenes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$almacenes = $em->getRepository('ComprasBundle:Almacenes')->findTodosLosAlmacenes()->getResult();
        
        $paginador=$this->get('ideup.simple_paginator');
        $paginador->setItemsPerPage(10);
        $paginador->setMaxPagerItems(5);
        
        $almacenes=$paginador->paginate($em->getRepository('ComprasBundle:Almacenes')->findTodosLosAlmacenes())->getResult();

        return $this->render('ComprasBundle:almacenes:index.html.twig', array(
            'almacenes' => $almacenes,
        ));
    }

    /**
     * Creates a new Almacenes entity.
     *
     */
    public function newAction(Request $request)
    {
        $almacene = new Almacenes();
        $form = $this->createForm('Cocina\ComprasBundle\Form\AlmacenesType', $almacene);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($almacene);
            $em->flush();

            return $this->redirectToRoute('almacenes_show', array('id' => $almacene->getId()));
        }

        return $this->render('ComprasBundle:almacenes:new.html.twig', array(
            'almacene' => $almacene,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Almacenes entity.
     *
     */
    public function showAction(Almacenes $almacene)
    {
        $deleteForm = $this->createDeleteForm($almacene);
        
        $em=$this->getDoctrine()->getManager();
        $productosInventario=$em->getRepository('ComprasBundle:Productos')->findProductosPorAlmacen($almacene->getId());

        return $this->render('ComprasBundle:almacenes:show.html.twig', array(
            'almacene' => $almacene,
            'delete_form' => $deleteForm->createView(),
        	'productosInventario'=> $productosInventario,
        ));
    }

    /**
     * Displays a form to edit an existing Almacenes entity.
     *
     */
    public function editAction(Request $request, Almacenes $almacene)
    {
        $deleteForm = $this->createDeleteForm($almacene);
        $editForm = $this->createForm('Cocina\ComprasBundle\Form\AlmacenesType', $almacene);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($almacene);
            $em->flush();

            return $this->redirectToRoute('almacenes_edit', array('id' => $almacene->getId()));
        }

        return $this->render('ComprasBundle:almacenes:edit.html.twig', array(
            'almacene' => $almacene,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Almacenes entity.
     *
     */
    public function deleteAction(Request $request, Almacenes $almacene)
    {
        $form = $this->createDeleteForm($almacene);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($almacene);
            $em->flush();
        }

        return $this->redirectToRoute('almacenes_index');
    }

    /**
     * Creates a form to delete a Almacenes entity.
     *
     * @param Almacenes $almacene The Almacenes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Almacenes $almacene)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('almacenes_delete', array('id' => $almacene->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
