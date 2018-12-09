<?php

if(isset($_GET["ms"])){
	// un mensaje. del sistema:
	$msg = "<div class=\"col-md-3\">".$_GET["ms"]."</div>";
	
}else
	$msg="";
	

include("head.php") ;
include("head_index.php") ;
?>
</head>
    <body>
			<!-- pagina lateral-->
			<div class="col-md-10" id="paginaCentro" >
				<?php echo $msg ?>
				<section class="main row" >
				
					<!-- seccion de informacion -->
				<iframe src="<?php echo $helper->url("clientes","index" ) ?>" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame"  style="border: none;" ></iframe>
				<div class="nav-menu"><?php
					include("barralat.php");
				?>
				</div>
				<iframe src="<?php echo $helper->url("index","contenido" ) ?>" name="mainFrame" id="mainFrame" title="mainFrame" style="float:right;float: left; width: 100%; height: 600px;"></iframe>
				<div id="somediv" style="display:none">
				<p style="height: 400px">Este contenido esta dentro de la 
				pagina, y no debe exibirse.Si es asi es por que no funciona los 
				ajax.-</p>

				<script type="text/javascript">
				function openmypage(){ 
					//Define arbitrary function to run desired DHTML Window widget codes
					clientes=dhtmlwindow.open("Clientes", "ajax", <?php echo 
					'"'.$helper->url("clientes","listado" ) .'"' ?>, "Listado de Clientes", "width=450px,height=300px,left=300px,top=100px,resize=1,scrolling=1")
					clientes.onclose=function(){
						return window.confirm("Cerrar listado clientes?")} //Run custom code when window is about to be closed
					// mostrar estado.:
					clientes.setStatus("formulario listo...");
					}
				</script>

				<ul>
				<li><b><a href="#" onClick="openmypage(); return false">Crear/Abrir Ventana clientes</a> (in IE, this Ajax demo must be run online!)</b></li>
				<li><a href="#" onClick="clientes.moveTo('middle', 'middle'); return false">centrar</a></li>
				<li><a href="#" onClick="clientes.load('ajax', <?php echo "'".
					$helper->url("index","contenido" ) ."'" 
					?> , 'New Ajax Page'); return false">recargar contenido</a></li>
				<li><a href="#" onClick="clientes.show(); return false">Ver Listado clientes</a></li>
				</ul>

				<!-- 1) DHTML Window Example 1: -->

				<script type="text/javascript">

				var main=dhtmlwindow.open("main", "iframe", <?php echo '"'. $helper->url( "index", "contenido" ) .'"'
					?>, "formulario de clientes", "width=590px,height=350px,resize=1,scrolling=1,center=1", "recal")
				main.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
					return window.confirm("cerrar formulario?")
				}

				</script>

				<p>Play around with Window 1 (iframe content)</p>
				<ul>
				<li><a href="#" onClick="main.show(); return false">mostrar formulario</a></li>
				<li><a href="#" onClick="main.hide(); return false">ocultar formulario</a></li>
				<li><a href="#" onClick="main.load('iframe', <?php echo "'".
					$helper->url("clientes","contrato" ) ."'" 
					?>, 'formulario de contratos'); return false">cambiar formualrio a alta contratos.</a></li>
				<li><a href="#" onClick="main.load('iframe', <?php echo "'".
					$helper->url("facturacion","index" ) ."'" 
					?>, 'formulario de facturas'); return false">cambiar formualrio a alta de facturas.</a></li>
				<li><a href="#" onClick="main.load('iframe', <?php echo "'".
					$helper->url("equipos","index" ) ."'" 
					?>, 'formulario de Equipamientos'); return false">cambiar formualrio a alta contratos.</a></li>
				<li><a href="#" onClick="main.load('iframe', <?php echo "'".
					$helper->url("cobros","index" ) ."'" 
					?>, 'formulario de recibos'); return false">cambiar formualrio a alta de Recivos.</a></li>
				<li><a href="#" onClick="main.setSize(800, 500); return false">Resize Window to 800px by 600px</a></li>
				</ul>
				</div>

				</section>
			</div><!-- pagina centro -->
		
		
	<?php 
include("footer.php") ; 
?>
	
