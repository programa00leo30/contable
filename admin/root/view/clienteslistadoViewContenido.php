<?php

?>			
					<h2 class="sub-header">Listado de Clientes</h2>
					<!-- seccion de informacion -->
						<div class="table-responsive">
							<table class="table table-striped">
							  <thead>
								<tr>
								  <th>#</th>
								  <th>Nombre, Apellido</th>
								  <th>Direccion</th>
								  <th>Celular</th>
								  <th>saldo</th>
								  <th>Acciones</th>
								</tr>
							  </thead>
							  <tbody id="tblClientes">
					<?php
						
						$usr=$clientes->getAll( "default",$inicio,$cantidadPorHoja);
						$cont=0;
						foreach($usr as $k=>$v){
							// foreach ( $v as $i){
							if ($v->activo < 6){
								switch($v->activo){
									case "1" : $n="" ;break;
									case "2" : $n="success" ; break ;
									case "3" : $n="warning" ; break ;
									case "5" : $n="danger" ; break;
									default : $n="";
								}
							?>
						<tr class="<?php echo $n ?>" data-idcliente="<?php echo $v->id ?>">
							<td ><?php echo $v->id ."(".$v->activo . ")" ?></td>
							<td ><?php echo $v->nombre .", ". $v->apellido ?></td>
							<td><?php echo $v->direccion ?></td>
							<td ><?php echo $v->celular ?></td>
							<td ><?php echo $movimientocomercial->total($v->id) ?></td>
							<td><a class="delete_cliente" data-accion="borrar" data-idcliente="<?php echo $v->id; ?>" href="javascript:void(0)">
									<i class="glyphicon glyphicon-trash"></i></a>
								<a class="edit_cliente" data-accion="editar" data-idcliente="<?php echo $v->id; ?>" href="javascript:void(0)">
									<i class="glyphicon glyphicon-pencil"></i></a>
								<a class="config_cliente" data-accion="config" data-idcliente="<?php echo $v->id; ?>" href="javascript:void(0)">
									<i class="glyphicon glyphicon-cog"></i></a>
								<a class="config_cliente" data-accion="contratos" data-idcliente="<?php echo $v->id; ?>" href="javascript:void(0)">
									<i class="fa fa-chart-line"></i></a>
								<a class="config_cliente" data-accion="facturas" data-idcliente="<?php echo $v->id; ?>" href="javascript:void(0)">
									<i class="fa fa-shopping-cart"></i></a>
								<a class="config_cliente" data-accion="cobros" data-idcliente="<?php echo $v->id; ?>" href="javascript:void(0)">
									<i class="fa fa-gem"></i></a><?php 
									/*
									 echo "<a href=\""
									.$helper->url("clientes","editar?cliente=".$v->id ) 
									."\">editar</a>" ; */
								?></td>
						</tr>
					<?php		
							} // si esta activo.
						} // fin del bucle.
						
					?>
						</tbody>
					</table>
					<div class="col-md-12 center">
					<?php
					// echo $pag;
					echo $helper->paginador($clientes,"clientes","listado",$inicio,$cantidadPorHoja);
					?>
					</div>
					
<?php
$elurl=$helper->url("clientes","borrar");
// ejemplo:
/*
<button type="button" class="bb-hello-world btn btn-primary btn-lg">Run example</button>

$html->javascript("        $('.bb-hello-world').on('click', function (e) {
          bootbox.alert(\"Hello world!\");
        });
"
);

$('#tblClientes').on('click','tr td', function(evt){
   var target,idCliente,valorSeleccionado;
   /* target = $(event.target); * /
   target = $(evt.target);
   idCliente = target.parent().data('idcliente');
   valorSeleccionado = target.text();
   alert("Valor Seleccionado: "+valorSeleccionado+"\\n idCliente: "+ target.parent().data('idcliente'));
});

*/
$laur = $helper->url("clientes","");

