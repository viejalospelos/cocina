<?php
namespace Cocina\ComprasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cocina\ComprasBundle\Entity\Productos;
use Cocina\ComprasBundle\Util\Util;




class Producto extends AbstractFixture implements OrderedFixtureInterface
{

	private $nombreProducto= array('ACELGA HOJA 10X1K JV','ACELGA HOJA PORCIONES GENERICA','AJO SACO CARMONA 6K','AJOS BROTES AJETES','ALAS DE POLLO FRESCAS','ALAS POLLO CONGELADAS IQF','ALBAHACA','ALBONDIGA 3X2K','ALBONDIGA 6KG','ALCACHOFA NATTROZO 4X25K','ALCACHOFA TROZOS 1X10','ALCACHOFAS TROZOS','ALMEJA BLANCA PACIF 6080 6X1KG','ALMEJA BLANCA PACIF 6080 6X1KG EXKIMO','ALMEJAS CONGELADAS JAPONESA 6080 6X1KG','ALMENDRA PELADA CRUDA','ALMENDRA REPELADA','ALUBIA LUENGO 1 KG','APIO BLANCO CV 15KBOL','ARROZ BRILLANTE','ARROZ EXTRA REDONDO 5K','ARROZ REDONDO','ARROZ VAPORIZADO 10X1KG','ARROZ VAPORIZADO LARGO 12X1K','ARROZ VAPORIZADO LARGO 1K','ARROZ VAPORIZADO LARGO 5K','ATUN BOLSA 1KG BACHI','ATUN LOMO CONG SPIEL','ATUN LOMO HORECA 6KG AL VACIO','ATUN LOMO VACIO ARENAS','ATUN LOMO VACIO SP SS 2X6KG APROX','AVELLANA TOSTADA','AZUCAR PQT KG','BACALAO FILETE SEASTAR 1000 1X11K','BACALAO FISHBLOCK ECOMSA 100130GRPZA 1X5K','BACON AHUMADO MILENA','BARRA DE HELADO NATAFRESA','BERENJENA  DADO  10K','BERENJENA 10X10 IDIOMAS','BERENJENA BATEA 10KC','BERENJENA EP PLASTICO 8K APROX','BICARBONATO 150GR C30','BLOQUE CORTE 3 SABORES C6 EST CASY','BOLLO DE LECHE 0 AZUCAR CAJA','BRANDY COCINA','BRANDY GARRAFA 3L','BRANDY MONTESCO','BRANDY SOBERANO','BROCOLI 2X25K','BROCOLI 4060 A','BURGUER MEAT CONG POLLO','BURGUER MEAT POLLO ESPINACAS BAND 500G','BUTIFARRA BLANCA FR','CABEZADA SH PARTIDA','CABEZADA SIN HUESO TROC','CACAO POLVO','CAELLA SPIEL 8KGCAJA','CALABACIN 1X10','CALABACIN DADOS 4X25KG','CALABACIN H EP PLASTICO APROX 10K','CALABAZA 10X10 GRANEL','CALAMAR INDIO SUCIO 1215','CALAMAR LIMPIO 1020','CALAMAR PATAG C ECOMSA','CALAMAR PATAG 5KCAJA APROX','CALAMAR PATAGONIA LIMPIO 4X1K','CALAMAR ROMANA','CALAMAR TINTA','CALDERETA PIERNA CORDERO','CALLOS DE TERNERA 12X500GR','CANELA MOLIDA','CANELON ATUN GRANEL COLECT 120 UC','CANELON CARNE COLECTIVI25UKG 4K','CANELON SBECHAMEL 100UD 4K','CANELONES DE ESPINACAS C4KG','CANELONES GALLO 375K','CANGREJO PALITOS SURIMI','CARBONERO FILETE ICELANDIC 5001000gpz IQF','CARNE DE MEJILLON CHILE 6X1K','CARRILLADA DE CERDO VACIO','CARRILLERA DE CERDO','CARRILLERA DE TERNERA','CEBOLLA 10X10','CEREALES CORN FLAKES AZUCARADOS','CHAMPINON LAMINADO CONGELADO','CHAMPINON LAMINADO LATA 3K','CHIC JAMON Y QUESO HOJALDRE','CHIPIRON RELLENO 5KG','CHORIZO CASERO','CHORIZO ROSARIO NOALEJO','CHORIZO VELA ROJO','CHULETAS CORTADAS','CHULETAS PARTIDAS','CHULETAS SIN CABEZADA PARTIDAS','CHURROS LAZO 3X1KG','CINTA DE LOMO','CINTA LOMO CONG','CINTA LOMO CONGELADA','CINTA LOMO FRESCA','CINTA LOMO VACIO','CIRUELA SIN HUESO','CLARA HUEVO LIQUIDA 6X1K   OVOPAK','CLAVO ENTERO BOTE','COCHINILLO CONGELADO UD','COCTEL FRUTAS','CODILLOS DE JAMON CURADO','CODILLOS DE JAMON FRESCOS','CODILLOS PALETA PIEL','COL BATEA 11K APROX','COL BATEA DL 15KCAJA','COL EP MADERA APROX 13K','COLA RAPE SP 150200','COLES DE BRUSELAS GENERICA 4X25','COLES DE BRUSELAS GRANEL 4X25K','COLIFLOR 2X25K','COLIFLOR 4X25K','COLIFLOR 5070 1X10','COMINOS MOLIDOS BKG','CONEJO ENTERO CONG 6K APROX','CONTRAMUSLO PAVO CPIM','CONTRAMUSLO POLLO GRANEL 120140','CONTRAMUSLO POLLO GRANEL 80100','CONTRAMUSLOS DE POLLO DESHUESADO','COSTILLA SIMPLE','COSTILLAS TIRAS','COSTILLAS TIRAS CONGELADAS','CROQUETON JAMON 4K','CUELLO DE CORDERO CONGELADO C15K APROX','CURRY BOTE 1K','DESCAFEINADO SOLUBLE 1KG','DORADA 300400 FRESCA 6K','EMPANADA ATUN 18K','EMPANADA ATUN HOJ 12K HORNO MANCH C5U','ESPAGUETI ARROZ SIN GLUTEN','ESPARRAGOS TROCEADOS CONG 10K','ESPINACA PORCIONES 1X10','ESPINACA PORCIONES 4X25KG','ESPINACAS HOJAS 10X1K JV','ESPINACAS TROZO  4X25K','FILETE LIMANDA SP 100140 G','FILETE BACALAO PSAL 5001000','FILETE BACALAO PSAL 5001000 DC','FILETE FOGONERO PSAL 5001000DC','FILETE HALIBUT SP 200400G','FILETE MERLUZA 100120 G','FILETE MERLUZA 90110 G','FILETE PANGA 80120 INT 5KG','FILETE TILAPIA','FALDA DE CORDERO CONGELADO','FIAMBRE LOMO AL HORNO','FIAMBRE PALETA 11X11 C2X35K APROX','FIDEOS ARROZ SIN GLUTEN','FILETE FOGONERO PSAL 5001000 C11KG','FILETE PANGA IQF 6x1KG 120170','FILETE TILAPIA 5X1KG 57140200','FILETE BACALAO 11KC','FILETE BACALAO 5001000 MARSELECTA 7K','FILETE BACALAO 7KC','FILETE BACALAO CONG 5001000','FILETE BACALAO CONG 6001200','FILETE BROSMIO CONG 5001000','FILETE DE ABADEJO SIN PIEL 46','FILETE FOGONERO 10KGC','FILETE FOGONERO 3X9KG','FILETE LIMADA 70120 6X1K   INTERMARES','FILETE MERLUZA CP 68 2X5K','FILETE MERLUZA CP 810 227284 2X5K','FILETE MERLUZA EMPANADO   CABEZUELO   1X6K','FILETE MERLUZA LOMO 5K','FILETE MZA EMPANADO 5X15K','FILETE PANGA INT 120170 5K','FILETE PANGA INT 170220 5K','FILETE PANGA INTERF','FILETE PECHUGA CONG POLLO 5K','FILETE POLLO GRANEL','FILETE TILAPIA','FLAMENQUIN POLLO','FLAMENQUIN YORK C35KG','FLAN DE HUEVO CARTE DOR 6X12K','FLANNATILLAS 500 GR','FOGONERO FILETE 200500 CP IQF 1X5 KG','FOGONERO FILETE ICE 400800G 6K INT SP M 4X6','FOGONERO FILETE ICE 900G SP INTR 9K M 3X9','GALLETA PORCION MARIA','GALLETAS MARIA ACA','GALLETAS MARIA BUEN APETITO','GALLETAS MARIA PREMIUM','GAMBA BLANCA','GAMBA BLANCA ARROCERA','GAMBA BLANCA ARROCERA 9X1K','GAMBA BLANCA 6G ARROCERA 9X1K   DELFIN','GAMBA BLANCA MP','GAMBA BLANCA PARROCERA','GAMBA PEL ECOMSA 70100 PZKG 5X1K','GAMBA PEL ECOMSA 70100 PZLB 5X1K','GAMBA PELADA 100200','GAMBA PELADA 3050 5X1KG','GAMBA PELADA CHINA 3050 5X1K','GAMBA PELADA CHINA 5070 5X1K','GAMBA PELADA CHINA 70100 5X1K','GAMBA PEQN4 MABROU 121KG','GAMBA ROJA PELADA 100200','GAMBA TURCA','GAMBA TURCA 140180','GARBANZA BLANCA 10PAQ X 1KG','GARBANZA BLANCA 12PAQ X 1KG','GARBANZO SELECTO B1KG LUENGO','GELATINA HOJAS 1K','GRANEL TRASEROS POLLO','GUISANTE COMUN','GUISANTE COMUN 2X25K','GUISANTE FINO 1X10','GUISANTE FINO D1','HABAS BABY 2X25KG','HABAS BABY 4X25KG JV','HABAS FINAS 4BOL25 KG','HABAS SUPER BABY','HALIBUT FTE 200300GPZ IQF 1X6K','HAMBURGUESA MINI 13GR CORDERO 10X400GR','HAMBURGUESA MINI 20GR TERNERA 4K','HAMBURGUESA MIXTA C68K 80UD','HAMBURGUESA VACUNO FRIMESA 1X6KG IQF','HAMBURGUESATERNERA 105GR 525K','HARINA DE HABAS 1K','HUESOS CODILLOS JAMON CORTC5K APROX','HUESOS CANILLA','HUEVO DURO PELADO CUBO 70UD','HUEVO LIQUIDO   OREKA','HUEVO LIQUIDO OVOPAK 10 LT','HUEVO LIQUIDO PASTEURIZADO 6X1KG   OVOPAK','HUEVO M GRANEL CAJA 15 DOCENAS','JAMON DESHUESADO CORTE   V','JAMON DESHUESADO DIGO JAMON ASADO','JAMON SIN HUESO','JAMONCITOS POLLO','JAMONCITOS POLLO CONGELADOS 10K','JUDIA VERDE PLANA 1X10','JUDIA VERDE PLANA 2X25K','KETCHUP BOTE 185K','LANGOSTINO 6070 10X1K','LAUREL HOJA BOLSA','LENGUADO RUBIO 300450GR 6K APROX','LENTEJA CASTELLANA','LENTEJA PARDINA','LOMO ATUN ENT CONG 4PZA APROX5K','LOMO DE SAJONIA','LONGANIZA','LONGANIZA SALCHICHAS BLANCA DE POLLO 15K','LONGANIZA SALCHICHAS BLANCA DE POLLO 500GR','LONGANIZA FRESCA BLANCA TNAT','MACARRON ARROZ SIN GLUTEN','MAGDALENAS SUPREMAS BUDSX36','MAIZ DULCE 10K','MANOS Y PATAS CONGELADAS MANITAS','MANZGOLDEN ALTIDE GRANEL CL7075 12KC','MANZGOLDEN ALTIDE GRANEL CL7580 12KC','MANZANA A 10X10 1X10','MANZANA GOLDEN ERRUZ 7075 7K APROX','MARGARINA BLOQUE','MARGARINA BLOQUE 1K CASTER','MAYONESA CASERA CUBO 10K','MAYONESA CASERA CUBO 5K','MAYONESA CUBO 10K','MEJILLON GALLEGO SCONCHA M 6x1 KG RABADEJO','MEJILLON SIN CONCHA M 140180','MELOCOTON EN ALMIBAR','MERLUZA CP','MERLUZA FILETE NACIONAL 60115G 5K','MERLUZA FILETE REALFISH 60120 1X7K','MERLUZA N0 TRONQUITO 6X1K RABADE','MERLUZA RODAJA ECOMSA 100200 1X5KG','MERLUZA RODAJA ECOMSA 200400 1X5KG','MERLUZA RODAJA REALFISH 30100G AX8KG','MIEL MILFLORES 1 KG FLOR EN','MINI CROQUETA JAMON 4X25K','MINI CROQUETAS CABRALES','MINI CROQUETAS CASERAS JAMON 4X1','MINI EMPANADA BONITO 10400GR','MINI EMPANADILLAS','MINI EMPANADILLAS 4X1K','MORCILLA','MORCILLA DE CEBOLLA','MORCILLA DE NOALEJO   DULCE   4X11K APROX','MORCILLA DULCE NOALEJO','MORCILLO DE JAMON','MORCILLO TERNERA VACIO','MOSTAZA','MOSTAZA BOTE 2K','MOUSSE CHOCOLATE','MOUSSE FRESA','MOUSSE LIMON','MOZARELLA RALLADA','MOZZARELLA PIZZA TACOS','NPOSTRE CITRUSSALERNO CL5664 15K APROX','NARANJA POSTREZUMO EP PLASTICO 11KCAJA PROX','NATILLAS','NUEZ MOSCADA BGMOLIDA','NUGETS DE POLLO 4X1KG','OREGANO HOJA BOLSA','PALETA CORDERO CONG','PALETA SIN HUESO TROCEADA','PALETA TROCEADA','PALETA TROCEADA VACIO','PAN DE LECHE SONRISAS BIMBO 8U 320GRBOL','PANCETA DESCORTEZADA','PANCETA INDUSTRIAL','PANCETA SALADA','PANCETA SALADA VACIO','PANCETA SALADA VACIO 2X4K MILEN','PANCETA SIN COSTILLA','PANGA FILETE 170220GPZ 1X5K','PANTORRILLA DE ANOJO VACIO','PANTORRILLA DE TERNERA MORCILLO','PARRILLADA DE VERDURAS BRASEADAS','PATATA 12X12 IDIOMAS 1X10','PAVO FRESCO LIMPIO','PECHUGA DE PAVO CON PIMIENTA 1250G','PECHUGA DE PAVO FRESCA 4X3K APROX','PECHUGA DE POLLO INTERF','PECHUGA POLLO CON SAL 100 G BOX','PECHUGA POLLO CON SAL 140 G BOX','PECHUGA POLLO EMPANADA C576 HAMBURG','PELUDA 18K APROX','PERA BLANQUILLA CAROL 6K APROX','PERA CONFERENCE FERJUVA CARTON CL5565','PEREJIL MANOJO CAMACHO 100GRMNJ','PIERNA CORDERO CONG NAC 3X14K APROX','PIES CERDO CORT 4 TROZ CONG C5K','PIM ROJO 10X10','PIM VERDE 10X10','PIMENTON DULCE 1K','PIMIENTA BLANCA MOLIDA','PIMIENTA BLANCA MOLIDA BOTE 1K','PIMIENTA NEGRA GRANO','PIMIENTA VERDE FC 1K','PIMIENTA VERDE LATA','PIMIENTO GORDO VERDE EP PASTICO APROX 8K','PIMIENTO ITALIANO EP PLAST  7KC','PIMIENTO MORRON TIRAS','PIMIENTO PIQUILLO EXTRA','PIMIENTO ROJO 10X10','PIMIENTO ROJO DADOS 2X25KG JV','PIMIENTO VERDE 10X10','PIMIENTO VERDE CONGELADO','PIMIENTO VERDE DADOS 2X25KG JV','PIMIENTOS PIQUILLO EXTRA','PISTO LATA','PLATANO BANANA BANAMOURPREMI 18K APROX','PLATANO SUPER DORAMA AZUL 17KC','POLLO TIPO EUROPEO','PORCION DE SALMON CPIEL','PORCION DE SALMON CON PIEL','POTA TUBO ECOMSA 22UP IQF SP 2X5','POTA TUBO LIMPIO ECOMSA 20CM INT 2X5K','POTA TUBO LIMPIO ECOMSA 22CMpz 2X5K','PROFITEROL NATA PRIELA 8X500GR','PROFITEROLES NATA','PUERRO PLASTICO CAMACHO 5KM','PUERRO RODAJAS 9 MM   GENERICA','PUERROS RODAJAS 4X25KG   JV','PURE DE PATATAS SACO 25KG','PURE PATATAS 20K SACO','PURE PATATAS SACO','PURE PATATAS SACO 25K','QUESO AZUL DANES TROZ4X750GR APR 4SANTO','QUESO AZUL HIMMERLAND 2P 3K APROX','QUESO BARRA EDAM 3X3KG','QUESO BARRA EDAM 4X3KG APROX   RENY PICOT','QUESO BARRA EDAM LONCHAS 8X500GR   RENY PICOT','QUESO BRIE BARRA CANTOREL 1K APROX 2U','QUESO BURGOS BRIK','QUESO CABRA CURADO MONTES MALAGA C6U','QUESO CABRA RODCONGPENICILLIUM 3X1KG','QUESO EDAM LONCHAS','QUESO LONCHAS SANDWITCH 6X1K','QUESO MOZZARELLA PICADA 3X2K','QUESO MOZZARELLA RALLADA 8X1K   CUARO','QUESO MOZZARELLA RALLADA 8X1K   CUATRO','QUESO PARA UNTAR CUBO 2K','QUESO PARA UNTAR CUBO 2K KAIKU','QUESO PARA UNTAR CUBO 2Kg   RENY PICOT','RABAS EMPANADAS','RABO ANOJO CONG','RABO DE VACA TROCEADO','RABO TERNERA FRESCO','RABO TORO TROCEADO CONG C10KG','RABO TROC DE ANOJO CONG 5K MEDINA','RAGU ANOJO','RAGU O TACOS TERNERA AL VACIO RAGOUT','RAPE CHINO 200300 4X1K','RAPE CHINO CONG 300500 C4KG','RAPE COLA CHINO 200300GPZ IQG 6X1K','RATATOUILLE PISTO','RAVIOLI GALLO BOLSA','REDONDO ANOJO CONGELADO','REDONDO ANOJO FRVACMEDINA 3K APROX','REDONDO DE PAVO CONG 5X2K BORMARKET','REDONDO DE PAVO CONGELADO ROTI','REDONDO TERNERA VACIO','RODAJA DE MERLUZA 6X1KG','RODAJA DE SALMON 6X1KG','RODAJA DE SALMON SALAR 6X1KG','ROLLITO DE PRIMAVERA','ROTI DE PAVO 2KG','ROTIE DE PAVO 5 PZASX2KG','SAL DE MESA','SAL FINA SACO 25K','SALCHICHA BRATWURST AL VACIO 14X320GR','SALCHICHA COCIDA MINI 5X1K','SALCHICHAS COCGRANDES','SALCHICHAS COCIDAS GRANDES 5X1K','SALCHICHAS FR','SALMON FILETE 7001200g IQF 1X7KG','SALMON FRESCO','SALTEADOCOCTEL DE SETAS 5X1K GENERIC','SAN JACOBO GRANEL C6K','SANGRE COCIDA','SETA 2 MANCHEGOS 25KC','SETA EXTRA MANCHEGOS 1L 25KC','SETAS TROCEADAS 4X25K','SETAS TROCEADAS 4X25 KG','SETAS TROCEADAS GENRICA','SIROPE CARAMELO','SOBAOS C74UDS','SOLOMILLO CERDO BOR MARKET','SOLOMILLO CERDO CONG','SOLOMILLO CERDO CONGCC SA C13KG APRO','SOLOMILLO DE CERDO','TALLO ESPARRAGO LATA 3K','TAPIOCA','TAQUITO CAELLA SP CONG 6X1K MARINES','TILAPIA 5X1KG 57140200','TILAPIA 5X1KG 57140200 BORMARKET','TILAPIA FILETE 57 140200GPZ IQF SP 5X1K','TINTA CALAMAR   ANEDILCO   10X3X180GR','TINTORERA 10K','TIRAS DE COSTILLA','TOMATE DANIELA CARTON APROX 6K','TOMATE DANIELA CARTON M6KC','TOMATE DANIELA EXTRA MADERA 10K APROX','TOMATE FRITO 3 KILOS LATA','TOMATE NATURAL TRITURADO','TOMATE NATURAL TRITURADO 5KG UDINOSTRUM','TORTILLA CALABACIN','TORTILLA CEBOLLA','TORTILLA FRANCESA BAGUET','TRASERO POLLO LAYER 10K','TROCEADO POLLO CONG IQF C3K ARENAS','TRUCHAS FR ASALMONADA','TRUCHAS FR ASALMONADA C3K','TRUCHAS FR BLANCA','TUBO DE POTA 1925 CM','TUBO DE POTA INTERF C5KG','VAINA POTA 1925CM 5K','VARITAS DE MERLUZA 5X1K','VINAGRE VINO','VINAGRE VINO 1L BUEN APETITO','VINO BLANCO BRICK','VINO BLANCO BRICK 1L','VINO TINTO','VINO TINTO TETRABRICK 12X1L','VINO TINTO TETRABRICK ANDIMAR 1L C12','ZANAHORIA 10X10','ZANAHORIA BABY 1X10','ZANAHORIA BABY DAV','ZANAHORIA DADO 1550GR HOLA C3LATA','ZANAHORIA DADO 4X25 KG 80 UN','ZANAHORIA DADO LATA 3K','ZANAHORIA GORDA AGROJUMA 5KBOL','ZANAHORIAS BABY 4X25K','ZUMO MANZANA BRICK 1 LT JUVER C12 BRICK','ZUMO MANZANA BRICK 1L JUVER C12','ZUMO NARANJA 100  BRICK 1L','ZUMO NARANJA 100 BRICK 1L SIMON C12','ZUMO NARANJA BRICK 1L JUVER','ZUMO NARANJA SLIM PACK6UN DON SIMON','ZUMO PINA BRICK','ZUMO PINA BRICK 1L','ZUMO PINA BRICK 1L JUVER');
	private $marcas= array('Acme Corporation', 'Capsule Corporation', 'Duff', 'Dunder Mifflin Inc', 'Los Pollos Hermanos', 'MomCorp', 'Sterling Cooper Draper Pryce', 'Space Sprockets', 'Dharma', 'Morley', 'Weyland Yutani', 'Red Apple', 'Umbrella', 'Cyberdyne Systems', 'Pizza Planet', 'Finder-Spyder', 'Teriyaki Donut', 'Jack Rabbit Slims', 'Heisler', 'Chango', 'Paper Street Soap Company', 'Gran Kahuna', 'OsCorp', 'Stark Industries', 'BubbaGump', 'Campofrito');
	private $frases = array(
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
		);
	private $nombres=array('﻿HUGO','DANIEL','PABLO','MARTIN','ALEJANDRO','ADRIAN','ALVARO','DAVID','LUCAS','MARIO','DIEGO','MANUEL','LEO','MATEO','JAVIER','IZAN','MARCOS','ALEX','SERGIO','MARC','CARLOS','JORGE','MIGUEL','ENZO','ANTONIO','ANGEL','GONZALO','IKER','JUAN','ERIC','IVAN','RUBEN','VICTOR','NICOLAS','BRUNO','SAMUEL','HECTOR','JOSE','GABRIEL','DARIO','OLIVER','AARON','ADAM','DYLAN','JESUS','MARCO','AITOR','ALBERTO','GUILLERMO','RAUL','RODRIGO','FRANCISCO','JOEL','ERIK','PAU','PEDRO','LUIS','JAIME','RAFAEL','ASIER','UNAI','MOHAMED','MARTI','GAEL','THIAGO','IAN','FERNANDO','OSCAR','LUCA','ANDRES','BIEL','ISMAEL','ALONSO','POL','NIL','JAN','RAYAN','ALEIX','ARNAU','CRISTIAN','SAUL','ISAAC','SANTIAGO','JULEN','JOAN','MIGUEL ANGEL','AIMAR','IGNACIO','YOUSSEF','EDUARDO','MAURO','ENRIQUE','YAGO','JOSE ANTONIO','GERARD','ABRAHAM','NOAH','OMAR','IBAI','FRANCISCO JAVIER','JON','LUCIA','MARIA','MARTINA','PAULA','SOFIA','DANIELA','ALBA','JULIA','CARLA','SARA','VALERIA','NOA','EMMA','CLAUDIA','CARMEN','MARTA','VALENTINA','IRENE','ADRIANA','ANA','LAURA','ELENA','ALEJANDRA','OLIVIA','INES','LOLA','AITANA','ARIADNA','VERA','LAIA','VEGA','ALMA','CANDELA','MARINA','AINHOA','ELSA','JIMENA','TRIANA','LEIRE','CARLOTA','BLANCA','ROCIO','AINARA','ALICIA','NORA','NEREA','ANGELA','CLARA','ABRIL','LEYRE','CELIA','ANDREA','VICTORIA','LARA','EVA','MIA','CHLOE','NATALIA','MANUELA','ISABEL','AINA','ZOE','CRISTINA','AROA','NURIA','ALEXIA','LIA','CAROLINA','IRIA','AFRICA','MAR','MARA','GABRIELA','ONA','NAIA','HELENA','PAOLA','AZAHARA','NOELIA','ELIA','IRIS','LUNA','MALAK','NAHIA','BERTA','AYA','MIREIA','SALMA','ANE','CAYETANA','SILVIA','DIANA','MIRIAM','ARLET','NADIA','NAIARA','JANA','CLOE','ANNA','NAYARA','ERIKA');
	private $apellidos=array ('﻿GARCIA','GONZALEZ','RODRIGUEZ','FERNANDEZ','LOPEZ','MARTINEZ','SANCHEZ','PEREZ','GOMEZ','MARTIN','JIMENEZ','RUIZ','HERNANDEZ','DIAZ','MORENO','ALVAREZ','MUNOZ','ROMERO','ALONSO','GUTIERREZ','NAVARRO','TORRES','DOMINGUEZ','VAZQUEZ','RAMOS','GIL','RAMIREZ','SERRANO','BLANCO','SUAREZ','MOLINA','MORALES','ORTEGA','DELGADO','CASTRO','ORTIZ','RUBIO','MARIN','SANZ','NUNEZ','IGLESIAS','MEDINA','GARRIDO','SANTOS','CASTILLO','CORTES','LOZANO','GUERRERO','CANO','PRIETO','MENDEZ','CALVO','CRUZ','GALLEGO','VIDAL','LEON','HERRERA','MARQUEZ','PENA','CABRERA','FLORES','CAMPOS','VEGA','DIEZ','FUENTES','CARRASCO','CABALLERO','NIETO','REYES','AGUILAR','PASCUAL','HERRERO','SANTANA','LORENZO','HIDALGO','MONTERO','IBANEZ','GIMENEZ','FERRER','DURAN','VICENTE','BENITEZ','MORA','SANTIAGO','ARIAS','VARGAS','CARMONA','CRESPO','ROMAN','PASTOR','SOTO','SAEZ','VELASCO','SOLER','MOYA','ESTEBAN','PARRA','BRAVO','GALLARDO','ROJAS');
	private $ingredientesTrazabilidad= array ( 'abadejo ','aceite de girasol ','aceite de oliva ','aceitunas ','agrio de limon ','agua ','ajo ','ajos brotes ','albahaca ','albondigas ','alcachofas ','aliño caracoles ','almejas ','almendras ','alubia gorda ','apio ','arroz redondo ','arroz vaporizado ','atun congelado ','atun conserva ','avellanas ','azucar ','bacalao ','bacalao desmigado ','bacon ahumado ','base para asados carne ','base para asados pollo ','base pizza ','berenjena ','bicarbonato ','boquerones ','brandy ','brocoli ','buñuelos ','caella ','calabacin ','calabaza ','calamar rebozado ','calamar-choco ','caldo de marisco ','callos ','canela molida ','canela rama ','canelones carne ','canelones espinacas ','caracoles ','caramelo ','cebolla congelada ','cebolla pelada ','cerdo cabezada ','cerdo carrillada ','cerdo chuletas ','cerdo cochinillo ','cerdo codillos ','cerdo costillas ','cerdo jamon asado ','cerdo lomo ','cerdo paleta troceada ','cerdo panceta ','cerdo panceta salada ','cerdo solomillo ','champiñon lata ','chopped ','chorizo fiambre ','chorizo fresco ','cilantro ','ciruelas pasas ','clavo ','col bruselas ','col fresca ','coliflor congelada ','colorante ','cominos molidos ','cordero falda ','cordero pierna ','cordon bleu ave ','croquetas ','curry ','dorada ','empanada atun ','empanadillas ','espaguetis ','espaguetis maiz ','esparragos congelados ','esparragos lata ','espinacas ','espirales ','estrellas ','fideo gordo ','fideo sopa ','fideo sopa sin gluten ','flamenquin ','flan vainilla ','flan/natillas ','fogonero ','galletas ','gambas ','garbanzos ','gelatina ','guindilla ','guisantes ','habas ','hamburguesa pollo ','harina de habas ','harina de trigo ','hierbabuena ','hojaldres ','huesos de canilla ','huevo ','huevo cocido ','huevo liquido ','jamon curado ','jamon york ','judias verdes ','judias-alubias ','ketchup ','lasaña placa ','laurel ','leche ','lechuga iceberg ','lentejas ','limon ','longaniza ','macarrones ','macarrones celiacos ','macedonia de frutas ','magdalenas ','maiz ','maizena ','manitas de cerdo (manos) ','manzana ','maravilla ','margarina ','mayonesa ','mejillones ','melocoton en almibar ','merluza empanada ','merluza lomo c/p ','merluza s/p ','merluza san jacobo ','mollejas ','morcilla ','mortadela ','mostaza ','mousse chocolate ','mousse fresa ','mousse limon ','naranja ','nata ','nuez moscada ','oregano ','paleta de cordero ','palometa ','pan ','pan de molde ','pan rallado ','panga ','pasas ','patatas bravas guiso ','patatas dado ','patatas enteras ','patatas fritas ','patatas panadera ','patatas trozos ','pavo embutido ','pavo pechuga ','pavo roti ','pechuga empanada ','pepino ','perejil ','pimenton ','pimienta blanca ','pimienta negra ','pimienta negra grano ','pimienta verde lata ','pimiento asado lata ','pimiento del piquillo ','pimiento morron ','pimiento rojo congelado ','pimiento seco ','pimiento verde congelado ','pimiento verde lamuyo ','piña ','piquillos ','pisto ','pizza ','pollo alitas ','pollo contramuslo ','pollo higado ','pollo jamoncitos ','pollo pechuga ','pollo sangre ','profiteroles ','puerros ','pure de patatas ','queso crema ','queso fresco ','queso lonchas ','queso rallado ','queso roquefort ','rabo de toro ','rape ','raviolis ','rollito primavera ','romero ','sal ','salchicha fresca cerdo ','salchichas de ave frescas ','salchichas frankfurt ','salchichon ','salmon ','salmon ahumado ','salmuera ','setas ','soja ','surimi ','tallarines ','tapioca ','ternera carne picada ','ternera morcillo ','ternera ragu o taco ','ternera redondo ','tilapia ','tinta ','tomate fresco ','tomate frito ','tomate triturado ','tomillo ','tortilla atun ','tortilla calabacin ','tortilla espinacas ','tortilla francesa ','tortilla patatas ','trucha ','varitas merluza ','verduras braseadas ','vinagre ','vino blanco ','vino tinto ','zanahoria baby congelada ','zanahoria cubo congelada ','zanahoria dado lata ','zanahoria pelada ','zanahoria rallada ','zumo naranja ','zumo piña ','pollo entero ','pavo entero ','morcilla de arroz ','mini hamburguesa ','callos de ternera ','acelgas ','vino oporto ','pasta cintas ','pasta coditos ','conejo ','pollo cuartos traseros ','piñones ','pasta penne ','pescadilla ','platija ','pimiento rojo lamuyo ','chipirones ','pasta fideua ','cangrejo ','ternera falda ','cerveza ','ternera aleta ','cava ','lenguadina ','hamburguesa ternera ','hamburguesa mixta ','canelones atun ','san jacobo york ','queso azul ','queso cabra ','queso brie ','queso edam ','salchichas bratwurst ','salchichas mini ','cacao polvo ','gulas ','cabrito paleta ','huevo clara ','churros ','cafe soluble descafeinado ','sobaos ','pan de leche ','zumo manzana ','miel ','cebolleta ','merluza embutido ','pavo ragout ','pollo carne picada ','cerdo carne picada ','yogur ','cereales desayuno ','edulcorante ','merluza tx ','caldo carne no glutamato ','caldo ave no glutamato ','caldo pescado no glutamato ','proteina soja ','almidon trigo ','levadura cerveza ','menestra verduras ','espaguetis tinta sepia ','ternera carrillada ','lomo de sajonia ','patata cubo ','caldo marisco no glutamato ','caldo vegetal no glutamato ','mazorcas de maiz ','mantequilla ','almidon tapioca ','orejones ','lacon ','nueces ','queso parmesano ','granadina ','curasao ','pasta lazos ','anchoas en aceite ','aceituna negra ','chocolate ','pavo entero ','queso gorgonzola ','salsa barbacoa ','tocino fresco ','tocino añejo ','caldo de ave natural ','salsa almendras ','salsa americana ','salsa bechamel ','salsa blanca ','salsa bordalesa ','salsa carbonara ','salsa carbonara pavo ','salsa cardinal ','salsa cebolla ','salsa cebolla pimiento ','salsa chilindron ','salsa dos pimientos ','salsa española ','salsa española arroz ','salsa marinera ','salsa picada ','salsa pimientos piquillo ','salsa riojana ','salsa romesco ','salsa roteña ','salsa vino blanco ','salsa vizcaina ','fondo boloñesa ','fondo encebollado ','fondo migas ','fondo potaje ','fondo ragout ','salsa vasca');
	
