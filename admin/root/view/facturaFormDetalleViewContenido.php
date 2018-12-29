<?php


$detalle = new html("div",array("class"=>"panel-body"));
$detalle->tab(5);
$detalle->add(new html("h3",array("class"=>"panel-title"),"Detalle"));
$detalle->add(new html("table",array("class"=>"table table-condensed")));
$detalle->table->add(new html("thead"));
$detalle->table->thead->add(new html("tr"));
$detalle->table->thead->tr->add(new html("th",array(),"Producto"));
$detalle->table->thead->tr->add(new html("th",array(),"Cantidad"));
$detalle->table->thead->tr->add(new html("th",array(),"Precio"));
$detalle->table->thead->tr->add(new html("th",array(),"Importe"));
$detalle->table->thead->tr->add(new html("th",array(),array(
	"acciones"
	,"eventos"
)));

$cont=0;
while( $fact_detalle->mostrar("idFact",$idfactura) ){
	$detalle->table->add(new html("tr",array("id"=>"tab_".$cont),
			new html("form",array(
				"role"=>"form"
				,"id"=>"facDetalle_".$fact_detalle->id
				,"autocomplete"=>"off"
				,"method"=>"post"
				,"action"=>$helper->url("facturadetalle","confirmardetalle?iddetalle=".$fact_detalle->id )
			))
		)
	);
	$detalle->table->GetById("tab_".$cont)->form->add(new html("td",array("class"=>"col-sm-1")
			,array(
				$fact_detalle->mostrar_editar("id",$html)
				,$fact_detalle->mostrar_editar("Detalle",$html)
			)
		)); 
	$detalle->table->GetById("tab_".$cont)->form->add(new html("td",array("class"=>"col-sm-1")
			,array(
				$fact_detalle->mostrar_editar("idFact",$html)
				,$fact_detalle->mostrar_editar("Cantidad",$html)
			)
		)); 
	$detalle->table->GetById("tab_".$cont)->form->add(new html("td",array("class"=>"col-sm-1")
			,$fact_detalle->mostrar_editar("porunidad",$html)
		)); 
	$detalle->table->GetById("tab_".$cont)->form->add(new html("td",array("class"=>"col-sm-1")
			,$fact_detalle->mostrar_editar("subtotal",$html)
		)); 
	$detalle->table->GetById("tab_".$cont)->form->add(new html("td",array("class"=>"col-sm-2"),
		new html("div",array("class"=>"form-footer"),
			array(
				new html("button",array(
					"type"=>"submit","class"=>"btn btn-info btn-circle"
					, "id"=>"enviar" ,"name"=>"boton", "value"=>"change"
					),new html("span",array("class"=>"glyphicon glyphicon-pencil")," ")
				)
				,new html("button",array(
					"type"=>"submit","class"=>"btn btn-info btn-circle"
					, "id"=>"enviar" ,"name"=>"boton", "value"=>"delete"
					),new html("span",array("class"=>"glyphicon glyphicon-pencil")," ")
				)
			)
		)
	));
// fin de listado de registros.
$cont++;
}
	$detalle->table->add(new html("tr",array("id"=>"tab_".$cont),
			new html("form",array(
				"role"=>"form"
				,"id"=>"facDetalle_".$fact_detalle->id
				,"autocomplete"=>"off"
				,"method"=>"post"
				,"action"=>$helper->url("facturadetalle","confirmardetalle?iddetalle=".$fact_detalle->id )
			))
		)
	);
	$detalle->table->GetById("tab_".$cont)->form->add(new html("td",array("class"=>"col-sm-1")
			,array(
				"##"
				,$fact_detalle->mostrar_editar("Detalle",$html)
			)
		)); 
	$detalle->table->GetById("tab_".$cont)->form->add(new html("td",array("class"=>"col-sm-1")
			,array(
				$fact_detalle->mostrar_editar("idFact",$html)
				,$fact_detalle->mostrar_editar("Cantidad",$html)
			)
		)); 
	$detalle->table->GetById("tab_".$cont)->form->add(new html("td",array("class"=>"col-sm-1")
			,$fact_detalle->mostrar_editar("porunidad",$html)
		)); 
	$detalle->table->GetById("tab_".$cont)->form->add(new html("td",array("class"=>"col-sm-1")
			,$fact_detalle->mostrar_editar("subtotal",$html)
		)); 
	$detalle->table->GetById("tab_".$cont)->form->add(new html("td",array("class"=>"col-sm-2"),
		new html("div",array("class"=>"form-footer"),
			
				new html("button",array(
					"type"=>"submit","class"=>"btn btn-info btn-circle"
					, "id"=>"enviar" ,"name"=>"boton", "value"=>"add"
					),array( 
						new html("span",array("class"=>"glyphicon glyphicon-log-in")," ")
						,"agregar")
				)
			
		)
	));

echo $detalle;
