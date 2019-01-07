<?php

$editar=( ( $contratos->selecionado() )?true:false);

$form=new html("form",[
	"role"=>"form"
	,"id"=>"Contrato"
	,"autocomplete"=>"off"
	,"method"=>"post"
	,"action"=>$helper->url("contratos","confirmar" )
]);

$form->noClose();

/*
$tabla=new html("table",[border=>0,cellspacing=>0,'class'=>"Tabla2"]);
$tabla->add(new html("colgroup",[]);
$c=[125,100,82,20,178,240];$cols=[];



for($t=0;$t<6;$t++)$col[]=new html("col",[width=>$c[$t]]);
$tabla->colgroup->add( $cols );
*/
$tabla=new tabla(6,12,"table",[id=>"main",'class'=>"tabla2",border=>0,cellspacing=>0]);
$tabla->SetCelda(0,0,new html("div",[],"CONTRATO DE SUSCRIPCION"));
$form->add( $tabla->constructTable() ) ;
$form->add( new coment("fin de  tabla"));
if ($editar){
	$form->add( $contratos->mostrar_editar("id",$html));
	$clientes->buscar("id",$editar);
	$nombre=$clientes->nombre;
	$apellido=$clientes->apellido;
	$direcion=$clientes->direccion;
	$dni=$clientes->dni;
}else{
	$nombre="";$apellido="";$direcion="";$dni="";
}
$plan=new html("span",[],$contratos->mostrar_editar("idplan",$html));
echo $form;
?>
	<table border="0" cellspacing="0" cellpadding="0" class="Tabla2">
		<colgroup>
			<col width="125"/><col width="100"/><col width="82"/><col width="20"/><col width="178"/>
			<col width="240"/>
		</colgroup>
		<tr class="Tabla21">
			<td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A1">
				<p class="P16">CONTRATO DE SUSCRIPCION</p>
			</td>
		</tr>
		<tr class="Tabla22">
			<td colspan="3" style="text-align:left;width:2.852cm; " class="Tabla2_A2">
			<!--Next 'div' was a 'text:p'.-->
			<?php
				
				$fecha=$contratos->mostrar_editar("fechaalta",$html);
				$fecha->label->SetContent("Fecha de inicio del contrato");
				
				echo $fecha;
			?>
			<div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> </div>
		</td>
		<td colspan="3" style="text-align:left;width:0.455cm; " class="Tabla2_D2">
			<!--Next 'div' was a 'text:p'.-->
<?php
				$parte=new html("div",['class'=>"form-row"]);
				$sec= $contratos->mostrar_editar("seccion",$html);
				$sec->SetAtr('class',"form-group ");
				$sec->SetAtr('value',"0");
				$num= $contratos->mostrar_editar("nrocontrato",$html);
				$num->SetAtr('class',"form-group  ");
				
				$parte->add([
					new html("div",['class'=>"col col-md-6"],[ new html("label",[],"seccion:"),$sec])
					,new html("div",['class'=>"col col-md-6"],[ new html("label",[],"numero:"),$num])
					]);
				$parte->tab(4);
				echo $parte;
			?>
			<div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> </div>
		</td>
	</tr>
	<tr class="Tabla23">
		<td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A3"><p class="P2"> </p></td>
	</tr>
	<tr class="Tabla24">
		<td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A1"><p class="P16">DATOS PERSONALES DEL TITULAR O EMPRESA SUSCRIPTORA</p></td>
	</tr>
	<tr class="Tabla24">
		<td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A5">
			<!--Next 'div' was a 'text:p'.-->
			<div class="P7">Apellido y Nombre – Razon Social:
				<!--Next 'div' is a draw:frame.-->
				<div style="width:9.714cm; padding:0;  float:left; position:relative; left:6,1cm; top:-0.353cm; " class="fr3" id="Marco4">
					<!--Next 'div' was a 'draw:text-box'.-->
					<div style="min-height:0.041cm;">
