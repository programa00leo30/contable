<script type="text/javascript">
function mkhash( ) // funcion para generar un array
{
  var ret = new Object( );
  /*for (var i = 0; i < arguments.length; ++i )
  {
    ret[arguments[0][i]] = arguments[1][i];
  }
  
  //arguments[0].forEach(function(entry) {
	for (arguments in a ) {
		ret[a
  return ret;
  */
  var tmp = arguments;
  var copy = Object.create(Object.getPrototypeOf(arguments[0]));
  var propNames = Object.getOwnPropertyNames(arguments[0]);

  propNames.forEach(function(name) {
    var desc = Object.getOwnPropertyDescriptor(tmp[0] , name);
    Object.defineProperty(copy, name, desc);
  })	;

  return copy;
}

function objetoAjax(){ // funcion para determinar el mejor ajax
	// probando modalidad de Ajax
	var xmlhttp=false; // por defecto no soportado.
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
	   xmlhttp = false;
	  }
	 }
	if ( !xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
// envio de informacion de tipo simple. 
// con respuesta de ejecucion.
function sndresponse(snd){
	var ajax=objetoAjax();
	ajax.open("POST", "query.php?t=cliente", true);
	ajax.onreadystatechange=function() {	 
		if (ajax.readyState==4) {			
			eval(  ajax.responseText  );
		}
	};
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(snd); // mediante post ;
}
	
function enviatext(form,listselect)
{
	//en las siguientes 2 lineas obtenemos el texto a ingresar y el 
	// nombre del usuario.
	// se ingresa el 
	
    var id=document.getElementById(listselect).value;
    var JSON = [] ;
    // var sesion=form.sesion.value; // valores de session para verificar coneccion

    // acontinuacion indicamos el div en el cual se desplegara nuestra 
    // conversacion.
    nombreapellido = document.getElementById('nombreapellido');
    direccion = document.getElementById('direccion');
    idcon = document.getElementById('idContrato');
    idacon = document.getElementById('contratoid');
    idlist = document.getElementById('contrato');
    idcont = document.getElementById('cliente');
    ajax=objetoAjax();

    // indicamos el metodo y el archivo al que enviaremos las 
    // variables obtenidas.
    ajax.open("POST", "query.php?t=cliente", true);
    // funcion que obtiene el valor de respuesta.
    ajax.onreadystatechange=function()
    {
		// se leyo todo el texto.
        if (ajax.readyState==4)
        {
			// JSON = ajax.responseText ;
			// escribir el resultado en el div destino 
			// cuando se termine la recepcion
            //divResultado.innerHTML = ajax.responseText;
			//var datos = JSON.parse_str( ajax.responseText );
			eval(  ajax.responseText  );
			nombreapellido.innerHTML = arr["nombre"] +", "+arr["apellido"];
			direccion.innerHTML = arr["direccion"] ;
			idacon.innerHTML = arr["id"] ; // id de cliente.
			idcon.value = arr["id"] ; // id de cliente.
			idlist.value = arr["id"] ; // id de cliente.
			idcont.value = arr["id"] ; // id de cliente.
			 
        }
    }
    // preparacion para el envio de cabecera.
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    //Acontinuacion realizamos el envio de las variables.
    ajax.send(
    // "sesion="+sesion+
    "id="+id+"&tabla="+listselect);
}

</script>
<?php
/* programa de ejemplo para el ordenamiento de una tabla en lado cliente
 * 
*/ 
?><html>
<head>
	<title>ordenar tabla</title>
</head>
<body>
	
<script type="text/javascript">
/*
	Necesitamos tres variables globales: una de ella contendrá los datos 
	de la tabla, otra el índice de la columna por la que se ordena y la 
	última si el orden es ascendente o descendente.
*/

var orden = 0;     
var ascendente = true;     
var datos = new Array();         
datos[0] = new Array('Andalucía ', 7340052, 7849799);         
datos[1] = new Array('Aragón ', 1189909, 1269027);

</script>


<script type="text/javascript">
/*
Pasemos ahora a las funciones, la primera de ellas es la que se encarga 
de cmabiar el criterio de orden, según el índice que se pasa 
por parámetro, si es el mismo que el que ya estaba, se cambia 
el sentido (ascendente/descendente) y si no es así, se cambia 
el indice y se pone el sentido como ascendente.
*/
    // Cambia el criterio de orden     
    // y vuelve a dibujar la tabla     
    function cambiar(ind) {         
		// Si es el mismo orden         
		// que el que hay actualmente         
		// se cambia el sentido.         
		// En otro caso, se cambia el         
		// criterio y se pone el sentido         
		// como ascendente         
		if (ind == orden) {             
			ascendente = !ascendente;         
		} 
		else {             
			orden = ind;             
			ascendente = true;         
		}                  
		// Se refresca la tabla         
		dibujarTabla();     
	}
</script>
<script type="text/javascript">
/*
La siguiente función es la que se usa en el método de ordenación, 
se pasa como parámetro a la función sort y tiene como parámetros 
dos elementos del array que se ordena. Devuelve 1 para el elemento 
mayor y -1 para el menor.
*/
    // Es la función para ordenar el array     
    // con los datos, tiene en cuenta la columna     
    // y si es ascendente o no     
    function organizar(a, b) {         
		var signo = ascendente? 1:-1;         
		return (a[orden] > b[orden]) ? signo : -signo;     
    }
</script>

<script type="text/javascript" >
/*
Por último la función que dibuja la tabla, simplemente crea el código 
HTML necesario y lo inserta usando innerHTML en un div que tiene el 
id=tabla.
*/
// Se encarga de dibujar la tabla    
// contenido = { id = { 1 , 2 , 3 ,4 } 
function dibujarTabla() {              
	var html = "<table >";                  
	// Cabecera         
	// En cada celda de la cabecera         
	// se le añade un evento para que         
	// cuando se pulse en ella se cambien         
	// el criterio de orden y tambien una         
	// imagen que indica el orden de cada         
	// columna  
	// determinar columnas y nombres el datos[0] = encabezado.
	contar = 0;
	for ( datos[0] in key ) {
		contar ++ ;
	    html += '<tr><th onclick="cambiar(0)">';         
		html += key'<img src="';         
	html += ((orden == 0)?             
		(ascendente? 'ord-asc.gif':'ord-des.gif'):             
		'ord-no.gif');         
	html += '"></th>';         
		/*
		html += '<th onclick="cambiar(1)">';         
		html += 'Habitantes (2000) <img src="';         
		html += ((orden == 1)?             
		(ascendente? 'ord-asc.gif':'ord-des.gif'):             
		'ord-no.gif');         
		html += '"></th>';         
		html += '<th onclick="cambiar(2)">';         
		html += 'Habitantes (2005) <img src="';         
		html += ((orden == 2)?             
		(ascendente? 'ord-asc.gif':'ord-des.gif'):             
		'ord-no.gif');        
		 html += '"></th></tr>';                  
		*/
	}
	 // Se ordena la tabla         
	 datos.sort(organizar);              
	 // Por cada fila se escribe         
	 // el codigo HTML necesario         
	 for (var i=0; i<datos.length; i++) {             
		 html += '<tr><td>'+datos[i][0]+                 
		 '</td><td>'+datos[i][1]+                 
		 '</td><td>'+datos[i][2]+                 
		 '</td></tr>';         
	 }                 
	html += '</table>';                  
	// Necesita un DIV con id=tabla         
	document.getElementById("tabla").innerHTML = html;     
}

</script>
		
		
