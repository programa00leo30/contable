<?php

error_reporting  (E_ALL);
ini_set ('display_errors', true);

var_dump($_SERVER);
echo " salida : <br>\n";
echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
echo "\n<br>pasa por aqui";
// include("contrato.form.php");

$men= "Buenos dias Sr/sra %apellido%, %nombre% en el dia de la fecha se le esta comunicando que a partir del mes de febrero los abonos mensuales sufriran un ahumento de $100.- en su plan.
Desde ya muchas gracias..";

$cl = array (
"idContrato" => 84,
"nrocontrato" => 50,
"Nombre" => "AzucarMorena",
"apellido" => "EsteApellido",
"ip" => "172.20.11.79",
"localidad" => "zapiola 3020",
"idEquipo" => 1,
"idCliente" => 1,
"idPlan" => 1,
"idEmpleado" => 1,
"Estado" => 1,
"fechaalta" => 2015-12-04,
"fechacierre" => 2015-12-04,
"idPerioricidad" => 4,
"otrosdatos" => "--" );

echo preg_replace_callback( "/[\%]+?\s*(?P<var>\S+)\s*[\%]/" , 
	function ($c) use ($cl) { 
		echo "encontre:".$c[0];	 
		return " rehemplazo:".$c["var"]." " .$cl[ $c["var"] ] ; 
	} , 
	$men );


echo "------------------------ analizador de etiquetas recursivamente:------------------------<br>";
$entrada = "Buenos dias Sr/sra [db]apellido[/db], [db]nombre[/db] en el dia de la fecha se le esta comunicando que a partir del mes de febrero los abonos mensuales sufriran un ahumento de $100.- en su plan.
Desde ya muchas gracias.";

function analizarEtiquetasRecursivo($entrada)
{
	
	$regex = '/\[db\](.*)\[\/db\]/i';

    if (is_array($entrada)) {
		echo "alalizando texto:".$entrada[0]."<br>";
    	
        $entrada = '<div style="margin-left: 10px">'.$entrada[1].'</div>';
    }

    return preg_replace_callback($regex, 'analizarEtiquetasRecursivo', $entrada);
}

$salida = analizarEtiquetasRecursivo($entrada);

echo $salida;


echo "----------------- fin de analisis -------------<br>";



$a=  new DateTime("now");
echo $a->format("Y-m-d")."<<<<<<<<br>\n";
echo "->".substr($_GET["CPURL"],6,-3)."<br>\n";
 ?>
<script type="text/javascript" >
function select1_onchange() {
  document.getElementById("select2").selectedIndex
    = document.getElementById("select1").selectedIndex;
}

function select2_onchange() {
  document.getElementById("select1").selectedIndex
    = document.getElementById("select2").selectedIndex;
}
</script>


<select name="select1" id="select1" onchange="select1_onchange();">
<option value="A">lista A</option>
<option value="B">lista B</option>
<option value="C">lista C</option>
</select>

<select name="select2" id="select2" onchange="select2_onchange();">

<option value="1">lista 1</option>
<option value="2">lista 2</option>
<option value="3">lista 3</option>
</select>

<script type="text/javascript" >
var test = document.getElementById("select1");
test.options[ test.options.length ]= new Option("lista nueva", "F", "");

</script>

</body></html>
