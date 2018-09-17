<?php
/*
 * envio de multiples variables de respuesta de consultas simples.
 * modelo de resultado:
 * "[{'id':1,'product_id':2,'name':'stack"'} ,{'id':2,'product_id':2,'name':'overflow'}]"
 * = array( array("id" => 1 , "product_id" => 2 , "name" => "stack") , array ( "id => 2 ; "product_id" => 2 , "name"=>"overflow" ) ) 
*/

if (isset($_GET["t"])){
	// primer prueba superada. existe el parametro t
	$typo = $_GET["t"] ;
	require_once('Connections/lealsh.php'); 
	mysql_select_db($database_lealsh, $lealsh);
	
	switch($typo){
		case "cliente" or "idCliente":
			// se respondera sobre cliente ( nombre / apellido , direccion )
			if (isset($_POST["id"]) && isset($_POST["tabla"] ) ){
				// se obtiene el id de la tabla destion
				$tab = $_POST["tabla"]; 
				$id=$_POST["id"];
				switch ($tab){
					case "contrato" :  $d="nrocontrato" ;break;
					case "idCliente" : $d="id" ; $tab="cliente" ;break;
					case "cliente" : $d="id" ;break;
					default : $d = "none"; break ;
				};
				// $res = "alert('no encontrado ".$d ." = ". $tab."');";
				mysql_select_db($database_lealsh, $lealsh);
				$query_Recordset1listadoClientes = "
				SELECT * 
				FROM clientes left join contrato on id = idCliente 
				WHERE $d = '$id' 
				LIMIT 1";
				$Recordset1listadoClientes = mysql_query($query_Recordset1listadoClientes, $lealsh) or die(mysql_error());
				$lea = mysql_fetch_assoc($Recordset1listadoClientes);
				
				// enviar respuesta
				//echo " 'apellido':'".$lea['apellido']."' , 'nomber':'".$lea['nombre']."'  " ;
				$res = json_encode($lea);
				if ($res == "false" ) $res = "alert('no encontrado ".$d ." = ". $id."');";
				else $res = "var arr = mkhash (".$res.")";
				
			};
			break;
		case "nrocomprobante":
				$query = "SELECT NumeroComprobante FROM factura order by id DESC LIMIT 1 "	;
				$rc = mysql_query($query_Recordset1listadoClientes, $lealsh) or die(mysql_error());
				$lea = mysql_fetch_assoc($Recordset1listadoClientes);
				// SIGUIENTE NUMERO
				$nro = intval ( substr($lea ["NumeroComprobante" ], 5, 99 ) ) + 1;
				$rs = substr($lea ["NumeroComprobante" ],0,4 ) . str_repeat("0",(10-len( $nro  + 1  ))).( $nro  + 1  ) ;
				
				$res .= "document.getElementById('NumeroComprobante').value = '".$rs."' ; 
				alert( '".$nro."' ) ;" ;
				break;
		case "tablacliente" :
				$res .= "var orden = 0;\n\r var ascendente = true;\n\r var datos = new Array(); \n\r " ;
				$query = "SELECT * FROM clientes " ;
				$rc = mysql_query($query, $lealsh) or die(mysql_error());
				$lea = mysql_fetch_assoc($rc);
				$a="datos[th] = new array ( '" ;
				$b="datos[0] = new array ( '";
				foreach ($lea as $k => $v){
					$a .= $k."', '";
					$b .= $v ."', '";
				}
				$res .= $a ."accion' );\n\r " . $b . "editar' );\n\r";
				while ($lea = mysql_fetch_assoc($rc)){
						$res .= "datos.push ( new Array( '";
						foreach($lea as $v){
							$res .= $v . "', '";
						}
						$res .= "editar' ) ; \n";
				};
				break;
		case "contrato" :
			$res = "var x = document.getElementById(\"idCliente\"); \n ";
			$res = "test.options.length = 0; \n ";
			// $res = "var x = document.getElementById(\"mySelect\"); \n ";
			$query = "SELECT * FROM clientes " ;
				$rc = mysql_query($query, $lealsh) or die(mysql_error());
				$lea = mysql_fetch_assoc($rc);
				
				while ($lea = mysql_fetch_assoc($rc)){
						$res .= "x.options[ x.options.length + 1 ]= new Option('["
							.$lea['id']."]"
							.$lea['nombre'] 
							.", ". $lea['apellido'] 
							."(".$lea['direccion'].")""', '".$lea["id"]."', ''); \n";
					};
				break;
			
		default : $res = "alert('sin seleccion');var arr = [] ;";break;
	}
}else{
	$res = "alert('error de datos');var arr = [] ;";
}
echo $res;
