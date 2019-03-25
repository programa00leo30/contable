<?php
// $editar=( ( $contratos->selecionado() )? $contratos->mostrar_editar("id",$html) : "" );

$editar=( ( isset($editar) && $editar <> false )? new html("input",[type=>"hidden",value=>$editar,name=>"id"]) : "" );

$form=new html("form",[
	"role"=>"form"
	,"id"=>"Contrato"
	,"autocomplete"=>"off"
	,"method"=>"post"
	,"action"=>$helper->url("contratos","confirmar" )
]);

// $form->noClose();

$form->add( $editar );
$form->add( new coment("sin carga ahun $editar"));

$tabla=new html("table",[border=>0,cellspacing=>0,'class'=>"Tabla2"]);
$tabla->add(new html("colgroup",[]));
// los tamaños de las columnas:
foreach ( [125,100,82,20,178,240] as $c) $tabla->colgroup->add(new html("col",[width=>$c]));//;$cols=[];

$tabla->add( new html("tr",[]
	, new html("td",[colspan=>6,style=>"text-align:left;width:2.852cm;"]
		, new html("p",[],"CONTRATO DE SUSCRIPCION")
	)));
$tabla->add( new html("tr",[id=>"fechaAlta"]
	, [
		new html("td",[colspan=>3],
			$contratos->mostrar_editar("fechaalta",$html))
		,new html("td",[colspan=>3],
			[
				new html("p",[],["seccion",new html("div",['class' =>"col col-md-6"], $contratos->mostrar_editar("seccion",$html))])
				,new html("p",[],["Nro:",new html("div",['class' =>"col col-md-6"], $contratos->mostrar_editar("nrocontrato",$html))])
			])
	]));
	
$tabla->add( new html("tr",[],new html("td",[colspan=>6])));
$tabla->add( new html("tr",[],new html("td",[colspan=>6],new html("p",[],"DATOS PERSONALES DEL TITULAR"))));
$tabla->add( new html("tr",[],new html("td",[colspan=>6])));

$tabla->add( new html("tr",[],new html("td",[colspan=>6]
,[
	new html("div",[]
		, [ new html("label",[],"Apellido y nombre - Razon social:")
		, $contratos->mostrar_editar("idCliente",$html,$idCliente)
		])
])));

$tabla->add( new html("tr",[],new html("td",[colspan=>6])));
$tabla->add( new html("tr",[],new html("td",[colspan=>6],new html("p",[],"DATOS DEL PLAN MONTOS Y PERIODICIDAD"))));
$tabla->add( new html("tr",[],new html("td",[colspan=>6])));

$tabla->add( new html("tr",[],new html("td",[colspan=>6]
,[
	new html("div",[]
		, [ new html("label",[],"PLAN:")
		, $contratos->mostrar_editar("idPlan",$html)
		])
	,new html("div",[]
		, [ 
			new html("label",['class'=>"col col-md-2"],"periodicidad ( * = todos ):")
			, new html("div",['class'=>"col col-md-2"],[ new html("label",[],"minutos:"),$contratos->mostrar_editar("Minutos",$html)])
			,  new html("div",['class'=>"col col-md-2"],[ new html("label",[],"horas:"),$contratos->mostrar_editar("Horas",$html)])
			,  new html("div",['class'=>"col col-md-2"],[ new html("label",[],"dia del mes:"),$contratos->mostrar_editar("DiaMes",$html)])
			,  new html("div",['class'=>"col col-md-2"],[ new html("label",[],"meses:"),$contratos->mostrar_editar("Mes",$html)])
			,  new html("div",['class'=>"col col-md-2"],[ new html("label",[],"dia de la semana:"),$contratos->mostrar_editar("DiaSemana",$html)])
		])
	,new html("div",[]
		, [ new html("label",[],"accion a realizar:")
		, $contratos->mostrar_editar("Comando",$html)
		])
])));

$tabla->add( new html("tr",[],new html("td",[colspan=>6]
,[
	new html("div",[]
		, [ new html("label",[],"Encargado del Alta:")
		, $contratos->mostrar_editar("idEmpleado",$html)
		])
])));

$tabla->add( new html("tr",[],new html("td",[colspan=>6])));
$tabla->add( new html("tr",[],new html("td",[colspan=>6],new html("p",[],"OTROS DATOS:"))));
$tabla->add( new html("tr",[],new html("td",[colspan=>6])));

$tabla->add( new html("tr",[],new html("td",[colspan=>6]
,[
	new html("div",[]
		, [ new html("label",[],"ESTADO:")
		, $contratos->mostrar_editar("Estado",$html)
		])
])));
$tabla->add( new html("tr",[],new html("td",[colspan=>6]
,[
	new html("div",[]
		,[ 
			new html("label",['class'=>"col col-md-2"],"EQUIPO:")
			, new html("div",['class'=>"col col-md-2"],[ new html("label",[],"IP:"),$contratos->mostrar_editar("ip",$html)])
			, new html("div",['class'=>"col col-md-4"],[ new html("label",[],"EQUIPO:"),$contratos->mostrar_editar("idEquipo",$html)])
		])
])));



$form->add( $tabla );
$form->add( new html("button",[type=>"submit",'class'=>"btn btn-info"],"enviar"));
// $form->tab(5);
echo $form;
