<?php

class menu extends html{
	
	private $usuario;
	private $grupo;
	private $objt;
	private $todo;
	public function __construct($noticias,$n_Mails,$config){
		parent::__construct("nav",["id"=>"sidebar",'class'=>"sidebar-wrapper"]);
		// $this = new html("nav",["id"=>"sidebar",'class'=>"sidebar-wrapper"]);
		
		/* **************************************************
		 * 
		 * dentro de la barra hay 3 sectores: 
		 * 	el a href, que es el link para abrir la barra
		 *  el nav, que es la barra propiamente dicha
		 *  el main, que es donde debe estar la pagina.
		 * 
		 * ************************************************** */

		{$this->add( 	[ new html("div",['class'=>"sidebar-content",id=>"contenido_menu" ],
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
				,new html("div",['class'=>"sidebar-footer",id=>"contenido_footer"])
				,new coment("fin de pie de barra")
			]);
		}
		
		$this->getById("contenido_menu")->add( new html("div",['class'=>"sidebar-header","id"=>"user"]));
		$this->getById("contenido_menu")->add( new html("div",[ 'class'=>"sidebar-menu" , id=>"menu"]));
		$this->getById("contenido_footer")->add( 
			[
				 new html("a",[href=>"#"],[ 
					new html("i",['class'=>"fa fa-bell"]) 
					,$this->noticias($noticias,"badge-warning notification") ])
				,new html("a",[href=>"#"],[ 
					new html("i",['class'=>"fa fa-envelope"]) 
					,$this->noticias($n_Mails,"badge-success notification")])
				,new html("a",[href=>"#"],[ 
					new html("i",['class'=>"fa fa-cog"]) 
					,new html("span",['class'=>"badge-sonar"],$config) ])
				,new html("a",[href=>"#"],[ new html("i",['class'=>"fa fa-off"])  ])
					
			]);	
	}
	private function noticias($n,$estilo){
		
		if ($n<>0)
		return new html("span",['class'=>"badge badge-pill $estilo"],$n) ;
		else
			return "";
		
	}	
	public function usuario($userame,$estado="OnLine",$img=""){
		$this->div->GetById("user")->add( [
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
	public function headerGrup($nombre){
		$this->getById("contenido_menu")->getById("menu")->add( new html("li",['class'=>"header-menu",id=>"grupo_$nombre"],
			new html("span",[],$nombre))
			);
	}
	private function submenu($opciones){
		
		$div=new html("div",['class'=>"sidebar-submenu"]);
		$div->add( new html("ul",[]) );
		/*opciones = array ("nombre"=>["href" "opciones","contenido"] */
		foreach($opciones as $k=>$v){
			
			$div->ul->add(
				new html("li",[],
				new html("a",[href=>$v[0] ]
					, 
					[ $v[1] , $v[2] ]
					)
				));
		}
		return $div ;
	}
	
	public function selectedCondicion($nombre,$arg=0,$href="#",$opciones=""){
		/*0 <= $arg >= 8 */
		$estilo=[ ""
			,"fa fa-tachometer-alt","fa fa-shopping-cart"
			,"fa fa-gem","fa fa-chart-line"
			,"fa fa-globe","fa fa-calendar"
			,"fa fa-folder","fa fa-book"
			][$arg];
		$ahref=new html("a",[href=>$href]);
		$ahref->add(new html("i",['class'=>$estilo]));
		$ahref->add(new html("span",[],$nombre));
		$div="";
		$opt=["id"=>$nombre];
		if ( is_array($opciones )){
			$opt=array_merge($opt,['class'=>"sidebar-dropdown"]);
			$div = $this->submenu( $opciones );
		}			
		
		$this->getById("contenido_menu")->getById("menu")->add( new html("li", $opt, [ $ahref ,$div]	) );
		
	}
	public function selecionado($nombre){
		
		$this
			->getById("contenido_menu")
				->getById("menu")
					->GetById($nombre)->SetAtr(
			'class' , $this->getById("contenido_menu")->getById("menu")->GetById($nombre)->GetAtr('class') . " active")
		;
		
		
	}
	public function __toString(){
		//$this->nav->add([$this->usuario,$this->buscador()]);
		$this->div->GetById("menu")->add($this->grupo);
		$this->add( new coment("fin de barra") );
		
		return parent::__toString();
		// return (string) $this;
	}
	
}
