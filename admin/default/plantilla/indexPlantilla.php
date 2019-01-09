<!DOCTYPE html>
<?php

$documento = new html("html",array("lang"=>"es"));
$documento->add(new html("head"));
$documento->add(new html("body"));


$documento->head->add(new html("meta",array("charset"=>"utf-8")));

$documento->head->add(new html("meta",array("name"=>"viewport","content"=>"width=device-width, initial-scale=1")));
$documento->head->add(
	[
		new coment("descipciones del autor de pagina")
		,new html("meta",array("name"=>"description","content" => $pagina->descripcion))
		,new html("meta",array("name"=>"author","content" => $pagina->autor ))
		,new html("link",array("rel"=>"icon","href" => $pagina->favicon() ))
	]);
	
$documento->head->add(new html("title",array(),(strlen($title)>0)?$title:"-::Systema::-"));



$documento->head->add(new coment("Estilo para barra lateral."));
$documento->head->add(new html("link",array("href"=>$helper->url("css","app.css"),"rel"=>"stylesheet")));
$documento->head->add(new html("link",array("href"=>$helper->url("css","bootsnipp.min.css"),"rel"=>"stylesheet")));
foreach(["main.scss","_sidebar-brand.scss","_sidebar-header.scss","_sidebar-footer.scss","_sidebar-search.scss"
	,"sidebar-themes.scss","_sidebar-wrapper.scss","_themes-mixin.scss","_reboot.scss"] as $v)
		$documento->head->add(new html("link",array("href"=>$helper->url("sass",$v),"rel"=>"stylesheet")));

$documento->head->add(new html("link",array("href"=>$helper->url("css","main.css"),"rel"=>"stylesheet")));
$documento->head->add(new html("link",array("href"=>$helper->url("css","sidebar-themes.css"),"rel"=>"stylesheet")));

$documento->head->add(new coment("Boostrap css core"));
$documento->head->add(new html("link",array("href"=>$helper->url("css","bootstrap.min.css"),"rel"=>"stylesheet")));
$documento->head->add(new html("link",array("href"=>$helper->url("css","dashboard.css"),"rel"=>"stylesheet")));


$documento->body->add(new html("div",array("class"=>"page-wrapper chiller-theme toggled","id"=>"pagina")));
$documento->body->div->add( new html("a",[ id=>"show-sidebar", 'class'=>"btn btn-sm btn-dark" ,href=>"#"],
				new html("i",['class'=>"fas fa-bars"])));
$documento->body->div->add( $pagina->barra("barralateral.php") );
				

$documento->body->div->add(new html("main" ,['class'=>"page-content",id=>"main"]));
$documento->body->add(new html("footer",["class"=>"page-footer  font-small stylish-color-dark  fixed-bottom"]));

ob_start();
	$pagina->contenido();
	$contenido = ob_get_contents();
ob_end_clean();

$documento->body->footer->add( new coment("pie de pagina agregado") );
$documento->body->footer->add( $pagina->entrada("plantilla","footer.php") );

$documento->body->footer->add( new coment("script necesarios.") );

foreach( [ "jquery.min.js","popper.min.js","bootstrap.min.js"] as $file){
$documento->body->footer->add( new html("script",[src=> $helper->url("js",$file) ]) );
}


$documento->body->div->main->add( 	[
	new html("div",['class'=>"container-fluid"],
		new html("div",['class'=>"wor"],
			$contenido
		)
	)
	, new coment("fin de pagina principal")
	] 
);
	
$documento->body->footer->add( $html->javascript_Render() );
echo $documento;
