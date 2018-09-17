<?php
include("head.php");

?>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="26%" height="96">&nbsp;</td>
    <td width="40%" align="center">&nbsp;</td>
    <td width="34%">&nbsp;</td>
  </tr>
  <tr>
    <td height="359">&nbsp;</td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr bordercolor="#FFDCBC" bgcolor="#CC9966">
    <td><table width="100%" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;<b>!</b>&nbsp;</td>
        <td width="100%"><div align="center"><strong><font color="#000000">ENTRADA</font></strong></div></td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#CCCC66">
    <td width="100%" colspan="2"><form name="login" method="post" action="<?php echo $target ?>" >
      <?php 
      // identificar al usuario.
      if ($et1) { 
		  ?>
      <p>
        <label for="textfield">NOMBRE USUARIO </label>
        <br />
        <input name="comandos" type="text" id="comandos" value="<?php echo $row_usr['funciones']; ?>" />
      </p><?php 
      } else { 
		  // etapa 2 del login
		  ?>
      <p>
        <label for="textfield2">CONTRASE&Ntilde;A<?php echo " " .(isset($pregunta)?$pregunta:"-"); ?></label>
        <br />
        <input type="text" name="respuesta" id="respuesta"  value="<?php echo " " .(isset($local)?$local:"-"); ?>"/>
      </p><?php 
      } // fin de login 
      ?>
      <p>
        <input type="submit" name="Submit" value="ENVIAR" />
      </p>
      <p>&nbsp; </p>
    </form></td>
  </tr>
</table>
<?php echo " " .(isset($msg)?$msg:"-"); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
