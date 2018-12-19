<?php
			 

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
				if ( isset($idComppago)) {
					$idComppagor="?idRecibo=".$idComppago;
					$t=$comprobante->buscar("id",$idComppago);
					echo $comprobante->mostrar_editar("id")."\n";
					// var_dump($idfatura);
				}else{
					$idfacDetalle="";
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
/*					echo "\t\t\t\t<div class=\"form-group \">\n" ;
					echo $comprobante->mostrar_editar("idDeContrato")."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";
*/
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

				//var_dump($fatura);
				if ($detalle){ // existe un registro activo.
					/*
					echo "<iframe src=\"".
						$helper->url("facturas","iframe/detalle$idfacDetalle")."\" class=\"col-md-12\">factura detalle</iframe>";
					*/
				?>
				<div id="detalle"></div>
				<?php
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
					echo "<div class=\"row\"><div class=\"col-md-12\"><h2>primero se debe crear el recibo</h2></div></div>";
				
				}	
		
            ?>

            
		</div>
		
