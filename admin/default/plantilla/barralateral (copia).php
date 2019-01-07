<?php

class menu extends html{
	
	private $usuario;
	private $grupo;
	private $objt;
	private $todo;
	public function __construct($noticias,$n_Mails,$config){
		$this->todo = new html("barralateral");
		
		$this->todo->add( new coment("inicio barra lateral"));
		$this->todo->add( new html("a",array("id"=>"show-sidebar",'class'=>"btn btn-sm btn-dark"),
			new html("i",array('class'=>"fas fa-bars"))
			));
		$this->todo->add( new html("nav",["id"=>"sidebar",'class'=>"sidebar-wrapper"]));
		$this->todo->nav->add( 
			[
				new html("div",['class'=>"sidebar-content",id=>"conenido" ],
				[
					/*encabezado y nombre de la compañia.*/
					new html("div",['class'=>"sidebar-brand",id=>"sidebar-head"],[
						new html("a",[href=>"#"],".COM")
						,new html("div",[id=>"close-sidebar"],
							new html("i",['class'=>"fas fa-times"])
						)
					])
				])
				,new coment("fin sidebar-content")
			]);
		$this->todo->nav->add(new coment("fin de contenido"));
		
		$this->todo->nav->div->add( new html("div",['class'=>"sidebar-header","id"=>"user"]));
		$this->todo->nav->div->add( new html("div",[ 'class'=>"sidebar-menu" , id=>"menu"]));
		$this->todo->nav->add( new html("div",[ 'class'=>"sidebar-footer", id=>"barrainferior"],
			[
				new html("a",[href=>"#"],[ new html("i",['class'=>"fa fa-bell"]) ,new html("span",['class'=>"badge badge-pill badge-warning notification"],$noticias) ])
				,new html("a",[href=>"#"],[ new html("i",['class'=>"fa fa-envelope"]) ,new html("span",['class'=>"badge badge-pill badge-success notification"],$n_Mails) ])
				,new html("a",[href=>"#"],[ new html("i",['class'=>"fa fa-cog"]) ,new html("span",['class'=>"badge-sonar"],$config) ])
				,new html("a",[href=>"#"],[ new html("i",['class'=>"fa fa-off"])  ])
					
			]));	
	}
	public function usuario($userame,$estado="OnLine",$img=""){
		$this->todo->nav->div->GetById("user")->add( [
				new html("div",array('class'=>"user-pic"),
					new html("img",array(
						'class'=>"img-responsive img-rounded"
						,"src"=>$img
						,"alt"=>"imagen usuario"
					))
				)
				,new html("div",['class'=>"user-info"],
					array(
						new html("span",['class'=>"user-name"] ,nz($username,"ROOT"))
						,new html("span",['class'=>"user-role"],"Administrador")
						,new html("span",['class'=>"user-status"],array(
							new html("i",['class'=>"fa fa-circle"])
							,new html("span",[],$estado)
						))
					))
		]);
		
	}
	public function buscador(){
		return new html("div",['class'=>"input-group"],
							[
								new html("input",["type"=>"text",'class'=>"form-control search-menu","placeholder"=>"Buscar..."])
								,new html("div",['class'=>"input-group-append"],
									new html("span",['class'=>"input-group-text"],
										new html("i",['class'=>"fa fa-search","aria-hidden"=>"true"]," ")
									))
							]);
						
	}
	public function grupo($nombre){
		$this->grupo[$nombre] = new html("li",['class'=>"header-menu",id=>"grupo_$nombre"],
			new html("span",array(),$nombre));
	}
	
	private function _menu($opciones,$nv=0){
		if (is_array($opciones)){
			$li=array();
			foreach($opciones as $k=>$v){
					switch($nv){
						case 0: // encabezado:
							$li["1_$k"]=new html("li",['class'=>"header-menu",id=>"grupo_$k",niv=>$nv],new html("span",[],$k));
							if (is_array($v)){
								
								$li["2_$k"]=new html("li",[ 'class'=>"sidebar-dropdown",id=>"desplegar_$k"]);
								$li["2_$k"]->add($this->_menu($v,$nv+1));
							}else{
								$li["1_$k"]->span->SetContent( new html("a",[href=>$v],$k));
							}
							break;
						case 1: // opcionesl:
							$li["1_$k"] = new html("a",[href=>"#",id=>"desplegar_$k",niv=>$nv]
								,[
									new html("i",['class'=>"fa fa-tachometer-alt"])
									,new html("span",[],$k)
								]);
							if (is_array($v)){
								$li["2_$k"]= new html("div",['class'=>"sidebar-submenu"], $this->_menu($v,$nv+1) );
							}
							break;
						
						default:
							$li[$k] = new html("li",[niv=>$nv]);
							if (is_array($v)){
								$li[$k]->add( $this->_menu($v,$nv+1));
							}else{
								$li[$k]->add( new html("a",[href=>$v],$k));
							}
							break;
					}
			}
			switch($nv){case 0:
				$mn=new html("ul",[],$li);break;
				case 1:
				$mn=new html("ul",[],$li);break;
				// $mn = new html("li" ,['class'=>"sidebar-dropdown"],$li);break;
				default:
				$mn=new html("ul",[],$li);break;
			}
			return $mn;
		}else
			return false;
		
		
	}
	
	public function interpreta($array){
		$this->grupo = $this->_menu($array);
/*		foreach($array as $k=>$v){
			// $this->grupo($k);
			$this->grupo[$k] = $this->_menu($v)	;
		}
*/
	}
	public function tab($n){
		$this->todo->tab($n);
	}
	public function __toString(){
		//$this->todo->nav->add([$this->usuario,$this->buscador()]);
		$this->todo->nav->div->GetById("menu")->add($this->grupo);
		$this->todo->add( new coment("fin de barra") );
		return (string) $this->todo;
	}
	
}

$barra = new menu(4,4,0);
$barra->usuario("Administrador","OnLine",$helper->url("img","user.jpg"));
$barra->interpreta( [
	Basico => [
		clientes => [
			listado => $helper->url("clientes","alta")
			, altas => $helper->url("clientes","altas")
		]
		, facturas => [
			"ultimas" => $helper->url("facturas","ultimas")
			, nueva => $helper->url("facturas","nueva")
		] 
	]
	, Avanzado => [
		Contratos => [
			listado => $helper->url("contratos","listado")
			,altas => $helper->url("contratos","nuevo")
		]
	
	]
]
);
$barra->tab(3);
return $barra;

?>                

