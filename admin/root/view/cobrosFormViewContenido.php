<?php
			
if (!isset($l)) $l="";
$ngroup = "has-error has-feedback";
/*
if (!isset($mensaje))$mensaje="";
$inputgroup = "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span><div class=\"warning\" >$mensaje</div>";
*/
?>
		<div class="signup-form-container">
    
         <!-- form start -->
         <form role="form" id="register-form" autocomplete="off" method="post" action="<?php 
			echo $helper->url("cobros","confirmar?".(($detalle)?"editar":"facturaNueva")."=si" ) ?>" >
         
         <div class="form-header">
			<div class="pull-left"></div>
				<h3 class="form-title">
				<span class="glyphicon glyphicon-pencil"></span>
				<i class="fa fa-user"></i>Datos de factura:</h3><?php echo $l ; ?>
         </div>
         
         <div class="form-body">
			 <!-- autoform start -->
            <?php
				if ( isset($idfatura)) {
					$idfacDetalle="?idfac=".$idfatura;
					$t=$fatura->buscar("id",$idfatura);
					echo $fatura->mostrar_editar("id")."\n";
					// var_dump($idfatura);
				}else{
					$idfacDetalle="";
				}
				echo "\t\t\t\t<div class=\"form-group \">\n" ;
					echo $fatura->mostrar_editar("tipFact")."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";
					echo "\t\t\t\t<div class=\"row\"><div class=\"form-group col-md-4\">\n" ;
					echo $fatura->mostrar_editar("cajero")."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";
					echo "\t\t\t\t<div class=\"separate col-md-1\">-</div><div class=\"form-group col-md-4\">\n" ;
					echo $fatura->mostrar_editar("nrocontrol")."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div></div>";					
					echo "\t\t\t\t<div class=\"form-group \">\n" ;
					echo $fatura->mostrar_editar("Fecha",$html)."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";

					echo "\t\t\t\t<div class=\"form-group \">\n" ;
					echo $fatura->mostrar_editar("idCliente",$html)."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";
					echo "\t\t\t\t<div class=\"form-group \">\n" ;
					echo $fatura->mostrar_editar("idEmpleado",$html)."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";
/*					echo "\t\t\t\t<div class=\"form-group \">\n" ;
					echo $fatura->mostrar_editar("idDeContrato")."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";
*/
?>
			 <!-- autoform end -->
			 <div class="row">
				 <div class="form-group col-md-4">
				<?php echo $fatura->mostrar_editar("Impuesto") ?>				
				 </div>
				 <div class="form-group col-md-4">
				<?php echo $fatura->mostrar_editar("Total") ?>
				 </div>
				 <div class="form-group col-md-4">
				<?php echo $fatura->mostrar_editar("Observaciones") ?>
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
				$tmpurl='"'. $helper->url("facturas","iframe/detalle",array("idfac"=>$idfatura)). '"';
				
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
					echo "<div class=\"row\"><div class=\"col-md-12\"><h2>primero se debe crear la factura</h2></div></div>";
				
				}	
		
            ?>

            
		</div>
		
