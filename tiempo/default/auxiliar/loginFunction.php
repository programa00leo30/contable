<?php

class loginFunction {
	public $local;
	public $pregunta;
	public $azar;
	public function __construct(){
		// $this->azar=random_int(1,5);
		$this->azar=rand(1,5);
	}
	/*
	 * compara=la semilla.
	 * verdad = palabra de paso de verdad.
	 * falso = palabra de verdad de falso
	 * atr = condiciones de verdad.
	 * 
	 * del atributo anteior:
	 *  switch( $loginfuncion->azar ){ case 1 or 3 or 5 : $loginfuncion->cadenas($sem,"atiende" );break; 
	 *   default : $loginfuncion->numeros($sem,"verifica" );break; };
	 * 
	 * forma de escritura:
	 * ->elije($semilla,"cadena","atiende","numeros","verifica",array(1,3,5));
	 */
	public function elije($compara,$verdad,$verdadCadena,$falso,$falsoCadena,$atr){
		 $rnd=$this->azar();
		 if ( in_array($rnd,$atr)){
			 // verdadero.
			 return $this->$verdad($compara,$verdadCadena);
		}else{
			return $this->$falso($compara,$falsoCadena);
		}
			 		
	}
	public function run($semilla,$cadenas,
		$opcion1,$opcion2,$opcion3,$opcion4,$opcion5,
		$opcion6,$opcion7,$opcion8,$opcion9,$opcion10
		)
	{
		$ncadena=$this->azar(0,3);
		$metodo="opcion".$this->azar(1,10);
		if  (method_exists($this,$metodo)){
			return $this->${$metodo}($semilla,$cadenas[$ncadena]);
		}else{
			// el metodo no existe.
			return $this->cadena($semilla,$cadenas[$ncadena]);
		}
	}
	
	public function azar($min=1,$max=5){
		return rand($min,$max);
	}
	public function cadena($sem,$frase){
		return $this->cadenas($sem,$frase);
	}
	public function cadenas($sem , $frase  ) {
		$nro = $this->azar;
		$lafrase = $sem[$nro] . $frase ;
		$laClave = $sem[$nro+1] . $frase ;
		$this->local = $laClave;
		$this->pregunta = $lafrase;
		return array( $lafrase, $laClave );
		
	}
	
	public function numeros($sem , $frase  ) {
		$nro = $this->azar;
		$lafrase = $sem[$nro] . $frase ;
		$laClave = strlen($frase) . $sem[$nro+1] ;
		$this->local = $laClave;
		$this->pregunta = $lafrase;
		return array( $lafrase, $laClave );
		
	}
	public function fecha($sem,$frase){
		$date=date("Ym");
		$nro=$this->azar();
		// encriptado
		$laFrase = "d".$sem[$nro] .$frase[$nro];
		$laClave = $sem[$nro].$date;
		// resultado.
		$this->local = $laClave;
		$this->pregunta = $laFrase;
		return array($laFrase,$laClave);
	
	}
	
	public function hora($sem,$frase){
		$date=date("dH");
		$nro=$this->azar();
		// encriptado
		$laFrase = "h".$sem[$nro] .$frase[$nro];
		$laClave = $sem[$nro].$date;
		// resultado.
		$this->local = $laClave;
		$this->pregunta = $laFrase;
		return array($laFrase,$laClave);
	
	}
	
}
