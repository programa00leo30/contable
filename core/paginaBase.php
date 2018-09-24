<?php

/*	paginaBase.php
	control de pagina generico.
*/
class PaginaBase{
	private $pagina;
	public $title;
	public $descripcion;
	public $autor;
	
	// pagina = plantilla:
	// view = contenidos de la plantilla
	// datos = valores pasados a view.
	
	public function __construct($pagina="index",$view, $datos=array("titulo"=>"index" , "autor"=>"leandro morala" )) {
		require_once 'AyudaVistas.php';
		require_once 'htmlinput.class.php';
		
		$this->pagina["archivo"] = $pagina."Plantilla.php";
		$this->pagina["contenido"] = $view."ViewContenido.php";
		$this->pagina["ayuda"] = new AyudaVistas();
		$this->pagina["html"] = new htmlinput();
		$this->pagina["datos"] = $datos;
		
	}
	
	public function favicon(){
		echo "favicon.ico";
	}
	public function barrasuperior(){
		
        // aqui esta la variable auxiliar de todos los views.
        $helper = $this->pagina["ayuda"];
		$imput = $this->pagina["html"];
		
		require_once PATH.'/plantilla/barrasuperior.php';
	}
	public function barralateral(){
        $helper = $this->pagina["ayuda"];
		$html = $this->pagina["html"];
		require_once PATH.'/plantilla/barralateral.php';
	}
	public function contenido(){        
		$helper = $this->pagina["ayuda"];
		$html = $this->pagina["html"];
		
		foreach ($this->pagina["datos"] as $id_assoc => $valor) {
            ${$id_assoc}=$valor; 
        }
                // echo "lanzo:$vista"; 
		require_once PATH.'/view/'.$this->pagina["contenido"] ;
	}
	public function piepagina(){        
		
		require_once PATH.'/plantilla/footer.php' ;
	}
	public function render(){
		// $vista= "index";
		$pagina=$this;
		$helper = $this->pagina["ayuda"];
		$html = $this->pagina["html"];

		require_once PATH.'/plantilla/'.$this->pagina["archivo"] ;
		if (debugmode){
			// el signo + viene como un espacio.	
			// echo "<div>".nz($_GET["dg"])."</div>";
			$msg=base64_decode( str_replace(" ","+",nz($_GET["dg"]) ) );
			echo "<div class='falla'>$msg</div>";
		}
			
	}

}
