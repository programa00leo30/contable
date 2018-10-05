		<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Cambiar A:</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand" >LEAL-COMUNICACIONES</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo $helper->url("index","index") ?>">Inicio</a></li>
            <li><a href="<?php echo $helper->url("configuracion","index") ?>">Configuraciones</a></li>
            <li><a href="<?php echo $helper->url("miperfil","index") ?>">MiPerfil</a></li>
            <li><a href="<?php echo $helper->url("ayuda","index") ?>">Ayuda</a></li>
          </ul>
          <form class="navbar-form navbar-right" >
            <input type="text" class="form-control" placeholder="BuscarCliente...">
          </form>
        </div>