$html->javascript(<<<USOJAVA

$('#tblClientes').on('click','tr td a', function(evt){
   var target,idCliente,valorSeleccionado;
   // target = $(event.target);
   target = $(evt.target);
   idCliente = target.parent().data('idcliente');
   activacion = target.parent().data('accion');
   valorSeleccionado = target.text();
   /* alert("Referencia Seleccionado: "+valorSeleccionado+"\\n idCliente: "+ target.parent().data('idcliente') +" acion:"+activacion );
   location.href = "$laur"+activacion+"?id="+idCliente; */
   haciaurl= "http:$laur"+activacion+"?cliente="+idCliente;
   $(location).attr('href',haciaurl );

});

USOJAVA
);

/*
   swal({
	  title: 'Alerta con cierre automatico!',
	  text: 'Esta alerta se cerrara en 2 segundos.',
	  timer: 2000
	}).then(
	  function () {},
	  // handling the promise rejection
	  function (dismiss) {
		if (dismiss === 'timer') {
		  console.log('La alerta fue cerrada en 2 segundos')
		  //Aqui puedes hacer tu redireccion
		  //location.href = "http://es.stackoverflow.com";
		  
		}
	  }
	)
	* 
	$html->javascript(<<<USOJAVA
$(document).ready(function(){
		
		$('.delete_cliente').click(function(e){
			
			e.preventDefault();
			
			var pid = $(this).attr('data-id');
			var parent = $(this).parent("td").parent("tr");
			
			bootbox.dialog({
			  message: "Estas seguro de que quieres eliminar al cliente ?",
			  title: "<i class='glyphicon glyphicon-trash'></i> Borrar !",
			  buttons: {
				success: {
				  label: "No",
				  className: "btn-success",
				  callback: function() {
					 $('.bootbox').modal('hide');
				  }
				},
				danger: {
				  label: "Borrar!",
				  className: "btn-danger",
				  callback: function() {
					  
					  
					  $.ajax({
						  
						  type: 'POST',
						  url: '$elurl',
						  data: 'delete='+pid
						  
					  })
					  .done(function(response){
						  
						  bootbox.alert(response);
						  parent.fadeOut('slow');
						  
					  })
					  .fail(function(){
						  
						  bootbox.alert('Algo salio mal....');
						  						  
					  })
					  					  
				  }
				}
			  }
			});
			
			
		});
		
	});
USOJAVA
);
/*
 *un ejemplo de javas scrip para obtener tablas. 
 * 
 *
[html]
<div class="row text-center">
      <div class="col-md-12">
        <img src="img/logo_desarrollohidrocalido.png" alt="www.desarrollohidrocalido.com">
      </div>
    </div>  
    <div class="table-responsive">
     <table class="table table-bordered text-center">
       <thead>
         <th class="warning">Nombre</th>
         <th class="warning">Fecha Nacimiento</th>
         <th class="warning">Activo</th>
         <th class="warning">Sexo</th>
         <th class="warning">Fecha Alta</th>
       </thead>
       <tbody id="tbAlumnoss">
         
       </tbody>
     </table>
    </div>

[javascript]
"use strict";
$(document).ready(function(evt){
  llenarListaAlumnos();
});

function llenarListaAlumnos(){
    $.getJSON('js/listaAlumnosJSON.json', function(response) {
      let list = response.alumnos;
      if (list.length < 1) {
         alert("SIN NINGÚN RESULTADO");
      } else {
          $('#tbAlumnoss tr').remove();
          for(let i = 0; i < list.length; i++) {
              $('#tbAlumnoss').append('<tr data-idalumno="'+list[i].idAlumno+'">'+
                                        '<td>'+list[i].nombre+'</td>'+
                                        '<td>'+list[i].fecha_nacimiento+'</td>'+
                                        '<td>'+list[i].activo+'</td>'+
                                        '<td>'+list[i].sexo+'</td>'+
                                        '<td>'+list[i].fecha_alta+'</td>'+
                                       '</tr>'
                                      );
          }
      }   
    }); // fin de $.getJSON
}

$('#tbAlumnoss').on('click','tr td', function(evt){
   var target,idAlumno,valorSeleccionado;
   target = $(event.target);
   idAlumno = target.parent().data('idalumno');
   valorSeleccionado = target.text();
   alert("Valor Seleccionado: "+valorSeleccionado+"\n idAlumno: "+ target.parent().data('idalumno'));
});

*/
