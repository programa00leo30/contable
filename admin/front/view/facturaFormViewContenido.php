<?php
/* --------- clientesFormulario
 * formulario de edicion y agregado de clientes
 *
 *
  `id` int(11) NOT NULL,
  `cajero` int(4) NOT NULL DEFAULT '0',
  `nrocontrol` int(11) DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `factCerrada` int(1) DEFAULT '0' COMMENT 'si la factura es posible modificarla',
  `idDeContrato` int(11) DEFAULT NULL COMMENT 'que contrato genero la factura',
  `tipFact` varchar(1) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'se refiere a fact A o B o C.',
  `Fecha` date DEFAULT NULL,
  `Total` decimal(12,4) NOT NULL,
  `Impuesto` decimal(12,4) NOT NULL,
  `Observaciones` text COLLATE utf8_spanish2_ci,
  `nroCupon` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL
*/				
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
			echo $helper->url("facturas","confirmar?".(($detalle)?"editar":"facturaNueva")."=si" ) ?>" >
         
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
				//var_dump($fatura);
				if ($detalle){ // existe un registro activo.
					echo "<iframe src=\"".
						$helper->url("facturas","iframe/detalle$idfacDetalle")."\" class=\"col-md-12\">factura detalle</iframe>";
				}else{
					echo "<div class=\"row\"><div class=\"col-md-2\"><h2>primero se debe crear la factura</h2></div></div>";
				}	
/*				
				foreach($fatura->columns() as $k ){
					echo "\t\t\t\t<div class=\"form-group \">\n" ;
					echo $fatura->mostrar_editar($k)."\n";
					echo "\t\t\t\t<span class=\"help-block\" id=\"error\"></span>
				</div>";
				}
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
            
		</div>
		
