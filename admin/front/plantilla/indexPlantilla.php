<?php
// este archivo se utiliza como plantilla general
/*
 * debe recibir como parametro un objeto $pagina
 * este debe contener los metodos: 
 * 				barrasuperior > indicando un file view
 * 				barralateral > indicando un file view
 * 				contenido 	> indicando un file view
 * 
 */

?>
<!DOCTYPE html>
<html lang="es_AR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="<?php echo $pagina->descripcion ?>">
    <meta name="author" content="<?php echo $pagina->autor ?>">
    <link rel="icon" href="<?php $pagina->favicon() ?>">

    <title><?php echo $pagina->titulo ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $helper->url("css","bootstrap.min.css") ?>" rel="stylesheet">
    <link href="<?php echo $helper->url("css","bootstrap-datetimepicker.min.css") ?>" rel="stylesheet">
	

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo $helper->url("css","ie10-viewport-bug-workaround.css") ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $helper->url("css","dashboard.css") ?>" rel="stylesheet">
    <link href="<?php echo $helper->url("css","app.css") ?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo $helper->url("js","ie-emulation-modes-warning.js") ?>"></script>
    <!-- implementacion de ventanas modales. -->
    <script src="<?php echo $helper->url("js","bootbox.min.js") ?>"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <?php
			echo $pagina->barrasuperior() ;
		?>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        
			<?php
				echo $pagina->barralateral() ;
			?>
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<?php
				echo $pagina->contenido();
			?>
        </div>
      </div>
    </div>
	
	<?php
		echo $pagina->piepagina();
	?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
		window.jQuery || document.write(<?php 
		$txt = "'<script src=\"". $helper->url("js" , "jquery.min.js" ) ."\" ><\/script>'";
		echo $txt 
		?>) ;
		
    </script>
    
    <script src="<?php echo $helper->url("js", "bootstrap.min.js" ); ?>"></script>
    
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?php echo $helper->url("js", "holder.min.js") ; ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo $helper->url("js", "ie10-viewport-bug-workaround.js") ; ?>" ></script>
    <!-- summernote ( wisiwik ) para editar notas -->
    <script src="<?php echo $helper->url("js","yellow-text.js" ) ?>" ></script>
		<?php
		// renderizar todo el javascript que necesite inicializar.
		echo "\n". $html->javascript_Render();
	?>
  </body>
</html>
