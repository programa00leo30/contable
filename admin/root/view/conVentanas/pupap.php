<html>
<script type="text/javascript">
function popSubmit(form)
{
    var popName = "formPopUp";
    var popStyle = "width=300,height=300,location=yes,resizable=yes";
    form.action = "theOtherSubmit.php";
    form.target = popName;
    window.open("about:blank",popName,popStyle);
}
</script>
<head>
<title>Table Row CSS Visibity Test</title>

  <form name="form1"      method="get"      action="normalSubmit.php">
    <input name="text1" type="text" value="some text"><br>
    <!-- normal -->
    <input type="submit" value="submit"><br>
    <!-- popup -->
    <input type="image" src="someImage.gif"     width="100" height="100"        onclick="popSubmit(this.form);">
  </form>

</body>
</html>