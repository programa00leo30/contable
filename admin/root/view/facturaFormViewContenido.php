<div class="container">
    <div class="text-center">
         <h1>Factura </h1>
    </div>

     <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- <h3 class="panel-title">Cabecera</h3> -->
					<hr>
                    <div class="row" >
                        
                        <div class="col-md-3" style="background-color:white;">
                            
<?php 
$ob= $fatura->mostrar_editar("idCliente",$html) ;$ob->tab(8) ; echo $ob ;  
?>
                                
                            
                        </div>
                        <div class="col-md-2" style="background-color:white;">
							
<?php $ob = $fatura->mostrar_editar("tipFact",$html,"C") ;$ob->tab(8) ; echo $ob ; 
?>
							
                        </div>
                        <div class="col-md-3" style="background-color:white;">
                            <div class="form-group">
                              
                                <label for="fecha" class="col-sm-5 control-label">Fecha factura</label>
                                <div class="col-sm-7">
<?php $ob = $fatura->mostrar_editar("Fecha",$html,date("Y-m-d")); 
								$ob->SetAtr("class","form-control");
								$ob->tab(8);
								echo $ob; 
							?></div>
							    
                            </div>
                        </div>
                        <div class="col-md-4 target" style="background-color:white;">
                            <div class="form-group">
                                <label for="id" class="col-sm-1 control-label">Id</label>
                                <div class="col-sm-11">
                                    
<?php $ob= $fatura->mostrar_editar("cajero",$html,0); 
$ob->tab(8) ; 
$ob->SetAtr("class","col-sm-5");
echo $ob ;  ?>
									-
<?php $ob= $fatura->mostrar_editar("nrocontrol",$html,$fatura->nroControl(0));
$ob->tab(8) ; 
$ob->SetAtr("class","col-sm-5");
echo $ob ;  ?>
									
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                    <br>
                    <div class="row">
                        <div class="col-md-6"> 
                          <address id="datosCliente"></address>
                          <address>
                           <strong class="">BERNARDO GINARD PRATS</strong><br class="">
                            Carrer Ciutadella nº 26 A<br class="">
                            07008 Palma<br class="">
                            Illes Balears<br class="">                          
                           </address>
                        </div>
                   </div> <!-- row -->
                   <br>
                   <div class="row">
						<!-- autoform end -->
						<div class="row">
							<div class="form-group col-md-4">
								<?php echo $fatura->mostrar_editar("Impuesto",$html,0) ?>				
							</div>
							<div class="form-group col-md-4">
								<?php echo $fatura->mostrar_editar("Total",$html,0) ?>
							</div>
							<div class="form-group col-md-4">
								<?php echo $fatura->mostrar_editar("Observaciones",$html) ?>
							</div>
						</div>
						

						<div class="form-footer">
							<button type="submit" class="btn btn-info">
								<span class="glyphicon glyphicon-log-in"></span> GUARDAR !
							</button>
						</div>
                   
                   
                   </div><!-- row -->
				</div> <!-- panel heading -->
				<div class="panel-body" id="detalle" >
				</div> <!-- panel body -->
				
             </div> <!-- panel -->
        </div> <!-- col -->
    </div> <!-- row -->
    
</div>    <!-- container -->

<?php

				$tmpurl='"'. $helper->url("facturas","iframe/detalle",array("idfac"=>$idfatura)). '"';
				
				$html->javascript(<<<USOJAVA

$(document).ready(function(){
    $.ajax({
			url: $tmpurl, 
			success: function(result){
				$("#detalle").html(result);
				asociarEvento();
				sumar();
			}
		});

});
USOJAVA
);

$html->javascript(<<<USOJAVA
function sumar(){
	var totalDeuda=0;

	$("[name=subtotal]").each(function(){
		// console.log("sumar:"+$(this).val());
		totalDeuda+=parseInt($(this).val()) || 0;
	});

	$("[name=Total]").val(totalDeuda);
}
USOJAVA
);

$html->javascript(<<<USOJAVA
/* funcion de asociar elementos */
function asociarEvento(){
$("#detalle").on('submit',"[id*=factDetalle]",function(e){
/* $("[id*=factDetalle]").submit(function(e) { */
    var form = $(this);
    var url = form.attr('action');
	/* alert("enviando formulario "+url); */
    console.log("formulario:" +  form.attr("id") );
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               $("#detalle").html(data);
               // alert(data); // show response from the php script.
				asociarEvento();
				sumar();
           }
         });

    // e.preventDefault(); // avoid to execute the actual submit of the form.
    return false;
});
}
USOJAVA
);