	public function getOrder(){
		return 30;
	}
	public function load(ObjectManager $manager)
	{
		
		
		$almacenes=$manager->getRepository('ComprasBundle:Almacenes')->findAll();
		$proveedores=$manager->getRepository('ComprasBundle:Proveedores')->findAll();



		foreach ($proveedores as $proveedor){
			//$producto=$manager->getRepository('ComprasBundle:Proveedores')->findAll(); ESTO SERÍA PARA HACERLO CON ADDREFERENCE
			$numeroAleatorio= mt_rand(1,20);
			
			for ($j=0; $j<$numeroAleatorio; $j++){
			//for ($j=0; $j<500; $j++){    ESTO SERÍA PARA HACERLO CON ADDREFERENCE
				$producto=new Productos();
				
				$producto->setIdProveedor($proveedor);
				
				$almacen=$almacenes[array_rand($almacenes)];
				$producto->setIdAlmacen($almacen);
				
				
/* **************************************************************************************** */
	//ESTA SERÍA LA FORMA DE HACERLO CON ADDREFERENCE() Y GETREFERENCE() DONDE CARGA LA INFORMACIÓN DEL PROXY
// 				$aleatorio=mt_rand(1,6);
// 				$producto->setIdAlmacen($this->getReference('almacenNumero'.$aleatorio));
				
// 				$aleatorio2=mt_rand(1,50);
// 				$producto->setIdProveedor($this->getReference('proveedorNumero'.$aleatorio2));
/* ******************************************************************************************	*/			
	
				$producto->setFechaAlta($this->fechaAleatoria()); //esto tendría que hacerse bien, eligiendo fechas al azar posteriores a la homologación
				$producto->setNombreProducto($this->nombreProducto());
				$producto->setTipoProducto($this->tipoProducto());
				$producto->setSlug(Util::getSlug($producto->getNombreProducto()));
				$producto->setMarca($this->nombresMarcas());
				//dejamos los 2 últimos productos como bajas a fecha actual
						if ($j==198 || $j==199){
							$producto->setBaja(1);
							$producto->setFechaBaja(new \DateTime('now'));
						}else{
							$producto->setBaja(0);
						}
				$producto->setNotas($this->verborrea());
				/*
				 * EAN/DUN/GTIN-13 
				 */
						$message='84'.(rand(0000000000,9999999999));
						$digitoFinal=$this->ean13_checksum($message);
						$producto->setEan13($message.$digitoFinal);
						
				/*
				 * EAN/DUN/GTIN-14
				 * Eliminar el dígito control del ean13, poner un número aleatorio del 1 al 5 al principio y recalcular el dígito control
				 */		
				$ean13=$producto->getEan13();
				$dun14=rand(1,5).$this->eliminarDigitoControl($ean13);
				$producto->setDun14($dun14.$this->ean13_checksum($dun14));
				
				$producto->setFormatoCompra(array_rand(array_flip(array('kg','caja','saco','bote','ud'))));
				
				$producto->setPrecioFormatoCompra($this->frand(1, 15, 2));
				
				$producto->setFactorConversionFormatoCompra($this->frand(0.1, 1, 2));
				
				$producto->setPrecioKg($producto->getPrecioFormatoCompra()/$producto->getFactorConversionFormatoCompra());
				
				$producto->setEstabilidadPrecios(array_rand(array(0,1)));
				
				$fechaDeAlta=$producto->getFechaAlta();
				do{
					$fecha1=$this->fechaAleatoria();
				}
				while ($fecha1>$fechaDeAlta);
				$producto->setFechaHomologacion($fecha1);
	
				
				$producto->setResponsableHomologacion($this->nombreApellidos());
				
				/*
				 * Para los adjuntos hay que crear un directorio dentro del directorio del proveedor con el nombre del producto
				 * tipo PROVEEDOR/-nombreProveedor-/PRODUCTOS/-nombreProducto-/
				 */
				
	// 			$em=$this->getDoctrine()->getManager();
	// 			$consulta=$em->getRepository('ComprasBundle:Proveedores')->findAll();
	// 			$nombres=$consulta->getNombre();
	// 			$nombreProveedores= array_rand($nombres);
				
				
				
				
				$producto->setRutaFichaTecnica('PROVEEDOR/'./*array_rand(array_flip($nombreProveedores),1).*/'/FICHA_TECNICA/FICHA_TECNICA.zip');
				
				$producto->setRutaDocumentosAdjuntos('PROVEEDOR/'./*array_rand(array_flip($nombreProveedores),1).*/'/DOCS_ADJUNTOS/DOCS_ADJUNTOS.zip');
				
				$producto->setIngredientesDeclarados($this->ingredientesAleatorios());
				
				$producto->setGluten(array_rand(array(0,1)));
				
				$producto->setLeche(array_rand(array(0,1)));
				
				$producto->setHuevo(array_rand(array(0,1)));
				
				$producto->setSoja(array_rand(array(0,1)));
				
				$producto->setApio(array_rand(array(0,1)));
				
				$producto->setPescado(array_rand(array(0,1)));
				
				$producto->setCrustaceos(array_rand(array(0,1)));
				
				$producto->setMoluscos(array_rand(array(0,1)));
				
				$producto->setFrutosDeCascara(array_rand(array(0,1)));
				
				$producto->setCacahuete(array_rand(array(0,1)));
				
				$producto->setMostaza(array_rand(array(0,1)));
				
				$producto->setSesamo(array_rand(array(0,1)));
				
				$producto->setSo2Sulfito(array_rand(array(0,1)));
				
				$producto->setAltramuces(array_rand(array(0,1)));
				
				$producto->setNo2Nitrito(array_rand(array(0,1)));
				
				$producto->setPotenciadoresSabor(array_rand(array(0,1)));
				
				
				$manager->persist($producto);
			}
			
			$manager->flush();
			
		}
	}
	


	
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
	
