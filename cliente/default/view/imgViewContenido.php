<?php

// creacion de una imagen.


if (isset($dimension)){
	$nuevo_ancho=$dimension["x"]	;
	$nuevo_alto=$dimension["y"];	
}else{	
	$nuevo_ancho=200	;
	$nuevo_alto=60;
}
$header = "Content-type: image/$tipefile"; 
// header("Content-type: base64/png");  

// $im     =  imagecreatefromgif(base64_decode($dato));
switch($tipefile){
	case "jpg":
		$im     =  imagecreatefromjpeg($dato);break;
	case "gif":
		$im     =  imagecreatefromgif($dato);break;
	case "png" :
		$im     =  imagecreatefrompng($dato);break;
		
	default: 
		$header ="";
}
// crear una imagen nueva 

$thumb = imagecreatetruecolor($nuevo_ancho,$nuevo_alto);
imagecopyresized($thumb,$im, 0,0 ,0,0  ,$nuevo_ancho,$nuevo_alto,ImageSX($im),ImageSY($im) );

// imagecopyresized($thumb, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
// $naranja = imagecolorallocate($im, 220, 210, 60);
// $px     = (imagesx($im) - 12 * strlen($cadena)) / 2;
// imagestring($im, 15, $px, 9, $cadena, $naranja);
// imagesetinterpolation($im,IMG_NEAREST_NEIGHBOUR);
// imagescale($im,1289,350);

header("Content-type: image/png"); 
imagepng($thumb);
imagedestroy($thumb);
imagedestroy($im);

// */
?>
