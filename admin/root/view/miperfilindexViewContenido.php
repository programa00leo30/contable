<?php

// miperfilindex :
$ngroup = "has-error has-feedback";
$inputgroup = "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span><div class=\"warning\" >$mensaje</div>";

// var_dump($acion);
// var_dump($mensaje);
?>
		<div class="signup-form-container">
    
         <!-- form start -->
         <form role="form" id="register-form" autocomplete="off" method="post" action="<?php 
			echo $helper->url("miperfil","confirmar" ) ?>" >
         
         <div class="form-header">
			<div class="pull-left"></div>
				<h3 class="form-title">
				<span class="glyphicon glyphicon-pencil"></span>
				<i class="fa fa-user"></i>Mis Datos:</h3>
			
			<?php echo $l ; ?>
         </div>
         
         <div class="form-body">
                      
            <div class="form-group <?php echo $helper->check("Nombre",$acion,$ngroup) ?>">
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                   <input name="Nombre" type="text" class="form-control" placeholder="Nombre" value="<?php echo $usuario->Nombre ; ?>" >
                   <?php echo $helper->check("Nombre",$acion,$inputgroup) ?></div>
                   <span class="help-block" id="error"></span>
              </div>
                        
            <div class="form-group <?php echo $helper->check("Apellido",$acion,$ngroup) ?>">
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                   <input name="Apellido" type="text" class="form-control" placeholder="Apellido" value="<?php echo $usuario->Apellido ; ?>" >
                   <?php echo  $helper->check("Apellido",$acion,$inputgroup) ?></div>
                   <span class="help-block" id="error"></span>
              </div>
                        
            <div class="form-group <?php $helper->check("funciones",$acion,$ngroup) ?>">
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                   <input name="funciones" type="text" class="form-control" placeholder="Nombre de Usuario" value="<?php 
					echo $usuario->funciones ; ?>" >
                   <?php echo  $helper->check("funciones",$acion,$inputgroup) ?></div>
                   <span class="help-block" id="error"></span>
              </div>
                        
            <div class="form-group <?php $helper->check("comandos",$acion,$ngroup) ?>">
                   <div class="input-group sumernote">
                   <div class="input-group-addon"><span class="glyphicon glyphicons-message-lock"></span></div>
                   
                   <?php 
                   // <textarea name="comandos" class="form-control" placeholder="Algoritmo" style="height: 400px;" ><?php echo $usuario->comandos ; ? ></textarea>
                   echo $html->editor( 
								$usuario->comandos 
								,"summernote"
								,"name=\"comandos\" class=\"form-control \" placeholder=\"Algoritmo\" style=\"height: 400px;\" ")
						. $helper->check("comandos",$acion,$inputgroup) ;
						
                   ?></div>
                   <span class="help-block" id="error"></span>
              </div>
                        
              <div class="form-group <?php $helper->check("seguridad",$acion,$ngroup) ?>">
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
						<input name="seguridad" type="text" class="form-control" placeholder="Correo" value="<?php echo $usuario->seguridad ; ?>">
						<?php echo  $helper->check("seguridad",$acion,$inputgroup) ?>
					</div> 
                   <span class="help-block" id="error"></span>                     
              </div>
                        
              <div class="row">
                        
                   <div class="form-group col-lg-6">
                        <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                        </div>  
                        <span class="help-block" id="error"></span>                    
                   </div>
                            
                   <div class="form-group col-lg-6">
                        <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="cpassword" type="password" class="form-control" placeholder="Retype Password">
                        </div>  
                        <span class="help-block" id="error"></span>                    
                   </div>
                            
             </div>
                        
                        
            </div>
            
            <div class="form-footer">
                 <button type="submit" class="btn btn-info">
                 <span class="glyphicon glyphicon-log-in"></span> Enviar Datos !
                 </button>
            </div>


            </form>
            
		</div>
