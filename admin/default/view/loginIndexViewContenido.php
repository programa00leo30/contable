<?php

if(isset($_GET["ms"])){
	// un mensaje. del sistema:
	$msg = new html("div",[ 'class'=>"col-md-3" ], $_GET["ms"] );
	
}else
	$msg="";
	// <input type="password" class="form-control input-lg" id="password" placeholder="Password" required="" />

$rt= new html("div",['class'=>"row",'id'=>"pwd-container"],
	[
		new html("div",['class'=>"col-md-4"])
		,new html("div",['class'=>"col-md-4"],
		
			new html("section",['class'=>"login-form"],
				new html("form",[
					'method'=>"post"
					,'action'=> $helper->url("login","contrasenna")
					,'role'=>"login"
				],
					[
						new html("img",['src'=> $helper->url("login","img/logotipo.png"),'class'=>"img-responsive"])
						,new html("input",['class'=>"form-control input-lg",'required'=>""
							,'placeholder'=>"Nombre de usuario" , 'type0'=>"text",'name'=>"usr"])
						,new html("div",['class'=>"pwstrength_viewport_progress"])
						,new html("button",['type'=>"submit" 
							,'name'=>"enviar" ,'class'=>"btn btn-lg btn-primary btn-block"],"Entrar")
					]
				)
			)
		)
		,new html("div",['class'=>"col-md-4"],nz($estado,""))
	])

;

return $rt;
