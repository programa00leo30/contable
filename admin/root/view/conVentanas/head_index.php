	
<link href="<?php echo $helper->url("css","divtitle.css" ) ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $helper->url("css","trhover.css" ) ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo $helper->url("css","dhtmlwindow.css" ) ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo $helper->url("css","modal.css" ) ?>" type="text/css" />

<style>
	.menuInicio{
		margin-left:80px;
	      position:absolute;
	      width:900px;
	      }
	.menuInicio ul{
		list-style:none;
	      margin:0;
	      }
	.menuInicio li{
		float:left;
	      position:relative;
	      }
	.menuInicio a{
		color:#fff;
	      display:block;
	      font-weight:bold;
	      margin:6px 15px 0 10px;
	      padding:5px 10px 5px 10px;
	      font-size:1.2em;
	      text-decoration:none;
	      }
	.menuInicio ul ul{
		display:none;
	      position:absolute;
	      top:30px;
	      left:10px;
	      float:left;
	      box-shadow:0px 3px 3px rgba(0,0,0,0.2);
	      -moz-box-shadow:0px 3px 3px rgba(0,0,0,0.2);
	      -webkit-box-shadow:0px 3px 3px rgba(0,0,0,0.2);
	      z-index:99999;
	      }
	.menuInicio ul ul li{
		min-width:180px;
	      }
	.menuInicio ul ul ul{
		left:100%;
	      top:0;
	      }
	.menuInicio ul ul a{
		background-color:#cc0000;
	      height:auto;
	      line-height:1em;
	      margin:0 0 0 0;
	      padding:10px;
	      width:160px;
	      }
	.menuInicio li:hover > a{
		background-color:#cc0000;
	      color:#fff;
	      }
	.menuInicio ul ul li a:hover{
		background-color:#AD0000;
	      }
	.menuInicio ul li:hover > ul{	
		display:block;
	      }
	.menuInicio ul li.current_page_item > a,
.menuInicio ul li.current-menu-item > a{
	background-color:#cc0000;
	      color:#fff;
	      }
  </style>

<script type="text/javascript" ><?php
/* src="<?php echo $helper->url("js","windows.js" ) ?>" > */
include("windows.js.php");

?></script>
<script type="text/javascript" >	
	function abrir(nombre,destino,titulo){ //Define arbitrary function to run desired DHTML Window widget codes
		var salida= dhtmlwindow.open(nombre, "ajax", "index.php/"+destino, titulo
			, "width=450px,height=300px,left=300px,top=100px,resize=1,scrolling=1")
		salida.onclose=function(){
			return window.confirm("Cerrar "+titulo+"?")} //Run custom code when window is about to be closed
	return salida;
	}
</script>
