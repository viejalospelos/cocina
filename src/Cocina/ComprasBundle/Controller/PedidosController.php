<?php

namespace Cocina\ComprasBundle\Controller;

use Cocina\ComprasBundle\Entity\Pedidos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Cocina\ComprasBundle\Form\PedidosType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Cocina\ComprasBundle\Entity\Pedidos_detalle;
//use Symfony\Component\Form\Extension\Core\Type\HiddenType;

/**
 * Pedido controller.
 *
 */
class PedidosController extends Controller
{
    /**
     * Lists all pedido entities.
     *
     */
    public function indexAction(Request $peticion)
    {
        $em = $this->getDoctrine()->getManager();

//        $pedidos = $em->getRepository('ComprasBundle:Pedidos')->findAll();
        if ($peticion->get('_route')=='pedidos_procesados'){
        	$pedidos=$em->getRepository('ComprasBundle:Pedidos')->findPedidosProcesados()->getResult();
        }elseif ($peticion->get('_route')=='pedidos_index'){       	
        	$pedidos=$em->getRepository('ComprasBundle:Pedidos')->findPedidosPendientes()->getResult();
        }

        
        return $this->render('ComprasBundle:pedidos:index.html.twig', array(
            'pedidos' => $pedidos,
        ));
    }

    /**
     * Creates a new pedido entity.
     *
     */
    public function newAction(Request $request)
    {
        $pedido = new Pedidos();
        $form = $this->createForm('Cocina\ComprasBundle\Form\PedidosPadreType', $pedido);
        
        $form->handleRequest($request);
        
       	   if ($form->isValid()){	
            $em = $this->getDoctrine()->getManager();
            
            //estos datos se autorellenan de forma automática
            //la fecha precisa de entrega se tiene que programar bien
            
            //PEDIDOS
            $pedido->setFechaPedido(new \DateTime('now'));
            $pedido->setFechaEntregaPrevista(new \DateTime('now'));
            $pedido->setResponsableCompra($this->getUser());
            $pedido->setEntregado(false);
            $pedido->setIdProveedor($form->get('idProveedor')->getData());

            //PEDIDOS_DETALLE
            $pedidoDetalle=$pedido->getDetalles();
            $pedidoDetalle->setEntregado(false);
            $pedidoDetalle->setIdPedido($pedido);
            $pedidoDetalle->setIdProducto($form->get('idProducto')->getData());

            
            $em->persist($pedido);
            $em->persist($pedidoDetalle);
            $em->flush();
        	$flashBag = $this->get('session')->getFlashBag();
        	$flashBag->add('success', 'Pedido realizado con éxito');
        	//a la DB + flashbag + mail

//             return $this->redirectToRoute('pedidos_show', array('id' => $pedido->getId()));
        }

        return $this->render('ComprasBundle:pedidos:new.html.twig', array(
            'pedido' => $pedido,
            'form' => $form->createView(),
        ));
    }
    
//     public function new2Action(Request $request)
//     {
//     	$pedidos= new Pedidos();
//     	$form=$this->createFormBuilder($pedidos)
// 	    	->setAction($this->generateUrl('pedidosDetalle_new2'))
// 	    	->setMethod('POST')
//     		->add('idProveedor', EntityType::class, array('class'=>'ComprasBundle:Proveedores'))
//     		->add('id', HiddenType::class)
//     		->getForm();
  
//     	$form->handleRequest($request);
//     	if ($form->isValid()){
//     		$em=$this->getDoctrine()->getManager();
//     		//
//     		$pedidos->setFechaPedido(new \DateTime('now'));
//     		$pedidos->setFechaEntregaPrevista(new \DateTime('now'));
//     		$pedidos->setResponsableCompra($this->getUser());
//     		$pedidos->setEntregado(false);

    		
//     		$em->persist($pedidos);  
//     		$em->flush();
//     		return $this->redirect($this->generateUrl('pedidosDetalle_new2'));


//     	}
    		
//     	return $this->render('ComprasBundle:pedidos:new2.html.twig', array(
//     			'form'=>$form->createView(),
//     		));  	
//     }
    
    

    /**
     * Finds and displays a pedido entity.
     *
     */
    public function showAction(Pedidos $pedido)
    {
        $deleteForm = $this->createDeleteForm($pedido);
        
        $em=$this->getDoctrine()->getManager();
        $pedidosDetalles=$em->getRepository('ComprasBundle:Pedidos_detalle')->findPedidosDetallePorIdPedido($pedido->getId())->getResult();

        return $this->render('ComprasBundle:pedidos:show.html.twig', array(
            'pedido' => $pedido,
            'delete_form' => $deleteForm->createView(),
        	'pedidosDetalles'=>$pedidosDetalles,	
        ));
    }

