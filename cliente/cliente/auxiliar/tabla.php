<?php

class tabla{

	private $celda
	,$atributos
	,$hoja
	,$sheet;
	
	public function __construct($cols,$rows,$tipo="table",$id=[id=>0]){
		// cantidad de columnas
		$this->hoja["cols"]["count"]=$cols;
		// cantidad de filas
		$this->hoja["rows"]["count"]=$rows;
		$this->hoja["atr"]=$id;
	
	}
	public function SetCelda($x,$y,$valor){
		$this->celda[$x][$y]=$valor;
	}
	public function GetCelda($x,$y){
		return $this->celda[$x][$y];
	}
	public function GetColumn($x){
		return $this->celda[$x];
	}
	public function GetRow($y){
		$rt=[];
		foreach($this->celda as $c)
			$rt[]=$c[$y];
		return $rt;
	}
	public function SetAtrCelda($x,$y,$atr) {
		$this->atributos[$x][$y]=$atr;
	}
	public function SetAtrRow($y,$atr){
		$this->hoja["rows"][$y]=$atr;
	}
	public function SetAtrCols($x,$atr){
		$this->hoja["cols"][$x]=$atr;
	}
	public function constructTable(){
		/* ***********************
		 * constructor de la tabla
		 * ***********************/
		$rt=new html("table",$this->hoja["atr"]);
		
		for($x=0;$x<$this->hoja["cols"]["count"];$x++){
			$cel=[];
			for($y=0;$y<$this->hoja["rows"]["count"];$y++){
				$atr=[];
				if(isset($this->hoja["rows"][$y]))$atr=$this->hoja["rows"][$y];
				if(isset($this->celda[$x][$y]))$contenido=$this->celda[$x][$y];
				else $contenido = "";
				$cel[] = new html("td",$atr, $contenido); 
			}
			$rt->add( new html("tr",[],$cel));
		}
		return $rt;
	}
	public function __tostring(){
			
		return $this->constructTable();
	} 
}
