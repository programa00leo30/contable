<?php
$c=new html("div",['class'=>"signup-form-container"]);
$c->add(new coment("form start"));
$c->add( new html("form",[ 
	role=>"form"
	,id=>"register-form"
	,autocomplete=>"off"
	,method=>"post"
	,action=>$helper->url("cobros","confirma",
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
/*
?>
		<div class="signup-form-container">
    
         <!-- form start -->
         <form role="form" id="register-form" autocomplete="off" method="post" action="<?php 
			echo $helper->url("cobros","confirmar",array(
			(($detalle)?"editarcheck":"recibonuevo") => "si" 
			,"idRecibo"=>$_GET["idRecibo"]
			)); ?>" >
         
         <div class="form-header">
			<div class="pull-left"></div>
				<h3 class="form-title">
				<span class="glyphicon glyphicon-pencil"></span>
				<i class="fa fa-user"></i>Datos de recibos:</h3>
         </div>
         
         <div class="form-body">
			 <!-- autoform start -->
            <?php
*/
				if ( isset($idComppago)) {
					$idComppagor="?idRecibo=".$idComppago;
					$t=$comprobante->buscar("id",$idComppago);
					// echo $comprobante->mostrar_editar("id")."\n";
					$idhtml= $comprobante->mostrar_editar("id")."\n";
					// var_dump($idfatura);
				}else{
					$idfacDetalle="";
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
						,new html("span",['class'=>"help-block",id=>"error"])
					])
				);
			}
			$id++;
		}
		
/*					echo "\t\t\t\t<div class=\"form-group \">\n" ;
				echo "\t\t\t\t<div class=\"form-group \">\n" ;
					echo $comprobante->mostrar_editar("medioPago")."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";
					echo "\t\t\t\t<div class=\"row\"><div class=\"form-group col-md-4\">\n" ;
					echo $comprobante->mostrar_editar("cajero")."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";
					echo "\t\t\t\t<div class=\"separate col-md-1\">-</div><div class=\"form-group col-md-4\">\n" ;
					echo $comprobante->mostrar_editar("nrocontrol")."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div></div>";					
					echo "\t\t\t\t<div class=\"form-group \">\n" ;
					echo $comprobante->mostrar_editar("Fecha",$html)."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";

					echo "\t\t\t\t<div class=\"form-group \">\n" ;
					echo $comprobante->mostrar_editar("idCliente",$html)."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";
					echo "\t\t\t\t<div class=\"form-group \">\n" ;
					echo $comprobante->mostrar_editar("idCobrador",$html)."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";
					echo $comprobante->mostrar_editar("idDeContrato")."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";
?>
			 <!-- autoform end -->
			 <div class="row">
				 <div class="form-group col-md-4">
				<?php echo $comprobante->mostrar_editar("Importe") ?>				
				 </div>
				 <div class="form-group col-md-4">
				<?php echo $comprobante->mostrar_editar("Observac") ?>
				</div>
			 </div>
            </div>
            
            <div class="form-footer">
                 <button type="submit" class="btn btn-info">
                 <span class="glyphicon glyphicon-log-in"></span> Enviar Datos !
                 </button>
            </div>


            </form>
            <?php
*/
			$grp[]=new html("div",['class'=>"form-footer"],
				new html("button",['class'=>"btn btn-info",type=>"submit"],[
					new html("span",['class'=>"glyphicon glyphicon-log-in"])
					,"Enviar Datos!"
					]));
			$grp[]=new html("div",['id'=>"detalle"]);

$c->form->GetById("form-body")->add($grp);					
				//var_dump($fatura);
if ($detalle){ // existe un registro activo.
					/*
					echo "<iframe src=\"".
						$helper->url("facturas","iframe/detalle$idfacDetalle")."\" class=\"col-md-12\">factura detalle</iframe>";
				?>
				<div id="detalle"></div>
				<?php
					*/

$tmpurl='"'. $helper->url("cobros","iframe/detalle",array("idRecibo"=>$idComppago)). '"';
// para que carge el detalle una vez cargado la pagina.
	
$html->javascript(<<<USOJAVA
$(document).ready(function(){
    $.ajax({
			url: $tmpurl, 
			success: function(result){
				$("#detalle").html(result);
				asociarEvento();
				sumar();
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

$("[id*=factDetalle]").submit(function(e) {
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
				sumar();
           }
         });

    // e.preventDefault(); // avoid to execute the actual submit of the form.
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
