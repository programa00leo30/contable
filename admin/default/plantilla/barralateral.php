<?php



$barra = new menu(0,0,0);
$barra->usuario("Administrador","OnLine",$helper->url("img","user.jpg"));
$barra->headerGrup(	"Basico" );
$barra->selectedCondicion("clientes",1,"#",
		/*opciones = array ("nombre"=>["href" "opciones","contenido"] */
	[
		listado => [ 
			$helper->url("clientes","listado") 
			,"listados" // new html("span",[ 'class'=>"badge badge-pill badge-success"],"pro") 
			,""
			]
		, altas => [
			$helper->url("clientes","altas")
			,"altas clientes"
			,""
		]
		, "suspendidos" => [
			$helper->url("clientes","listado",[ filtro=>"suspendidos"])
			,"Clientes Suspendidos"
			,""
		]
	]
	);
// $barra->selecionado("clientes");
$barra->selectedCondicion("Facturas",2,"#",
	[
	listado => [ 
			$helper->url("facturas","ultimas" )
			,"Ultimas Cargadas" // new html("span",[ 'class'=>"badge badge-pill badge-success"],"pro") 
			,""
			]
	
	
	,nueva => [ 
			$helper->url("facturas","nueva" )
			,"Crear Factura" // new html("span",[ 'class'=>"badge badge-pill badge-success"],"pro") 
			,""
			]
	
	]
);
$barra->selectedCondicion("Cobros",3,"#",
	[
	listado => [ 
			$helper->url("cobros","ultimos" ) 
			,"Listados de los ultimos cobros" // new html("span",[ 'class'=>"badge badge-pill badge-success"],"pro") 
			,""
			]
	
	
	,nueva => [ 
			$helper->url("cobros","nuevo" )
			,"Crear Recibo" // new html("span",[ 'class'=>"badge badge-pill badge-success"],"pro") 
			,""
			]
	
	]
);


$barra->headerGrup("Contratos");
$barra->selectedCondicion("Contratos",3,"#",
		/*opciones = array ("nombre"=>["href" "opciones","contenido"] */
	[
		listado => [ 
			$helper->url("contratos","index") 
			,"listados" // new html("span",[ 'class'=>"badge badge-pill badge-success"],"pro") 
			,""
			]
		, altas => [
			$helper->url("contratos","nuevo")
			,"Nuevo Contrato"
			,""
		]
		, "suspendidos" => [
			$helper->url("contratos","listado",[ filtro=>"suspendidos"])
			,"Clientes Suspendidos"
			,""
		]
	]
	);
$barra->selectedCondicion("planes",4,"#",
		/*opciones = array ("nombre"=>["href" "opciones","contenido"] */
	[
		listado => [ 
			$helper->url("planes","index") 
			,"listados" // new html("span",[ 'class'=>"badge badge-pill badge-success"],"pro") 
			,""
			]
		, altas => [
			$helper->url("planes","nuevo")
			,"Nuevo Plan"
			,""
		]
		, "suspendidos" => [
			$helper->url("contratos","listado",[ filtro=>"suspendidos"])
			,"Clientes Suspendidos"
			,""
		]
	]
	);
$barra->headerGrup("Extras");
$barra->selectedCondicion("Extras",2,"#",
	[
		"Contrato de clientes"=>[
			$helper->url("contratos","listado")
			,""
			,"Contrato con clientes"
		]
	]
);

$barra->tab(3);
$html->javascript( <<<texto
   jQuery(function ($) {

		$(".sidebar-dropdown > a").click(function() {
		  $(".sidebar-submenu").slideUp(100);
		  if (
			$(this)
			  .parent()
			  .hasClass("active")
		  ) {
			$(".sidebar-dropdown").removeClass("active");
			$(this)
			  .parent()
			  .removeClass("active");
		  } else {
			$(".sidebar-dropdown").removeClass("active");
			$(this)
			  .next(".sidebar-submenu")
			  .slideDown(200);
			$(this)
			  .parent()
			  .addClass("active");
		  }
		});

		$("#close-sidebar").click(function() {
		  $(".page-wrapper").removeClass("toggled");
		});
		$("#show-sidebar").click(function() {
		  $(".page-wrapper").addClass("toggled");
		});
	});

texto
);

return $barra;

?>                

