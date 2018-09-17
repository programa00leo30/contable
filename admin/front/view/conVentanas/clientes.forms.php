<?php

/* convercion de verciones.
 * 
 */
 if(isset($row_Recordset1clienteform))
 {
	 
 $dat=$row_Recordset1clienteform;
}
else
{
	include("db/clientes.php");

	include("db/saldos_clientes.php");
	include("head.php");

	$contador=array("t"=>0,"cero"=>0,"moroso"=>array(0,0),"adeuda"=>array(0,0));

}

?>
<form id="form_clientes" name="form_clientes" method="post" action="<?php echo $editFormAction; ?>" target="mainFrame" onsubmit="greeting()">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">nombre</th>
    <th scope="col"><label>
      <input name="nombre" type="text" id="nombre" value="<?php echo $dat['nombre']; ?>" />
    </label></th>
    <th scope="col">&nbsp;</th>
    <th scope="col">apellido</th>
    <th scope="col"><label>
      <input name="apellido" type="text" id="apellido" value="<?php echo $dat['apellido']; ?>" />
    </label></th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>telefono</td>
    <td><label>
      <input name="telefono" type="text" id="telefono" value="<?php echo $dat['celular']; ?>" />
    </label></td>
    <td>&nbsp;</td>
    <td>direccion</td>
    <td><input name="direccion" type="text" id="direccion" value="<?php echo $dat['direccion']; ?>" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>DNI</td>
    <td><input name="dni" type="text" id="dni" value="<?php echo $dat['docnro']; ?>" /></td>
    <td>&nbsp;</td>
    <td>correo electronico </td>
    <td><input name="mail" type="text" id="mail" value="<?php echo $dat['mail']; ?>" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><label>modID
        <input name="modid" type="text" id="modid" value="<?php 
        echo  isset($tmp["Auto_increment"])?$tmp["Auto_increment"]:$dat['id'];  
        ?>" />
    </label></td>
    <td><input name="id" type="hidden" id="id" value="<?php  echo $dat['id']; ?>" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>cliente_id:</td>
    <td><?php echo $row_Recordset1clienteform['id']; ?></td>
    <td>&nbsp;</td>
    <td>estado:</td>
    <td><label>
      <select name="activo" id="activo">
        <option value="1" <?php if (!(strcmp(1, $row_Recordset1clienteform['activo']))) {echo "selected=\"selected\"";} ?>>activo</option>
        <option value="2" <?php if (!(strcmp(2, $row_Recordset1clienteform['activo']))) {echo "selected=\"selected\"";} ?>>mensaje</option>
        <option value="3" <?php if (!(strcmp(3, $row_Recordset1clienteform['activo']))) {echo "selected=\"selected\"";} ?>>moroso</option>
        <option value="5" <?php if (!(strcmp(5, $row_Recordset1clienteform['activo']))) {echo "selected=\"selected\"";} ?>>baja</option>
      </select>
    </label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
    <?php if (nz($row_Recordset1clienteform['id'],"") != ""){  ?>
		<td><label><button name="MM_update" value="form_clientes">modificar</button>
    </label></td><?php  } else {  ?>
    <td>
		<label>
      <button name="MM_insert" value="form_clientes">insertar</button>
    </label></td><?php } ?>
 
    <td><label>
      <button name="none" value="none">recargar</button>
    </label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
