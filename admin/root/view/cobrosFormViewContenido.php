<?php


$c=new html("div",['class'=>"signup-form-container"]);
$c->add(new coment("form start"));
$c->add( new html("form",[ 
	role=>"form"
	,id=>"register-form"
	,autocomplete=>"off"
	,method=>"post"
	,action=>$helper->url("cobros","confirmar",
		[ 
			(($detalle)?"editarcheck":"recibonuevo") => "si" 
			,"idRecibo"=>$_GET["idRecibo"]
			])
	]
));
$c->form->add( [
	new html("div",['class'=>"form-header"],[
		new html("div",['class'=>"pull-left"]),
			new html("h3",["form-title"],[
				new html("span",['class'=>"glyphicon glyphicon-pencil"] )
				,new html("i",['class'=>"fa fa-user"])
				,"Datos de recibo:"
			])
		])
	,new html("div",['class'=>"form-body",id=>"form-body"])
	]);
	
if ( isset($idComppago)) {
	$idComppagor="?idRecibo=".$idComppago;
	$t=$comprobante->buscar("id",$idComppago);
	// echo $comprobante->mostrar_editar("id")."\n";
	$idhtml= $comprobante->mostrar_editar("id")."\n";
	// var_dump($idfatura);
	$idclientes=$comprobante->idCliente;
}else{
	$idfacDetalle="";
	$idclientes=nz($idclientes,"");
	
	$idhtml=new html("div",['class'=>"hidden"],"nuevo");
}
				/*
				 * * `id`
				* `idCobrador`,
				* 
				* , `cajero`, `nrocontrol`,
				*  `idCliente`, `Fecha`, `Importe`, 
				*  `Observac`, `hasregistro`, `nombrecupon`, `cupon`, `fechacupon`,
				*  `hora`, `medioPago
				*/
	
	$grp=[];$id=1;
	$grp[]=$idhtml;
	foreach ( [ 
		["medioPago"=>"form-group"]
		,["cajero"=>"form-group col-md-4","nrocontrol"=>"form-group col-md-4"]
		,["Fecha"=>"form-group col-md-4"]
		,["idCliente"=>"form-group col-md-4","idCobrador"=>"form-group col-md-4"]
		,["Importe"=>"form-group col-md-4","Observac"=>"form-group col-md-4"]
		] as $val){
			$grp[$id]=new html("div",['class'=>"row",id=>$id]);
			foreach($val as $k=>$v){
				$grp[$id]->add( new html("div",['class'=>$v ],[
						$comprobante->mostrar_editar($k,$html)
						,new html("span",['class'=>"help-block",id=>"error_$k"])
					])
				);
				if ($k == "idCliente"){
					$cli=$comprobante->mostrar_editar($k,$html,$idclientes);
					$idBuscar="idClienteBusquedasCobros";
					$v = $cli->div->ul->getContent();
					// colocar la busqueda al principio.
					$cli->div->ul->SetContent( array_merge( 
						[ new html("input",
							[  "type"=>"search"
								,'class'=>"input-sm form-control"
								,"placeholder"=>"Buscar"
								// ,"onKeyPress"=>"filtrar('$idBuscar',event);"
								,"id"=>$idBuscar
							])  
						]
						, $v
						)
					);
					$html->javascript(<<<java
					var inival = $("#$idBuscar").val();
						$("#$idBuscar").change(function(){
						  if ( $("#$idBuscar").val() != inival ) {
							var lista = document.getElementById('$idBuscar').parentElement;
							alert("El campo ha cambiado");
							var buscar = lista.childNodes;
							for ( i=0;i<buscar.length;i++){
								if (buscar[i].childNodes.length > 0 ) {
									console.log("si el " + i );
									if ( buscar[i].childNodes.getElementsByTagName("a").innerHTML.indexOf( $("#$idBuscar").val() ) >= 0 ){
										buscar[i].childNodes.getElementsByTagName("a").style.backgroundColor = 'red';
									}else{
										buscar[i].childNodes.getElementsByTagName("a").style.backgroundColor = 'blue';
									}
								}
							}
						  }
						});
java
					);
					$html->javascript( "function filtrar( comon ,event){
						var codigo = event.which || event.keyCode;
						var lista = document.getElementById('$idBuscar').parentElement;
						var texto = document.getElementById('$idBuscar').innerText + String.fromCharCode( codigo );
						/*<ul><li><a></a></li></ul>*/
						var buscar = lista.childNodes;
						for ( i=0;i<buscar.length;i++){
							if (buscar[i].childNodes.length > 0 ) 
								if ( buscar[i].childNodes.item(0).innerHTML.indexOf( texto ) >= 0 ){
									buscar[i].childNodes.item(0).style.backgroundColor = 'red';
								}
						}
						/* alert( 'texto:' + comon); */
						};");
					
					$grp[$id]->SetContent(new html("div",['class'=>$v ],[
							$cli
							,new html("span",['class'=>"help-block",id=>"error_$k"])
						])
					);
				}
			}
			$id++;
		}
		

$grp[]=new html("div",['class'=>"form-footer"],
	new html("button",['class'=>"btn btn-info",type=>"submit"],[
		new html("span",['class'=>"glyphicon glyphicon-log-in"])
		,"Enviar Datos!"
		]));
$c->add( new html("div",['id'=>"detalle"]));

$c->form->GetById("form-body")->add($grp);					
				
if ($detalle){ 
	// existe un registro activo.
					

	$tmpurl='"'. $helper->url("cobros","iframe/detalle",["idRecibo"=>$idComppago] ). '"';
	// para que carge el detalle una vez cargado la pagina.
		
$html->javascript(<<<USOJAVA
$(document).ready(function(){
    $.ajax({
			url: $tmpurl, 
			success: function(result){
				$("#detalle").html(result);
				asociarEvento();
				/* sumar(); */
			}
		});

});
USOJAVA
);
// para sumar los totales..
$html->javascript(<<<USOJAVA
function sumar(){
	var totalDeuda=0;

	$("[name=subtotal]").each(function(){
		console.log("sumar:"+$(this).val());
		totalDeuda+=parseInt($(this).val()) || 0;
	});

	$("[name=Total]").val(totalDeuda);
}
USOJAVA
);

// para que los sume al modificar el campo.
$html->javascript(<<<USOJAVA
function asociarEvento(){

$("[id*=comppDetalle]").submit(function(e) {
    var form = $(this);
    var url = form.attr('action');
	/* alert("enviando formulario "+url); */
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               $("#detalle").html(data);
               // alert(data); // show response from the php script.
				asociarEvento();
				/* sumar(); */
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
    return false;
});
}
USOJAVA
);
				
}else{
$c->form->GetById("form-body")->add(new html("div",['class'=>"row"],
	new html("div",['class'=>"col-md-12"],
		new html("h2",[],"primero debe crear el recibo")
	)
));

//	echo "<div class=\"row\"><div class=\"col-md-12\"><h2>primero se debe crear el recibo</h2></div></div>";

}	

echo $c;
