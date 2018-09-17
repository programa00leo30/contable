<script type="text/javascript">
function vertotal(nuevototal)
{
var  total = document.getElementById('Total');
total.value = nuevototal;

}

</script>
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
    idcon = document.getElementById('idCliente');
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
			// alert( ajax.responseText );
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
