	
		<aside class="aside">
         <!-- START Sidebar (left)-->
         <nav class="sidebar col-md-2 ">
            <ul class="nav">
               <!-- START user info-->
			  <ul class="dropdown-menu">
					<li><a href="<?php echo $helper->url("index","index" ) ?>">informacion general</a></li>
				</ul>
				<ul class="nav nav-sidebar">
					
						<li><a data-toggle="dropdown" class="dropdown-toggle" href="<?php 
							echo $helper->url("clientes","index" ) ?>">clientes<b class="caret"></b></a>
						<ul role="menu" class="dropdown-menu">
							<li><a href="<?php 
								echo $helper->url("clientes","listado" ) ?>">clientes listado</a></li>
							<li><a href="<?php 
								echo $helper->url("clientes","altas" ) ?>">clientes altas</a></li>
						<li><a href="<?php 
							
							echo $helper->url("clientes","listado?filtro=suspendidos" ) 
							
							?>">clientes suspendidos/eliminados</a></li>
						</ul></li>
						
						<li><a  data-toggle="dropdown" class="dropdown-toggle"  href="<?php 
							echo $helper->url("facturas","ultimas" ) ?>">facturacion<b class="caret"></b></a>
							<ul role="menu" class="dropdown-menu">
							<li><a href="<?php 
								echo $helper->url("facturas","ultimas" ) ?>">Ver listado ultimas facturas</a></li>
							<li><a href="<?php 
								echo $helper->url("facturas","nueva" ) ?>">Crear Factura</a></li>
						</ul></li>
						
						<li><a data-toggle="dropdown" class="dropdown-toggle" href="<?php 
							echo $helper->url("cobros","ultimos" ) ?>">Cobros<b class="caret"></b></a>
							<ul role="menu" class="dropdown-menu">
							<li><a href="<?php 
								echo $helper->url("cobros","ultimos" ) ?>">Ver listado ultimos Cobros</a></li>
							<li><a href="<?php 
								echo $helper->url("cobros","nuevo" ) ?>">Nuevo Cobro</a></li>
						</ul></li>
						
						<li><a href="<?php 
							echo $helper->url("clientes","contratos" ) ?>">contratos</a></li>
						<li><a href="<?php 
							echo $helper->url("clientes","planes" ) ?>">planes</a></li>
				</ul>
				<ul class="nav nav-sidebar" >
					<li  ><a  data-toggle="dropdown" class="dropdown-toggle"  href="<?php 
							echo $helper->url("equipos","index" ) ?>">equipos / mantenimientos<b class="caret"></b></a>
							<ul role="menu" class="dropdown-menu">
							<li><a href="<?php 
								echo $helper->url("equipos","listado" ) ?>">listado de equipos</a></li>
							<li><a href="<?php 
								echo $helper->url("equipos","index" ) ?>">listado de mantenimientos</a></li>
							<li><a href="<?php 
								echo $helper->url("index","index" ) ?>">comandos para los equipos</a></li>
							<li><a href="<?php 
								echo $helper->url("index","index" ) ?>">chequeos</a></li>
							</ul></li>			
					
				</ul>
				<ul class="nav nav-sidebar" >
					<li  ><a  data-toggle="dropdown" class="dropdown-toggle"   href="<?php 
							echo $helper->url("productos","index" ) ?>">productos<b class="caret"></b></a>
							<ul role="menu" class="dropdown-menu">
							<li><a href="<?php 
								echo $helper->url("productos","listado" ) ?>">listado de productos</a></li>
							<li><a href="<?php 
								echo $helper->url("productos","nuevo" ) ?>">agregar productos</a></li>
							<li><a href="<?php 
								echo $helper->url("productos","stock" ) ?>">stock</a></li>
							</ul></li>			
				</ul>
				<ul class="nav nav-sidebar">
					<li  ><a data-toggle="dropdown" class="dropdown-toggle" href="<?php 
						echo $helper->url("index","index" ) ?>">herramientas<b class="caret"></b></a>
							<ul role="menu" class="dropdown-menu">
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
							</ul>			</li>					
						

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
			</ul>
		</nav>
