<?php

// archivo en bruto.
header("Content-type: $tipe");
$entrada=(file_get_contents($dato));
// se busca = "font/summernote.eot?546c01739436985e5a21a8cb325521f3"
// valor reemplazado: "index.php/font/summernote.eot?546c01739436985e5a21a8cb325521f3"

// $a = preg_replace(
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
			// $entrada = '<div style="margin-left: 10px">'.$entrada[1].'</div>'."\n";
			$t=explode("/",$entrada[1]);
			$entrada = "http:".$h->url($t[0],$t[1]);
			// $entrada = '<div style="margin-left: 10px">'.$entrada[1].'</div>'."\n";
		}

		return preg_replace_callback($regex, 'self::analizarEtiquetasRecursivo', $entrada);
	}
}

$n = new recursivo($helper);
// echo "// ----\n";
// cambiar las etiquetas [url]controlador/archivo[/url] 
$salida = $n->analiza($entrada,"url");
// echo "// ----\n";
echo $salida ;
