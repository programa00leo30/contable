	 <nav class="sidebar">
		<ul class="nav">  
			<!-- START user info-->
               <li>
                  <div data-toggle="collapse-next" class="item user-block has-submenu" >
                     <!-- User picture-->
                     <div class="user-block-picture">
                        <img src="avatarIMG.jpg" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle">
                        <!-- Status when collapsed-->
                        <div class="user-block-status">
                           <div class="point point-success point-lg"></div>
                        </div>
                     </div>
                     <!-- Name and Role-->
                     <div class="user-block-info" data-toggle="collapse" data-target="#multicollapse" aria-controls="multicollapse">
                        <span class="user-block-name item-text">Bienvenido, UserName</span>
                        <span class="user-block-role">UserRole</span>
                        <!-- START Dropdown to change status-->
                        <div class="btn-group user-block-status">
                           <button type="button" data-toggle="dropdown" data-play="fadeIn" data-duration="0.2" class="btn btn-xs dropdown-toggle">
                              <div class="point point-success"></div>Online</button>
                           <ul class="dropdown-menu text-left pull-right">
                              <li>
                                 <a href="#">
                                    <div class="point point-success"></div>Conectado</a>
                              </li>
                              <li>
                                 <a href="#">
                                    <div class="point point-warning"></div>Desconectado</a>
                              </li>
                              <li>
                                 <a href="#">
                                    <div class="point point-danger"></div>Ocupado</a>
                              </li>
                           </ul>
                        </div>
                        <!-- END Dropdown to change status-->
                     </div>
                  </div>
                  <!-- START User links collapse-->
