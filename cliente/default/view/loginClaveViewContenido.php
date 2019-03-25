<?php


// echo $helper->incluir("headLogin.php","view") ;

$d=new html("div",['class'=>"row",id=>"pwd-container"],[
	new html("div",['class'=>"col-md-4"])
	,new html("div",['class'=>"col-md-4"],[
		new html("selection",['class'=>"login-form"],[
			new html("form",['role'=>"login",'method'=>"post",action=>$helper->url("login","comprobacion")],[
				// formulario:
				
			])
		])	
	])
	,new html("div",['class'=>"col-md-4"],nz($estado,""))
]);
?>
    <body>
    <div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action="<?php echo $helper->url("login","comprobacion") ?>" role="login">
          <img src="<?php echo $helper->url("img","empresa") ?>" class="img-responsive" alt="" />
          <div class="pwstrength_viewport_progress">--<?php echo $indicio ?>--</div>
          <input type="password" name="paswd" class="form-control input-lg" id="password" placeholder="Password" required="" />
          <div class="pwstrength_viewport_progress"></div>
          
          
          <button type="submit" name="enviar" class="btn btn-lg btn-primary btn-block">Entrar</button>
          
        </form>
        
        <div class="form-links">
          <a href="<?php echo $helper->url("index","index") ?>"><?php echo $helper->url("index","index") ?></a>
        </div>
      </section>  
      </div>
      
      <div class="col-md-4"><?php if (isset($estado)){ echo $estado; } ;?></div>
		

  </div>
  
  
</div>
<?php
echo $helper->incluir("loginFooter.php","view");
?>
