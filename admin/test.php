<?php
/*
echo pathinfo( __file__, PATHINFO_DIRNAME);
echo "\n";
echo $_SERVER["PATH_INFO"];
var_dump($_SERVER);
*/
// phpinfo();
// echo PHP_SAPI; // devuelve CLI o apache2handler

function t($a=null){
	$rt="";
	if (isset($a))$rt.="isset;";
	if (is_null($a))$rt.="is_null;";
	if (empty($a))$rt.="emty;";
	
	echo $rt;
}

echo "default:".t()."\n";
echo "con 1:". t(1)."\n";
echo "con array:".t([])."\n";

	
