<?php
namespace Cocina\UsuarioBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cocina\UsuarioBundle\Entity\Usuarios;

class Usuario extends AbstractFixture implements OrderedFixtureInterface
{
	public function getOrder(){
		return 90;
	}
	public function load(ObjectManager $manager)
	{
		$usuario=new Usuarios();
		$usuario->setNombre('Mr.Quality');
		$usuario->setApellidos('One Champion');
		$usuario->setCargo('Responsable de calidad');
		$usuario->setNick('admin');
		$usuario->setPassword('1234');
		$usuario->setSalt(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));
		
// 		$passwordEnClaro = 'usuario'.$i;
// 		$encoder = $this->container->get('security.encoder_factory')->getEncoder($usuario);
// 		$passwordCodificado = $encoder->encodePassword($passwordEnClaro, $usuario->getSalt());
// 		$usuario->setPassword($passwordCodificado);
		
		
		$usuario->setRole('ROLE_USUARIO');
		
		$manager->persist($usuario);
		$manager->flush();
	}

}
