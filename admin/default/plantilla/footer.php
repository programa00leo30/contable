<?php
function t($caracter,$nombre,$img){
	return 
		new html("div",array("class"=>"col-md-4"),
			array(
				new html("center",array(),array(
					new html("img",array(
						"src" => $img
						,"class"=>"img-circle"
						,"alt"=>"the-brains"
					))
					,new html("br")
					,new html("h4",array("class"=>"footertext"),"$caracter")
					,new html("p",array("class"=>"footertext"),"$nombre")
				))
			))
		;
}
	
	
$footer=
	new html("div",array("class"=>"container"),
		[
			new html("div",array("class"=>"row"),
				array(
					new html("h3",array("class"=>"footertext"),"Sobre Nosotros:")
					,new html("br")
					,t("Programador","Leandro Morala",$helper->url("img","script.png",["x"=>64,"y"=>"64"]) )
					,t("Artista","Leandro Morala",$helper->url("img","lapiz.png",["x"=>64,"y"=>"64"]))
					,t("Diseñador","Leandro Morala",$helper->url("img","magic.png",["x"=>64,"y"=>"64"]))
					,new html("div",array("class"=>"row"),
						new html("p",[],
							new html("center",[],[
								new html("a",array("href"=>"#"),"Contactanos aqui!")
								,new html("p",['class'=>"footertext"],"CopyLeft 2019")
							])
						)
					)
				))
			,new coment("fin de footer")
		])
	;	
$footer->tab(4);

echo $footer;
					
?>
