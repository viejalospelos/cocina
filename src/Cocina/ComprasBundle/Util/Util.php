<?php
//Clase con método getSlug para calcular los slugs a partir del nombre

namespace Cocina\ComprasBundle\Util;

class Util {
	static public function getSlug($cadena, $separador = '-')
	{
		// Código copiado de http://cubiq.org/the-perfect-php-clean-url-generator
		$slug = iconv('UTF-8', 'ASCII//TRANSLIT', $cadena);
		$slug = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $slug);
		$slug = strtolower(trim($slug, $separador));
		$slug = preg_replace("/[\/_|+ -]+/", $separador, $slug);
		return $slug;
	}
	
}