	private function nombreProducto(){
		//$nombreProducto=array('azucar','leche');
		$nombreProducto=$this->nombreProducto;
	
		$nombreAleatorio=array_rand(array_flip($nombreProducto),1);
		

	
		return ucfirst(strtolower($nombreAleatorio));

	}
	
	private function nombresMarcas(){
		$marcas=$this->marcas;
		return array_rand(array_flip($marcas));
	}
	
	private function tipoProducto(){
		$tipo=array('Congelado','Refrigerado','Ambiente');
		return array_rand(array_flip($tipo));
	}
	
	private function verborrea()
	{
	
// 		$frases = array_flip(array(
// 				'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
// 				'Mauris ultricies nunc nec sapien tincidunt facilisis.',
// 				'Nulla scelerisque blandit ligula eget hendrerit.',
// 				'Sed malesuada, enim sit amet ultricies semper, elit leo lacinia massa, in tempus nisl ipsum quis libero.',
// 				'Aliquam molestie neque non augue molestie bibendum.',
// 				'Pellentesque ultricies erat ac lorem pharetra vulputate.',
// 				'Donec dapibus blandit odio, in auctor turpis commodo ut.',
// 				'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
// 				'Nam rhoncus lorem sed libero hendrerit accumsan.',
// 				'Maecenas non erat eu justo rutrum condimentum.',
// 				'Suspendisse leo tortor, tempus in lacinia sit amet, varius eu urna.',
// 				'Phasellus eu leo tellus, et accumsan libero.',
// 				'Pellentesque fringilla ipsum nec justo tempus elementum.',
// 				'Aliquam dapibus metus aliquam ante lacinia blandit.',
// 				'Donec ornare lacus vitae dolor imperdiet vitae ultricies nibh congue.',
// 		));

		$frase=$this->frases;
		$frases=array_flip($frase);
		
		$numeroFrases = rand(2, 3);
	
		return implode(' ', array_rand($frases, $numeroFrases));

	}
		
