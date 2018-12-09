<?php

$plantilla = file_get_contents("plantilla/mail.php");

// rehemplazar %idcuentadigital% y %cliente% con el id de cuenta digital y el 594-apellido-nombre 

$salida = preg_replace("#.*%(.*)%.*"	