    /**
     * Displays a form to edit an existing pedido entity.
     *
     */
//     public function editAction(Request $request, Pedidos $pedido)
//     {
//         $deleteForm = $this->createDeleteForm($pedido);
//         $editForm = $this->createForm('Cocina\ComprasBundle\Form\PedidosType', $pedido);
//         $editForm->handleRequest($request);

//         if ($editForm->isSubmitted() && $editForm->isValid()) {
//             $this->getDoctrine()->getManager()->flush();

//             return $this->redirectToRoute('pedidos_edit', array('id' => $pedido->getId()));
//         }

//         return $this->render('ComprasBundle:pedidos:edit.html.twig', array(
//             'pedido' => $pedido,
//             'edit_form' => $editForm->createView(),
//             'delete_form' => $deleteForm->createView(),
//         ));
//     }

    /**
     * Deletes a pedido entity.
     *
     */
    public function deleteAction(Request $request, Pedidos $pedido)
    {
        $form = $this->createDeleteForm($pedido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pedido);
            $em->flush($pedido);
        }

        return $this->redirectToRoute('pedidos_index');
    }

    /**
     * Creates a form to delete a pedido entity.
     *
     * @param Pedidos $pedido The pedido entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pedidos $pedido)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pedidos_delete', array('id' => $pedido->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    public function selectProductosAction(Request $request)
    {
    	$proveedor_id=$request->request->get('proveedores_id');
    	
    	$em=$this->getDoctrine()->getManager();
    	
    	//OJO con esta mierda-->para devolver Json, SIEMPRE USAR getArrayResult(), por tanto siempre hay que usar dql
    	//$producto=$em->getRepository('ComprasBundle:Productos')->findByIdProveedor($proveedor_id);
    	$producto=$em->getRepository('ComprasBundle:Proveedores')->findProductosDeProveedor($proveedor_id)->getArrayResult();
        	
    	return new JsonResponse($producto);
    }
    
//     public function detallesNew2Action(Request $request, $id)
//     {
//     	$pedidosDetalle= new Pedidos_detalle();
//     	$pedidos=new Pedidos();
//     	$form=$this->createFormBuilder($pedidosDetalle)
//     	->setAction($this->generateUrl('pedidosDetalle_new2'))
//     	->setMethod('POST')
    
//     			->add('seleccionarProducto','checkbox', array(
//     			'mapped'=>false))
//     			->add('idProducto')
//     			->add('cantidadPedida')
//     			->add('observaciones')
//     			->add('idPedido', HiddenType::class)
    
//     			->getForm();
    			
    			//REQUEST ALL
//     			$data2=$request->request->all();
//     			$data=(int)$data2['form']['idProveedor'];
//     			ld($data);
    			
    			//REQUEST
    			
//     			$data=$request->request->get('idProveedor',50);
//     			ld($data);
    			

    			//otro intento

//     			$data = $request->request->get('form');
//     			$data =(int)$data['idProveedor'];
//     			ld($data);
//     			$session=$request->getSession();
//     			$session->set('idProveedor', $data);

    			//otro más
//     			$session=$request->getSession();
//     			$data=$session->get('idProducto');
//     			ld($data);
    			 
//     			$form->handleRequest($request);
//     			$em=$this->getDoctrine()->getManager();
//     			if ($form->isValid()){
    				
    				//
//     				$pedidos->setFechaPedido(new \DateTime('now'));
//     				$pedidos->setFechaEntregaPrevista(new \DateTime('now'));
//     				$pedidos->setResponsableCompra($this->getUser());
//     				$pedidos->setEntregado(false);
//     				//FUNCIONA ld($data=$form->get('idProducto')->getData());
    				
//     				$session=$request->getSession();
//     				$data=$session->get('idProveedor');

    				
    				
    				
    				//ld($data2=$data->getId());
    				//FUNCIONA$idProveedor=$em->getRepository('ComprasBundle:Proveedores')->find($data->getIdProveedor());
//     				$idProveedor=$em->getRepository('ComprasBundle:Proveedores')->find($data);
//     				$pedidos->setIdProveedor($idProveedor);
    				
    				
//     				$em->persist($pedidos);
//     				$em->persist($pedidosDetalle);
//     				$em->flush();
    
//     				$flashBag = $this->get('session')->getFlashBag();
//     				$flashBag->add('success', 'Pedido guardado');
    
//     			}
    			
//     			$fechaEntrega=$request->get('fechaEntrega');
//     			$fechaPedido=$request->get('fechaPedido');
    			
//     			return $this->render('ComprasBundle:pedidos:Detallesnew2.html.twig', array(
//     				'form'=>$form->createView(),
//     				'fechaEntrega'=>$fechaEntrega,
//     				'fechaPedido'=>$fechaPedido
    				
//     				));
//     }			


}