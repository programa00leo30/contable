<?php

class ControlArchivo{

	private $arreglo;
	private $camino;
	private $modelo;
	private $condicion;
	private $estructVisual;	// estructura que se visualiza.
	private $estructActual;	// estructura que realiza acciones.
	
	public function __construct(){
		//obtenemos el path usado..
		$this->arreglo = explode("/",PATH);
		
		$count = count($this->arreglo);
		$this->condicion = array_pop($this->arreglo);
		// $this->estructActual = array_pop($this->arreglo);
		$this->estructVisual = array_pop($this->arreglo);
		$this->modelo = array_pop($this->arreglo);
		$this->camino = implode("/",$this->arreglo);
		
		// /home/leandro/www/contable/admin/front/config
		// [camino logico]/[modelo a usar]/[estructura visual]/[ estructura actual]
		
	}
	public function RequireOnce($archivo,$default){
		// retorna el archivo necesario.
		$t= $this->camino."/".$this->modelo."/"	.$this->estructVisual."/".$this->condicion."/"		.$this->estructActual."/".$archivo;
		$d= $this->camino."/".$this->modelo."/"	.$this->estructVisual."/default/"					.$this->estructActual."/".$archivo;
		$f=$this->camino."/".$this->modelo."/"	.$this->estructVisual."/default/"					."404/$default";
		/*
		 echo "controlArchivo $t\n"
			." modelo:".$this->modelo 
			." visual:".$this->estructVisual
			." condicion:".$this->condicion
			." actual:".$this->estructActual
			." archivo:".$archivo."<br>\n";
		// */
		if ($this->fileexists($t)){
			$this->falla=0;
			return $t;
		}elseif ($this->fileexists($d)){
			$this->falla=1;
			return $d;
		}else{
			$this->falla=2;
			return $f;
		
		}
	}
	public function falla(){
		return $this->falla;
	}
	public function runing($archivo,$default="404View.php"){
		
		// return "data://text/plain;base64,".base64_encode($this->RequireOnce($archivo)) ;
		return $this->RequireOnce($archivo,$default) ;
	}
	public function setActuador($actuador){
		$this->estructActual = $actuador;
	}
	public function verificar($archivo1,$archivo2){
		if ($this->fileexists($archivo1)){
			return $archivo1;
		}elseif ($this->fileexists($archivo2)){
			return $archivo2;
		}else{
			return false;
		}
	}
	public function rutaarchivo($nombreArchivo){
		$t= implode("/",$this->camino)."/".$this->modelo."/".$this->estructVisual."/".$this->estructActual."/".$nombreArchivo;
		$d= implode("/",$this->camino)."/".$this->modelo."/default/".$this->estructActual."/".$nombreArchivo;
		return $this->verificar($t,$d);
	}
	public function fileexists($archivo){
		if (file_exists($archivo)){
			return true;
		}else{
			return false;
		}
	}
}
