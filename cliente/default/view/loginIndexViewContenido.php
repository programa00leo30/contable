<?php
$doc =new html("div",['class'=>"row justify-content-center align-items-center" ,"style"=>"height:100vh"],
	new html("div",['class'=>"col-4"],
		new html("div",['class'=>"card"],
			new html("div",['class'=>"card-body"],[
				new html("selection",['class'=>"login-form"],[
					new html("form",[
						'role'=>"login",'method'=>"post"
						,"action"=>$helper->url("login","comprobacion")
						,"autocomplete"=>"off"
						],[
						// formulario:
						new html("div",['class'=>"col-10"],nz($mensaje,""))
						,new html("div",['class'=>"card"],
							new html("input",['type'=>"usr",name=>"user",placeholder=>"Nombre de usuario",value=>""]))
						,new html("div",['class'=>"card"],
							new html("input",['type'=>"password",name=>"Passwd",placeholder=>"Clave de Accesso",value=>""]))
						,new html("button",[
							'class'=>"btn btn-lg btn-primary btn-bloc"
							,"name"=>"enviar"
							,"type"=>"submit"
							],"Entrar")
					])
				])	
				,new html("div",['class'=>"col-md-4"],nz($estado,""))
			])
		)
	)
);

return $doc;

