<?php
/*
 * 	escritura antiugua/obsoleta :
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
*/
$barra=new html("div",array("class"=>"container-fluid"));
$barra_1=new html("div",array("class"=>"navbar-header"));
$barra_1->add(new html("button",array(
	"type"=>"button"
	,"class"=>"navbar-toggle collapsed" 
	,"data-toggle"=>"collapse" 
	,"data-target"=>"#navbar" 
	,"aria-expanded"=>"false" 
	,"aria-controls"=>"navbar"
	),array(
		new html("span",array("class"=>"sr-only"),"Cambiar A:")
		,new html("span",array("class"=>"icon-bar")," ")
		,new html("span",array("class"=>"icon-bar")," ")
		,new html("span",array("class"=>"icon-bar")," ")
	)
));
$barra_1->add(new html("a",array("href"=>"#","class"=>"navbar-brand"),".COM"));

$barra_2=new html("div",array("id"=>"navbar","class"=>"navbar-collapse collapse"),
	new html("ul",array("class"=>"nav navbar-nav navbar-right"),array(
	new html("li",array(),new html("a",array("href"=>$helper->url("index","index")),"Inicio"))
	,new html("li",array(),new html("a",array("href"=>$helper->url("configuracion","index")),"Configuracion"))
	,new html("li",array(),new html("a",array("href"=>$helper->url("mipierfil","index")),"Ayuda"))
	)
));
$barra_2->add(new html("form",array("class"=>"navbar-form navbar-right"), 
	new html("input",array("type"=>"text","class"=>"form-control" ,"placeholder"=>"BuscarCliente..."))));

$barra->tab(4);
$barra->add(array($barra_1,$barra_2));
echo $barra;
