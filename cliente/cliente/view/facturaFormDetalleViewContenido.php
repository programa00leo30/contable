<?php


$detalle = new html("div",array("class"=>"panel-body"));
$detalle->tab(5);
$detalle->add(new html("h3",array("class"=>"panel-title"),"Detalle($idfactura)"));
//$detalle->add(new html("table",array("class"=>"table table-condensed")));
$detalle->add(new html("div",array("class"=>"row",id=>"head")));

$detalle->div->add(new html("div",['class'=>"col-md-2"],"Producto"));
$detalle->div->add(new html("div",['class'=>"col-md-2"],"Cantidad"));
$detalle->div->add(new html("div",['class'=>"col-md-2"],"Precio"));
$detalle->div->add(new html("div",['class'=>"col-md-2"],"Importe"));
$detalle->div->add(new html("div",['class'=>"col-md-3"],"acciones/eventos"));


$cont=0;
while( $fact_detalle->mostrar("idFact",$idfactura) ){
	$detalle->add(
		[
		new html("div",['class'=>"w-100 d-none d-md-block" ,"id"=>"tab_".$cont])
		,new html("form",array(
				"role"=>"form"
				,"id"=>"facDetalle_".$fact_detalle->id
				,"autocomplete"=>"off"
				,"method"=>"post"
				,"action"=>$helper->url("facturadetalle","confirmardetalle",["id"=>$fact_detalle->id ])
			),[	
				new html("div",array("class"=>"col-md-2")
					,array(
						new html("div",['class'=>"hidden"],$fact_detalle->mostrar_editar("id",$html))
						,$fact_detalle->mostrar_editar("Detalle",$html)
					)
				) 
				,new html("div",array("class"=>"col-md-2")
					,[
						new html("div",['class'=>"hidden"],$fact_detalle->mostrar_editar("idFact",$html,$idfactura))
						,$fact_detalle->mostrar_editar("Cantidad",$html)
						
					]
				)
				,new html("div",array("class"=>"col-md-2"),$fact_detalle->mostrar_editar("porunidad",$html))
				,new html("div",array("class"=>"col-md-2"),$fact_detalle->mostrar_editar("subtotal",$html))
				,new html("div",array("class"=>"col-md-3"),
					new html("div",array("class"=>"form-footer"),
						array(
							new html("button",array(
								"class"=>"btn btn-info btn-circle"
								, "id"=>"enviar" ,"name"=>"boton"
								,"type"=>"submit", "value"=>"change"
								, "action"=>"agregar(this,'change');"
								),new html("span",array("class"=>"glyphicon glyphicon-pencil"),"edit")
							)
							,new html("button",array(
								"class"=>"btn btn-info btn-circle"
								, "id"=>"enviar" ,"name"=>"boton"
								, "type"=>"submit", "value"=>"delete"
								, "action"=>"alert('me has apretado');"
								),new html("span",array("class"=>"glyphicon glyphicon-pencil"),"dele")
							)
						)
					)
				)
			])
		]);
// fin de listado de registros.
$cont++;
}
	$detalle->div->add(new html("div",['class'=>"w-100", "id"=>"tab_".$cont],
			new html("form",array(
				"role"=>"form"
				,"id"=>"facDetalle_".$fact_detalle->id
				,"autocomplete"=>"off"
				,"method"=>"post"
				,"action"=> $helper->url("facturadetalle","confirmar",[ "agregar"=>"si"] )
			),[
			new html("div",["class"=>"col-md-2"],$fact_detalle->mostrar_editar("Detalle",$html,""))
			,new html("div",['class'=>"hidden"],$fact_detalle->mostrar_editar("idFact",$html,$idfactura))
			,new html("div",array("class"=>"col-md-2"),$fact_detalle->mostrar_editar("Cantidad",$html,""))
			,new html("div",array("class"=>"col-md-2"),$fact_detalle->mostrar_editar("porunidad",$html,""))
			,new html("div",array("class"=>"col-md-2"),$fact_detalle->mostrar_editar("subtotal",$html,""))
			,new html("div",array("class"=>"col-md-3"),
				new html("div",array("class"=>"form-footer"),
					new html("button",array(
						"type"=>"submit","class"=>"btn btn-info btn-circle"
						, "id"=>"enviar" ,"name"=>"boton", "value"=>"add"
						),array( 
							new html("span",array("class"=>"glyphicon glyphicon-log-in")," ")
							,"agregar")
						)	
					)
				)
			])
			
		)
	);

echo $detalle;
