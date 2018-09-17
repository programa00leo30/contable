<?php
 error_reporting  (E_ALL);
 ini_set ('display_errors', true);

echo "esto ha sido redirigido";

$entrada = "nivel 1 [url] nivel 2 [url] nivel 3 [/url] nivel 2 [/url] nivel 1";
class recursivo {
	private $param ;
	public function __construct($helper){
		$this->param["helper"] = $helper ;
		$this->param["etiqueta"] = "" ;
	}
	public function set_etiqueta($etiqueta){
		$this->param["etiqueta"] = $etiqueta ;
	}
	public function get_etiqueta($etiqueta){
		return $this->param["etiqueta"] ;
	}
	public function analiza($entrada,$etiqueta){
		$this->param["etiqueta"] = $etiqueta ;
		return $this->analizarEtiquetasRecursivo($entrada);
		
	}
	function analizarEtiquetasRecursivo($entrada)
	{
		$etiqueta = $this->param["etiqueta"];
		$h = $this->param["helper"];
		// $regex = '#\[url]((?:[^[]|\[(?!/?url])|(?R))+)\[/url]#';
		$regex = '#\['.$etiqueta.']((?:[^[]|\[(?!/?'.$etiqueta.'])|(?R))+)\[/'.$etiqueta.']#';

		if (is_array($entrada)) {
			$entrada = '<div style="margin-left: 10px">'.$entrada[1].'</div>'."\n";
		}

		return preg_replace_callback($regex, 'self::analizarEtiquetasRecursivo', $entrada);
	}
}
$n = new recursivo("test");
// $n->set_etiqueta("url");
$salida = $n->analiza($_GET["a"],"a");
echo $salida;
$salida = $n->analiza($entrada,"url");
echo $salida;


?>
