<?php
/*
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="description" content="Proyecto IDUV">
    <meta name="author" content="LeandroMorala">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $paginaGlobal->Pagtitulo ?></title>
	<link rel="shortcut icon" href="favicon.ico">
		<?php 
		 //include("boostrap3.3.php") ;
	
	?>
   
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
*/
?>
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
		// ,new html("link",array("rel"=>"icon","href" => $pagina->favicon() ))
	]);
	
$h->head->add(new html("title",array(),(strlen($title)>0)?$title:"-::INGRESO::-"));
foreach(["bootstrap.min.css","dashboard.css"] as $v)
		$h->head->add(new html("link",array("href"=>$helper->url("login","css$v"),"rel"=>"stylesheet")));
		
/*el cuertpo del html*/

