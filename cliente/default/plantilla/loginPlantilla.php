<!DOCTYPE html>
<?php
/*las partes del html:*/
$h = new html("html",array("lang"=>"es"));
$h->add(new html("head"));
$h->add(new html("body"));

/*el head*/
$h->head->add(new html("meta",array("charset"=>"utf-8")));
$h->head->add(new html("meta",
	[
	"name"=>"viewport"
	,"content"=>"width=device-width, initial-scale=1"]
	));
$h->head->add(
	[
		new coment("descipciones del autor de pagina")
		,new html("meta",array("name"=>"description","content" => $pagina->descripcion))
		,new html("meta",array("name"=>"author","content" => $pagina->autor ))
		,new html("link",array("rel"=>"icon","href" => $pagina->favicon() ))
	]);
	
$h->head->add(new html("title",array(),(strlen($title)>0)?$title:"-::INGRESO::-"));
foreach(["bootstrap.min.css","dashboard.css"] as $v)
		$h->head->add(new html("link",array("href"=>$helper->url("login","css$v"),"rel"=>"stylesheet")));
		
/*el cuertpo del html*/

$h->body->add(new html("main" ,['class'=>"page-content",id=>"main"],
	[
		new html("div",['class'=>"container"],
				$pagina->htmlObjectContenido()
			)
		
		, new coment("fin de pagina principal")
	
	]));
$h->body->add(new html("footer",["class"=>"page-footer  font-small stylish-color-dark  fixed-bottom"]));

$h->body->footer->add( new coment("pie de pagina agregado") );
$h->body->footer->add( $pagina->htmlObject("plantilla","footer.php") );

$h->body->footer->add( new coment("script necesarios.") );

foreach( [ "jquery.min.js","bootstrap.min.js"] as $file){
$h->body->footer->add( new html("script",[src=> $helper->url("login","js$file") ]) );
}

	
echo $h;