<?php
					$cliente=$contratos->mostrar_editar("idCliente",$html);
					$cliente->tab(5);
					$cliente->add(new html("div",[],$nombre));
					$cliente->add(new html("div",[],$apellido));
					echo $cliente;

?>
					</div>
				</div>
			</div>
			<div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> </div>
		</td>
	</tr>
	<tr class="Tabla24">
		<td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A6">
			<table border="0" cellspacing="0" cellpadding="0" class="Tabla6">
				<colgroup>
					<col width="164"/><col width="164"/><col width="186"/><col width="214"/>
				</colgroup>
				<tr class="Tabla61"><td style="text-align:left;width:3.752cm; " class="Tabla6_A1">
					<!--Next 'div' was a 'text:p'.-->
					<div class="Standard"><!--Next 'div' is a draw:frame.-->
						<div style="width:3.387cm; padding:0;  float:left; position:relative; left:0cm; top:-0.194cm; " class="fr4" id="Marco5">
							<!--Next 'div' was a 'draw:text-box'.-->
							<div style="min-height:0.041cm;">
								<table border="0" cellspacing="0" cellpadding="0" class="Tabla7">
									<colgroup>
										<col width="92"/><col width="18"/><col width="18"/><col width="19"/>
									</colgroup>
									<tr class="Tabla71">
										<td style="text-align:left;width:2.104cm; " class="Tabla7_A1"><p class="P10">Nacionalidad:</p></td>
										<td style="text-align:left;width:0.422cm; " class="Tabla7_A1"><p class="P8"> </p></td>
										<td style="text-align:left;width:0.422cm; " class="Tabla7_A1"><p class="P8"> </p></td>
										<td style="text-align:left;width:0.439cm; " class="Tabla7_D1"><p class="P8"> </p></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> </div>
				</td>
				<td style="text-align:left;width:3.75cm; " class="Tabla6_B1">
					<!--Next 'div' was a 'text:p'.-->
					<div class="Standard">
						<!--Next 'div' is a draw:frame.-->
						<div style="width:3.385cm; padding:0;  float:left; position:relative; left:0cm; top:-0.22cm; " class="fr4" id="Marco6">
							<!--Next 'div' was a 'draw:text-box'.-->
							<div style="min-height:0.041cm;">
								<table border="0" cellspacing="0" cellpadding="0" class="Tabla8">
									<colgroup>
										<col width="92"/><col width="18"/><col width="18"/><col width="19"/>
									</colgroup>
									<tr class="Tabla81">
										<td style="text-align:left;width:2.103cm; " class="Tabla8_A1"><p class="P11">Tipo de Documento</p></td>
										<td style="text-align:left;width:0.422cm; " class="Tabla8_A1"><p class="P13">D</p></td>
										<td style="text-align:left;width:0.422cm; " class="Tabla8_A1"><p class="P13">N</p></td>
										<td style="text-align:left;width:0.439cm; " class="Tabla8_D1"><p class="P13">I</p></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> </div>
				</td>
				<td style="text-align:left;width:4.26cm; " class="Tabla6_B1">
					<!--Next 'div' was a 'text:p'.-->
					<div class="Standard"><!--Next 'div' is a draw:frame.-->
						<div style="width:3.921cm; padding:0;  float:left; position:relative; left:0cm; top:-0.238cm; " class="fr4" id="Marco7">
							<!--Next 'div' was a 'draw:text-box'.-->
							<div style="min-height:0.041cm;">
								<table border="0" cellspacing="0" cellpadding="0" class="Tabla9">
									<colgroup>
										<col width="23"/><col width="18"/><col width="18"/>
										<col width="18"/><col width="18"/><col width="18"/>
										<col width="18"/><col width="18"/><col width="19"/>
									</colgroup>
									<tr class="Tabla91">
										<td style="text-align:left;width:0.531cm; " class="Tabla9_A1"><p class="P9">N</p></td>
										<td style="text-align:left;width:0.422cm; " class="Tabla9_A1"><p class="P8"> </p></td>
										<td style="text-align:left;width:0.422cm; " class="Tabla9_A1"><p class="P8"> </p></td>
										<td style="text-align:left;width:0.422cm; " class="Tabla9_A1"><p class="P8"> </p></td>
										<td style="text-align:left;width:0.422cm; " class="Tabla9_A1"><p class="P8"> </p></td>
										<td style="text-align:left;width:0.422cm; " class="Tabla9_A1"><p class="P8"> </p></td>
										<td style="text-align:left;width:0.422cm; " class="Tabla9_A1"><p class="P8"> </p></td>
										<td style="text-align:left;width:0.422cm; " class="Tabla9_A1"><p class="P8"> </p></td>
										<td style="text-align:left;width:0.439cm; " class="Tabla9_I1"><p class="P8"> </p></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> </div>
				</td>
				<td style="text-align:left;width:4.89cm; " class="Tabla6_B1"><!--Next 'div' was a 'text:p'.--><div class="Standard"><!--Next '
					div' is a draw:frame.
				-->
				<div style="width:4.509cm; padding:0;  float:left; position:relative; left:0cm; top:-0.153cm; " class="fr4" id="Marco8"><!--Next 'div' was a 'draw:text-box'.-->
					<div style="min-height:0.041cm;"><table border="0" cellspacing="0" cellpadding="0" class="Tabla10">
						<colgroup><col width="65"/><col width="65"/><col width="66"/></colgroup><tr class="Tabla101"><td colspan="3" style="text-align:left;width:1.496cm; " class="Tabla10_A1"><p class="P17">Fecha de Nacimiento:</p></td></tr><tr class="Tabla101"><td style="text-align:left;width:1.496cm; " class="Tabla10_A2"><p class="P8"> </p></td><td style="text-align:left;width:1.498cm; " class="Tabla10_A2"><p class="P8"> </p></td><td style="text-align:left;width:1.515cm; " class="Tabla10_A1"><p class="P8"> </p></td></tr></table></div></div></div><div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> </div></td></tr></table><p class="P7"> </p></td></tr><tr class="Tabla24"><td colspan="3" style="text-align:left;width:2.852cm; " class="Tabla2_A7"><table border="0" cellspacing="0" cellpadding="0" class="Tabla1"><colgroup><col width="139"/><col width="139"/></colgroup><tr class="Tabla11"><td style="text-align:left;width:3.171cm; " class="Tabla1_A1"><p class="P3"><span class="t1">Domicilio: </span></p></td><td style="text-align:left;width:3.17cm; " class="Tabla1_B1"><p class="P6">Leonardo da vinci 2874 </p></td></tr><tr class="Tabla11"><td style="text-align:left;width:3.171cm; " class="Tabla1_A2"><p class="P3"> </p></td><td style="text-align:left;width:3.17cm; " class="Tabla1_B2"><p class="P6"> </p></td></tr></table><p class="P3"> </p></td><td colspan="3" style="text-align:left;width:0.455cm; " class="Tabla2_D7"><p class="P7">Localidad: Rio Gallegos</p></td></tr><tr class="Tabla24"><td colspan="3" style="text-align:left;width:2.852cm; " class="Tabla2_A8"><p class="P7">Provincia: Santa Cruz</p></td><td colspan="3" style="text-align:left;width:0.455cm; " class="Tabla2_D8"><p class="P7">CP: 9400</p></td></tr><tr class="Tabla24"><td style="text-align:left;width:2.852cm; " class="Tabla2_A9"><p class="P7">Telefono:</p></td><td colspan="2" style="text-align:left;width:2.295cm; " class="Tabla2_B9"><p class="P8"> </p></td><td colspan="3" style="text-align:left;width:0.455cm; " class="Tabla2_D9"><!--Next 'div' was a 'text:p'.--><div class="P4"><span class="t1">Celular: </span><!--Next '
					div' is a draw:frame.
				-->
				<div style="width:5.5cm; padding:0;  float:left; position:relative; left:8,728999999999999cm; top:0cm; " class="fr5" id="Marco9"><!--Next 'div' was a 'draw:text-box'.-->
					<div style="min-height:0.041cm;">
						<table border="0" cellspacing="0" cellpadding="0" class="Tabla12">
						<colgroup><col width="240"/></colgroup>
						<tr class="Tabla121"><td style="text-align:left;width:5.5cm; " class="Tabla12_A1"><p class="P5">2966-595282</p></td></tr></table></div></div></div><div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> </div></td></tr><tr class="Tabla24"><td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A10"><!--Next 'div' was a 'text:p'.--><div class="P7">E-Mail: <!--Next '
					div' is a draw:frame.
				-->
				<div style="width:11.4cm; padding:0;  float:left; position:relative; left:2,29cm; top:-0.215cm; " class="fr3" id="Marco10"><!--Next 'div' was a 'draw:text-box'.-->
					<div style="min-height:0.041cm;"><table border="0" cellspacing="0" cellpadding="0" class="Tabla13">
						<colgroup><col width="310"/><col width="22"/><col width="166"/></colgroup>
						<tr class="Tabla131">
							<td style="text-align:left;width:7.1cm; " class="Tabla13_A1"><p class="P8"> </p></td>
							<td style="text-align:left;width:0.499cm; " class="Tabla13_A1"><p class="P13">@</p></td>
							<td style="text-align:left;width:3.808cm; " class="Tabla13_C1"><p class="P8"> </p>
							</td></tr>
							</table>
							</div>
							</div>
							</div>
							<div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> </div>
							<p class="P3"><span class="t1"/></p></td></tr>
							<tr class="Tabla211">
								<td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A11"><p class="p1"> </p></td>
								</tr>
								<tr class="Tabla24">
									<td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A1">
										<p class="P16">DATOS INTERNOS - ( no completar solo para uso interno)</p></td>
								</tr>
								<tr class="Tabla24">
									<td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A13"><p class="P7">Código-instalador :</p></td></tr>
								<tr class="Tabla24"><td style="text-align:left;width:2.852cm; " class="Tabla2_A14"><p class="P7">Fecha-alta1:</p></td>
									<td colspan="2" style="text-align:left;width:2.295cm; " class="Tabla2_B14"><p class="P7">Fecha-alta2:</p></td>
									<td colspan="3" style="text-align:left;width:0.455cm; " class="Tabla2_D14"><p class="P7">Código-:</p></td>
								</tr>
								<tr class="Tabla24">
									<td style="text-align:left;width:2.852cm; " class="Tabla2_A15"><p class="P7">Plan: <?php echo $plan ?></p></td>
									<td style="text-align:left;width:2.295cm; " class="Tabla2_B15"><p class="P7">Abono:  </p></td>
									<td colspan="2" style="text-align:left;width:1.887cm; " class="Tabla2_C15"><p class="P7">Fecha solicitud</p></td>
									<td style="text-align:left;width:4.066cm; " class="Tabla2_E15"><p class="P7"><span class="T1">ip1</span>:</p></td>
									<td style="text-align:left;width:5.5cm; " class="Tabla2_F15"><p class="P7">Instalador-responsable: </p></td>
								</tr>
								<tr class="Tabla24">
									<td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A20"><p class="P15">EQUIPAMIENTO A CUIDADO DEL CLIENTE:</p></td>
			</tr>
			<tr class="Tabla24">
				<td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A20"><p class="P7"> </p>
				</td>
			</tr>
			<tr class="Tabla24">
				<td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A20"><p class="P7"> </p>
				</td>
			</tr>
			<tr class="Tabla24">
				<td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A20"><p class="P7"> </p>
				</td>
			</tr>
			<tr class="Tabla24">
				<td colspan="6" style="text-align:left;width:2.852cm; " class="Tabla2_A20"><p class="P7"> </p>
				</td>
			</tr>
        </table>
	</form>
