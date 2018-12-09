<?php

/* derivador 
*/

if ( isset ( $_GET["id"] ) )  {
	include ("cobro.det.form.php");
} else {
	echo "debe haber un recivo asociado.";
}
