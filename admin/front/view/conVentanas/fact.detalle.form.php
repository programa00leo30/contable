<?php
/* 
	este pequeño scrip decide si es correcto utilizar el
	formulairo de detalle.
	o no.
*/


if ( isset ( $_GET["idFactura"] ) )  {
	include ("fact.det.form.php");
} else {
	echo "debe haber una factura asociada";
}
