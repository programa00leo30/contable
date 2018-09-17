<?php
/* --------- clientesFormulario
 * formulario de edicion y agregado de clientes
	test:
<div class="row">
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
</div>
	
 */
if (!isset($l)) $l="";
$ngroup = "has-error has-feedback";
$inputgroup = "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span><div class=\"warning\" >$mensaje</div>";
// necesario agregar javascript. funciones requeridas para los campos espceciales como fecha-hora 

$html->javascript("",$helper->url("js","bootstrap-datetimepicker.min.js"));

?>
		<div class="signup-form-container">
    
         <!-- form start -->
         <form role="form" id="register-form" autocomplete="off" method="post" action="<?php 
			echo $helper->url("clientes","confirmar" ) ?>" >
         
         <div class="row"><div class="col-md-12">-------</div></div>
		 <div class="form-header">
			<div class="pull-left"></div>
				<h3 class="form-title">
				<span class="glyphicon glyphicon-pencil"></span>
				<i class="fa fa-user"></i>Datos de cliente:</h3><?php echo $l ; ?>
         </div>
         
         <div class="form-body">
		 <div class="col-sm-24 col-md-11">
			 <!-- autoform start -->
<?php
	if ( isset($clientes)) {
		$clientes->buscar("id",$idCliente);
	}
	foreach($clientes->columns() as $k ){
			?>
				<div class="form-group">
					<?php echo $clientes->mostrar_editar($k,$html) ?>
					<span class="help-block" id="error"></span>
				</div><!-- div cierre grupo <?php echo $k ?>-->
			<?php } ; ?>
			 <!-- autoform end -->
            </div>
            </div>
            
            <div class="form-footer">
                 <button type="submit" class="btn btn-info">
                 <span class="glyphicon glyphicon-log-in"></span> Enviar Datos !
                 </button>
            </div>


            </form>
            
		</div>
<?php



?>