	private function ean13_checksum ($message) {
		$checksum = 0;
		foreach (str_split(strrev($message)) as $pos => $val) {
			$checksum += $val * (3 - 2 * ($pos % 2));
		}
		return ((10 - ($checksum % 10)) % 10);
	}
	
	private function eliminarDigitoControl($cadena){
		$convierteArray=str_split($cadena);
		$corte=array_splice($convierteArray,0,count($convierteArray)-1);
		return implode($corte);
	}
	
	/*
	 * GENERAR NÚMEROS DECIMALES ALEATORIOS
	 * código sacado de http://www.java2s.com/Code/Php/Math/Randomfloatingpointvaluesfrom0to10withtwodecimals.htm
	 */
	private function frand($min, $max, $decimals = 0) {
		$scale = pow(10, $decimals);
		return mt_rand($min * $scale, $max * $scale) / $scale;
	}
	
	private function nombreApellidos(){
		//$nombres=file('src\Cocina\ComprasBundle\DataFixtures\Util\nombres.txt');
		//$apellidos=file('src\Cocina\ComprasBundle\DataFixtures\Util\apellidos.txt');
// 		$nombres=array('pepe','juan');
// 		$apellidos=array('hans','solo');
		
		$nombres=$this->nombres;
		$apellidos=$this->apellidos;
	
		$nombreAleatorio=array_rand(array_flip($nombres),1);
		$apellidoAleatorio=array_rand(array_flip($apellidos),1);
		$apellidoAleatorio2=array_rand(array_flip($apellidos),1);
	
		return ucfirst(strtolower($nombreAleatorio)).' '.ucfirst(strtolower($apellidoAleatorio)).' '.ucfirst(strtolower($apellidoAleatorio2));
		

	
	}
	
	private function ingredientesAleatorios(){
		//include 'src\Cocina\ComprasBundle\DataFixtures\Util\ingredientes_trazabilidad.php';
		//$ingredientesTrazabilidad= array ('sal','azucar','sal2','azucar2','sal3','azucar3','sal4','azucar4','sal5','azucar5','sal6','azucar6','sal7','azucar7','sal8','azucar8','sal9','azucar9','sal10','azucar10');
		
		$ingredientesTrazabilidad=$this->ingredientesTrazabilidad;
		$numAleatorio = rand(5, 15);
		$ingredientesAleatorios= array_rand(array_flip($ingredientesTrazabilidad), $numAleatorio);
		return implode (',' , $ingredientesAleatorios);
		
	}
	

	
	

}