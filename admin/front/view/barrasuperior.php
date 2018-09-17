<?php
// genera una barra superior.

?>
	<style type="text" >
	.navbar-nav.navbar-center {
		position: absolute;
		left: 50%;
		transform: translatex(-50%);
	}	
	</style>
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand" >LEAL-COMUNICACIONES</a>
		</div>
		<div class="navbar-collapse collapse" id="navbarCollapse">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="<?php echo $helper->url("index","index" ) ?>">informacion general</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-center">
				<li class="dropdown" >
					<a data-toggle="dropdown" class="dropdown-toggle" href="<?php 
						echo $helper->url("clientes","index" ) ?>">clientes/facturacion<b class="caret"></b></a>
					<ul role="menu" class="dropdown-menu" >						
						<li><a href="<?php 
							echo $helper->url("clientes","listado" ) ?>">clientes listado</a></li>
						<li><a href="<?php 
							echo $helper->url("clientes","altas" ) ?>">clientes altas</a></li>
						<li><a href="<?php 
							echo $helper->url("clientes","listado?filtro=suspendidos" ) ?>">clientes suspendidos/eliminados</a></li>
						<li><a href="<?php 
							echo $helper->url("clientes","contratos" ) ?>">contratos</a></li>
						<li><a href="<?php 
							echo $helper->url("clientes","planes" ) ?>">planes</a></li>
					</ul>
				</li>
				<li class="dropdown" >
					<a data-toggle="dropdown" class="dropdown-toggle" href="<?php 
						echo $helper->url("equipos","index" ) ?>">equipos/mantenimientos<b class="caret"></b></a>
					<ul role="menu" class="dropdown-menu" >						
						<li><a href="<?php 
							echo $helper->url("equipos","listado" ) ?>">listado de equipos</a></li>
						<li><a href="<?php 
							echo $helper->url("equipos","index" ) ?>">listado de mantenimientos</a></li>
						<li><a href="<?php 
							echo $helper->url("index","index" ) ?>">comandos para los equipos</a></li>
						<li><a href="<?php 
							echo $helper->url("index","index" ) ?>">chequeos</a></li>
					</ul>
				</li>
				<li class="dropdown" >
					<a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo $helper->url("index","index" ) ?>">herramientas<b class="caret"></b></a>
					<ul role="menu" class="dropdown-menu" >						
						<li><a href="<?php 
							echo $helper->url("index","index" ) ?>">configuracion de panginas</a></li>
						<li><a href="<?php 
							echo $helper->url("index","index" ) ?>">configuracion de contratos</a></li>
						<li><a href="<?php 
							echo $helper->url("index","index" ) ?>">configuracion de planes</a></li>
						<li><a href="<?php 
							echo $helper->url("index","index" ) ?>">configuracion de periodos</a></li>
						<li><a href="<?php 
							echo $helper->url("index","index" ) ?>">configuracion de tazas</a></li>
						<li><a href="<?php 
							echo $helper->url("index","index" ) ?>">empleados</a></li>
						<li><a href="<?php 
							echo $helper->url("index","index" ) ?>">otras configuraciones</a></li>
						<li><a href="<?php 
							echo $helper->url("index","index" ) ?>">estados de este servidor</a></li>
						<li><a href="<?php 
							echo $helper->url("index","index" ) ?>">backups y resptauraciones</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo $helper->url("index","index" ) ?>">Acerca de <b class="caret"></b></a>
					<ul role="menu" class="dropdown-menu">
						<li><a href="<?php echo $helper->url("index","index" ) ?>">Quienes somos</a></li>
						<li><a href="<?php echo $helper->url("index","index" ) ?>">Ubicación</a></li>
						<li><a href="<?php echo $helper->url("index","index" ) ?>">Historia</a></li>
						<li><a href="<?php echo $helper->url("login","salir" ) ?>">Cerrar sesion</a></li>
					</ul>
				</li>
			</ul>
		</div>
    </div>
</nav>


