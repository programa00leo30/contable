<?php

$urlParam=nz($urlParam,[]);

	$main = new html("div",['class' =>"container-fluid"]);
	$main->add( new html("div",['class'=>"text-center",id=>"head"], new html("h1",[],".:FACTURA:.")));
	$main->add( new html("div",['class'=>"row",id=>"contenido"]));

	$content = new html("div",['class'=>"col-md-12"]);
	$content->add( 
		new html("div",['class'=>"panel panel-default"],
			new html("form",[
				"role"=>"form"
				,"id"=>"factura"
				,"autocomplete"=>"off"
				,"method"=>"post"
				,"action"=>$helper->url("facturas",$destino,$urlParam )
			],
				[
					new html("div",['class'=>"panel-heading"],[
						new coment("cabecera")
						,new html("hr")
						,new html("div",['class'=>"row"],
							[
								new html("div",['class'=>"col-md-3" ,style=>"background-color:white;"],
									$fatura->mostrar_editar("idCliente",$html)
								)
								,new html("div",['class'=>"col-md-3" ,style=>"background-color:white;"],
									$fatura->mostrar_editar("tipFact",$html,"C")
								)
								,new html("div",['class'=>"col-md-3" ,style=>"background-color:white;"],
									$fatura->mostrar_editar("Fecha",$html,date("Y-m-d"))
								)
								,new html("div",['class'=>"col-md-3" ,style=>"background-color:white;"],
									new html("div",['class'=>"form-group"],
										[
											new html("label",['for'=>"fecha",'class'=>"col-sm-5 control-label"],"ID:")
											,new html("div",['class'=>"col-sm-7"])
										]
									
									
									)
								)
							]
						)
					])
				]
			)
		)
	);
		/*
 ?>
   
                        <div class="col-md-4 target" style="background-color:white;">
                            <div class="form-group">
                                <label for="id" class="col-sm-1 control-label">Id</label>
                                <div class="col-sm-11">
                                    
<?php 
*/

$ob= $fatura->mostrar_editar("cajero",$html,0); 
$ob->tab(8) ; 
$ob->SetAtr("class","col-sm-3");
// echo $ob ;
$content->div->form->div->add( new html("div",['class'=>"row"],$ob) );
$ob= $fatura->mostrar_editar("nrocontrol",$html,$fatura->nroControl(0));
$ob->tab(8) ; 
$ob->SetAtr("class","col-sm-3");
$content->div->form->div->add( new html("div",['class'=>"row"],$ob) );

$ob= $fatura->mostrar_editar("idEmpleado",$html,$fatura->nroControl(0));
$ob->tab(8) ; 
$ob->SetAtr("class","col-sm-3");
$content->div->form->div->add( new html("div",['class'=>"row"],$ob) );
// echo $ob ;  
/*
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
                   */
                   
$ob=new html("div",['class'=>"row"],[
	new coment("autoform fin")
	,new html("div",['class'=>"form-group col-md-4"],$fatura->mostrar_editar("Impuesto",$html,0) )
	,new html("div",['class'=>"form-group col-md-4"],$fatura->mostrar_editar("Total",$html,0) )
	,new html("div",['class'=>"form-group col-md-4"],$fatura->mostrar_editar("Observaciones",$html) )
]);
$content->div->form->div->add( new html("div",['class'=>"row"],$ob) );
$content->div->form->div->add( new html("div",['class'=>"row"],
	new html("div",['class'=>"form-footer"],
		new html("button",[type=>"submit",'class'=>"btn btn-info"], [
			new html("span",['class'=>"glyphicon glyphicon-log-in"]),"GUARDAR"
		]) 
	) 
));


$main->GetById("contenido")->add($content);
$main->add( new html("div",['class'=>"panel-body",id=>"detalle"]));

echo $main;

if (isset($urlParam["idfatura"])){
$idfatura=$urlParam["idfatura"];

$tmpurl='"'. $helper->url("facturadetalle","iframe/detalle",array("idfac"=>$idfatura)). '"';
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
}


