	<?php
// include("editor/index.php");

/* formulario para ejecutar comandos */
function exception_error_handler($errno, $errstr, $errfile, $errline ,$contect) {
    $error_is_enabled = (bool)($errno & ini_get('error_reporting') );
	if( in_array($errno, array(E_USER_ERROR, E_RECOVERABLE_ERROR)) && $error_is_enabled ) {
		echo "error:";
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }
	
	else if( $error_is_enabled ) {
        error_log( $errstr, 0 );
		/* quitando codigo de linea si existe. */
		/*
		$strsplit=explode("\r",$_POST["run"]); /* agregar nro de linea. 
		$str="";
		foreach($strsplit as $l=>$v) $str .= "#".($l+1).str_replace("\n","",$v)."\r";
		
		echo "<form name=\"run\" method=\"post\" action=\"run.php\">
			<textarea name=\"run\" cols=\"80\" rows=\"10\" >".$str."</textarea>
			<input type=\"submit\" name=\"enviar\" value=\"run\">
</form>";*/
		return false;
	}
}
set_error_handler("exception_error_handler");
function balanceo(&$var){
$var = str_replace('\\\\','\\',$var); /* quitando barras dobles por barras simples */
$var = str_replace('\"','"',$var);    /* comillas por comillas verdaderas */
$var = str_replace("\\'","'",$var);	  /*apostrofes por apostrofes verdaderos */


}
function golines(&$var){
//$strsplit=explode("\r",$var); /* agregar nro de linea. */
//$var="";
//foreach($strsplit as $l=>$v) $var .= "#".($l+1).".".str_replace("\n","",$v)."\r";
}
$logview="";
$f="run.log.php";
if (file_exists($f)){
    $log=fread(fopen($f,"r"),filesize($f));
    $logview="<a href=\"$f\" target=blanck >$f</a>";
    
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administracion LeaL</title>
<link href="css/estilo1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
   #codeTextarea{
      width:100%;
      height:510px;
   }
   .textAreaWithLines{
      font-family:courier;      
      border:1px solid #000;
      
   }
   .textAreaWithLines textarea,.textAreaWithLines div{
      border:0px;
      line-height:120%;
      font-size:16px;
   }
   .return {
	   color:blue ;
	}
   .lineObj{
      color:blue;
   }
   </style></head>
<body><?php
if (isset($_GET["a"])){
    // esta parte ejecuta dentro del frame
    
?><div id="return" width="100%" style="color:black;"><?php 
if(isset($_POST["run"])){
	balanceo($_POST["run"]);
	eval($_POST["run"]);
    
    if (isset($_POST["save"])){
        $o=fopen($f,"w");
        fwrite($o,$_POST["run"]);    
    }elseif(isset($_POST["del"])){
        unlink($f);
    }

}
?></div><?php    
}else{
    // esta arma el resto de la pagina. 
    // <iframe name="run" src="?a=2" width="100%" style="height: 500px;"  ></iframe>
?>
<form name="run" method="post" action="run.php?a=1" target="run" >
<textarea name="run" cols="120" rows="50" id="codeTextarea"><?php echo isset($_POST["run"])?$_POST["run"]:(isset($log)?$log:"") ?></textarea>
<input type="submit" name="enviar" value="run">
<input type="submit" name="save" value="save" >
<input type="submit" name="del" value="del" ><?php echo $logview ?>
</form>
<script type="text/javascript">

   var lineObjOffsetTop = 2;
   
   function createTextAreaWithLines(id)
   {
      var el = document.createElement('DIV');
      var ta = document.getElementById(id);
      ta.parentNode.insertBefore(el,ta);
      el.appendChild(ta);
      
      el.className='textAreaWithLines';
      el.style.width = (ta.offsetWidth + 30) + 'px';
      ta.style.position = 'absolute';
      ta.style.left = '30px';
      el.style.height = (ta.offsetHeight + 2) + 'px';
      el.style.overflow='hidden';
      el.style.position = 'relative';
      el.style.width = (ta.offsetWidth + 30) + 'px';
      var lineObj = document.createElement('DIV');
      lineObj.style.position = 'absolute';
      lineObj.style.top = lineObjOffsetTop + 'px';
      lineObj.style.left = '0px';
      lineObj.style.width = '27px';
      el.insertBefore(lineObj,ta);
      lineObj.style.textAlign = 'right';
      lineObj.className='lineObj';
      var string = '';
      for(var no=1;no<200;no++){
         if(string.length>0)string = string + '<br>';
         string = string + no;
      }
      
      ta.onkeydown = function() { positionLineObj(lineObj,ta); };
      ta.onmousedown = function() { positionLineObj(lineObj,ta); };
      ta.onscroll = function() { positionLineObj(lineObj,ta); };
      ta.onblur = function() { positionLineObj(lineObj,ta); };
      ta.onfocus = function() { positionLineObj(lineObj,ta); };
      ta.onmouseover = function() { positionLineObj(lineObj,ta); };
      lineObj.innerHTML = string;
      
   }
   
   function positionLineObj(obj,ta)
   {
      obj.style.top = (ta.scrollTop * -1 + lineObjOffsetTop) + 'px';   
   
      
   }
   
   createTextAreaWithLines('codeTextarea');
   </script>
<?php } ?>
</body>
</html>
