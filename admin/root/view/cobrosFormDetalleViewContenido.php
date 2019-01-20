<?php

$detalle=new html("div",['class'=>"signup-form-container"],[
	new coment("inicio formulario")
	, new html("div",['class'=>"form-header"],
		[
			new html("div",['class'=>"pull-lef"])
			,new html("h3",['class'=>"form-title"],[
				new html("i",['class'=>"fa fa-user"])
				,"detalle recibos:"
				])
		])
	,new html("div",['class'=>"table",id=>'tabla0'])
]);

$encabezado=[]; 
 foreach( [
	"#id"=>"col-sm-1"
	,"idRecibo"=>"hidden"
	,"idfactura"=>"col-sm-4"
	,"ImporteAplicado"=>"col-sm-3"
	,"otros"=>"col-sm-2"
	,"accion"=>"col-sm-2"
 ] as $k=>$v){
	$encabezado[] = new html("div",['class'=> $v ],$k);
};
 
 $detalle->GetById("tabla0")->add(
	new html("div",['class'=>"row"],$encabezado)
 );
 
 $recibo->buscar("id",$idRecibo);
 
 $detalle->GetById("tabla0")->add(
	new html("div",['id'=>"idReciboCliente"],"recibo cliente:".$recibo->idCliente)
 );
	
$campos=[];
$comp_detalle->sql_cliente($recibo->idCliente);

while( $comp_detalle->mostrar("idComprob",$idRecibo) ){
		$campos[]=new html("form",[
				role=>"form"
				,id=>"comppDetalle_" . $comp_detalle->id
				,autocomplete=>"off"
				,method=>"post"
				,action=>$helper->url("cobros","confirmardetalle",[ idRecibo=> $idRecibo ])
				
			],
				new html("div",['class'=>"row"],[
					new html("div",['class'=>"col-sm-1"],$comp_detalle->mostrar_editar("id",$html))
					,new html("div",['class'=>"hidden"],$comp_detalle->mostrar_editar("idComprob",$html))
					,new html("div",['class'=>"col-sm-4"],$comp_detalle->mostrar_editar("idFactura",$html))
					,new html("div",['class'=>"col-sm-3"],$comp_detalle->mostrar_editar("ImporteAplicado",$html))
					,new html("div",['class'=>"col-sm-2"],$comp_detalle->mostrar_editar("otros",$html))
					,new html("div",['class'=>"col-sm-2"],[
						new html("button",['class'=>"btn btn-info btn-circle",'type'=>"submit",id=>"detalleeditar",name=>"detalleenviar",value=>$comp_detalle->id]
							,[new html("span",['class'=>"glyphicon glyphicon-pencil"]),"!"])
						,new html("button",['class'=>"btn btn-info btn-circle"
							,'type'=>"submit",id=>"detalledelete",name=>"detalledelete"
							,value=>$comp_detalle->id]
							,[new html("span",['class'=>"glyphicon glyphicon-remove"]),"X"])
					])
				])
		);
}

$campos[]=new html("form",[
				role=>"form"
				,id=>"comppDetalle_" . $comp_detalle->id
				,autocomplete=>"off"
				,method=>"post"
				,action=>$helper->url("cobros","confirmardetalle",[ idRecibo=> $idRecibo ])
				
			],
				new html("div",['class'=>"row"],[
					new html("div",['class'=>"col-sm-1"],"#")
					,new html("div",['class'=>"hidden"],$comp_detalle->mostrar_editar("idComprob",$html,$idRecibo ))
					,new html("div",['class'=>"col-sm-4"],$comp_detalle->mostrar_editar("idFactura",$html,""))
					,new html("div",['class'=>"col-sm-3"],$comp_detalle->mostrar_editar("ImporteAplicado",$html,""))
					,new html("div",['class'=>"col-sm-2"],$comp_detalle->mostrar_editar("otros",$html,""))
					,new html("div",['class'=>"col-sm-2"],[
						new html("button",['class'=>"btn btn-info btn-circle"
							,'type'=>"submit",id=>"addDetalle",name=>"detalleadd"
							,value=>$comp_detalle->id]
							,[
								new html("span",['class'=>"glyphicon glyphicon-remove"])
								,"+"
							])
					])
				])
		);

 $detalle->GetById("tabla0")->add(
	new html("div",['class'=>"row"],$campos)
 );

echo $detalle;
	
