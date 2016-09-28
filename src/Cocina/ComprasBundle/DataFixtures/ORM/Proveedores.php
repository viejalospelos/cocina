<?php
namespace Cocina\ComprasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cocina\ComprasBundle\Entity\Proveedores;
use Cocina\ComprasBundle\Util\Util;

class Proveedor extends AbstractFixture implements OrderedFixtureInterface
{
	public function getOrder(){
		return 10;
	}
	public function load(ObjectManager $manager)
	{
		
	//creamos 50 proveedores aleatorios
		for ($n=1; $n<=50; $n++){

			$proveedor=new Proveedores();
			$proveedor->setNombre('proveedor'.'-'.$n);
			$proveedor->setSlug(Util::getSlug($proveedor->getNombre()));
			$proveedor->setCategoriaProveedor('comida');
			$proveedor->setDescripcion($this->verborrea());
			$proveedor->setDomicilioSocial($this->direcciones());
			$proveedor->setTelefonoPrincipal((string)rand(958000000,958999999));
			$proveedor->setEmailPrincipal($proveedor->getNombre().'@correo.com');
			$proveedor->setFax((string)rand(958000000,958999999));
			$proveedor->setWeb($proveedor->getNombre().'.com');
			$proveedor->setRegistroSanitario(rand(0,99).'.'.rand(000000,999999).'/'.array_rand(array_flip(array('GR','MA','TO','BA','SE','AV','V','A')),1));
			
			$proveedor->setCif($this->letraAbecedario().'/'.rand(000000,999999));
			$proveedor->setdiaDeEntrega($this->diaEntrega());
			$proveedor->setantelacionDePedido($this->antelacionPedido());
			$proveedor->setAgenteComercial($this->nombreApellidos());
			$proveedor->setTelefonoAgenteComercial((string)rand(958000000,958999999));
			$proveedor->setEmailAgenteComercial($proveedor->getAgenteComercial().'@correo.com');
			$proveedor->setResponsableCalidad($this->nombreApellidos());
			$proveedor->setTelefonoResponsableCalidad((string)rand(958000000,958999999));
			$proveedor->setEmailResponsableCalidad($proveedor->getResponsableCalidad().'@correo.com');
			$proveedor->setNotas($this->verborrea());
			$proveedor->setFechaHomologacion($this->fechaAleatoria());
			$proveedor->setResponsableHomologacion($this->nombreApellidos());
			$proveedor->setRutaRegistroSanitario($proveedor->getNombre().'_RGSA.pdf');
			$proveedor->setRutaDocumentosAdjuntos('PROVEEDOR/'.$proveedor->getNombre().'/DOCS_ADJUNTOS/_ADJUNTOS.zip');
			$proveedor->setEstabilidadPrecios(rand(0,1));
			$this->addReference('proveedorNumero'.$n, $proveedor);
			
			$manager->persist($proveedor);	
		}
		
		$manager->flush();
		
	}
	/*
	 * Generador aleatorio de descripciones de tiendas
	 */
	private function verborrea()
	{
	
		$frases = array_flip(array(
				'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
				'Mauris ultricies nunc nec sapien tincidunt facilisis.',
				'Nulla scelerisque blandit ligula eget hendrerit.',
				'Sed malesuada, enim sit amet ultricies semper, elit leo lacinia massa, in tempus nisl ipsum quis libero.',
				'Aliquam molestie neque non augue molestie bibendum.',
				'Pellentesque ultricies erat ac lorem pharetra vulputate.',
				'Donec dapibus blandit odio, in auctor turpis commodo ut.',
				'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
				'Nam rhoncus lorem sed libero hendrerit accumsan.',
				'Maecenas non erat eu justo rutrum condimentum.',
				'Suspendisse leo tortor, tempus in lacinia sit amet, varius eu urna.',
				'Phasellus eu leo tellus, et accumsan libero.',
				'Pellentesque fringilla ipsum nec justo tempus elementum.',
				'Aliquam dapibus metus aliquam ante lacinia blandit.',
				'Donec ornare lacus vitae dolor imperdiet vitae ultricies nibh congue.',
		));
	
		$numeroFrases = rand(3, 6);
	
		return implode(' ', array_rand($frases, $numeroFrases));
	}
	
	/*
	 * Generador aleatorio de direcciones postales.
	 */
	private function direcciones()
	{
		$prefijos = array('Calle', 'Avenida', 'Plaza');
		$nombres = array(
				'Lorem', 'Ipsum', 'Sitamet', 'Consectetur', 'Adipiscing',
				'Necsapien', 'Tincidunt', 'Facilisis', 'Nulla', 'Scelerisque',
				'Blandit', 'Ligula', 'Eget', 'Hendrerit', 'Malesuada', 'Enimsit'
		);
	
		return $prefijos[array_rand($prefijos)].' '.$nombres[array_rand($nombres)].', '.rand(1, 100)."\n"
				.$this->codigoPostal();
	}
	
	/*
	 * Generador aleatorio de códigos postales
	 */
	private function codigoPostal()
	{
		return sprintf('%02s%03s', rand(1, 52), rand(0, 999));
	}

	
	
	/*
	 * Generador aleatorio de una letra del abecedario de manera dinámica
	 */
	private function letraAbecedario(){
		$letras=array();
		for($i=65; $i<=90; $i++) {
			array_push($letras, chr($i));
		}
		$letra=array_rand(array_flip($letras), 1);
		return $letra;
	}
	
	/*
	 * Generador aleatorio de día de entrega
	 */
	private function diaEntrega(){
		$diaEntrega=array('lunes', 'martes','miércoles','jueves','viernes','sábado','domingo');
		return array_rand(array_flip($diaEntrega));
	}
	
	/*
	 * Generador aleatorio de días de antelación de pedido
	 */
	private function antelacionPedido(){
		$dias=array();
		for ($i=1;$i<=15;$i++){
			$dias[]=$i;
		}
		return array_rand(array_flip($dias));
	}

	/*
	 * Generador aleatorio de nombre con 2 apellidos
	 */
	private function nombreApellidos(){
		$nombres=file('src\Cocina\ComprasBundle\DataFixtures\Util\nombres.txt');
		$apellidos=file('src\Cocina\ComprasBundle\DataFixtures\Util\apellidos.txt');
		
		$nombreAleatorio=array_rand(array_flip($nombres),1);
		$apellidoAleatorio=array_rand(array_flip($apellidos),1);
		$apellidoAleatorio2=array_rand(array_flip($apellidos),1);
		
		return ucfirst(strtolower($nombreAleatorio)).' '.ucfirst(strtolower($apellidoAleatorio)).' '.ucfirst(strtolower($apellidoAleatorio2));
	
	}
	
	/*
	 * Generador aleatorio de fechas desde el 17/7/2005 00:00:00 hasta 17/7/15 00:00:00
	 */
	
	private function fechaAleatoria($from = 1121558400, $to = 1437091200) {
		if (!$to) {
			$to = date('U');
		}
		if (!ctype_digit($from)) {
			$from = strtotime($from);
		}
		if (!ctype_digit($to)) {
			$to = strtotime($to);
		}
		
		$str= date('Y-m-d H:i:s', rand($from, $to));
		$objDT = \DateTime::createFromFormat('Y-m-d H:i:s', $str);
		return $objDT;
		
	}

}