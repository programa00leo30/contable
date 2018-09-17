

<div id="menuInicio" >
<p>inicio:</p>
<ul>
  <li><a href="#" onClick="clientes=parent.abrir('clientes','clientes_listado','Listado de clientes'); return false">Clientes</a>
	  <a href="?clientes_listado" title="lista clientes" target="mainFrame">clientes</a>
    <ul>
      <li>listado</li>
      <li><a href="clientes.form.php" target="mainFrame">altas</a></li>
      <li>modificaciones</li>
    </ul>
  </li>
  <li><a href="#" onClick="equipos=parent.abrir('equipos','equipos_listado','Listado de equipos'); return false">Listado de Equipamientos</a>
		<a href="equipos.listado.php" title="listado equipos" target="mainFrame">equipos</a>
    <ul>
      <li>listado</li>
      <li><a href="equipos.form.php" target="mainFrame">altas</a></li>
      <li>modificaciones</li>
      <li><a href="equipos.marca.list.form.php" target="mainFrame">marcas</a></li>
      <li><a href="equipos.modelo.list.form.php" target="mainFrame">modelos</a></li>
    </ul>
  </li>
  <li><a href="contratos.listado.php" target="mainFrame">contratos</a>
    <ul>
      <li><a href="contrato.form.php" target="mainFrame">altas</a> </li>
      <li>modificaciones</li>
      <li>bajas</li>
      <li><a href="fact.list.php" target="mainFrame">facturacion</a>
        <ul>
          <li><a href="fact.list.php" target="mainFrame">listado</a> </li>
          <li><a href="fact.form.php" target="mainFrame">altas</a></li>
        </ul>
      </li>
      <li><a href="cobro.listado.php" target="mainFrame">recivos
        </a>
        <ul>
          <li><a href="cobro.listado.php" target="mainFrame">listado</a></li>
          <li><a href="cobro.form.php" target="mainFrame">altas</a></li>
        </ul>
      </li>
      <li><a href="#" onClick="listas=parent.abrir('Listas','listas_precios','Listado de Precios'); return false">Listado de Precios</a>
		  <a href="?listas_precios" title="listado de precios" target="mainFrame">listas precios</a>
        <ul>
          <li>altas</li>
          <li>modificaciones</li>
          <li>precios</li>
        </ul>
      </li>
    </ul>
  </li>
  <li></li>
  <li>provehedores  </li>
  
    <ul>
      <li>listado</li>
      <li>altas</li>
      <li>modificaciones
        <ul>
          <li>facturacion</li>
          <li>productos</li>
        </ul>
      </li>
    </ul>
  </li>
  <li>empleados
    <ul>
      <li>listado</li>
      <li>altas</li>
      <li>modificaciones</li>
    </ul>
  </li>
  <li><a href="<?php echo $helper->url("cmd","index" ) ?>" target="mainFrame">CMD</a>    
  <li><a href="<?php echo $helper->url("index","salir" ) ?>" target="_parent">salir</a>    
</ul>
</div>


