<div class="container">

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-inverse " role="navigation"  >
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url("Inicio/index") ?>">Sgos</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
<!--                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ordenes de Trabajo <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url()."Cot"?>">Orden de trabajo</a></li>
                            <li><a href="<?php echo base_url()."CotEquipo"?>">Relacion Equipos Cliente Ot</a></li>
                            <li><a href="<?php echo base_url()."Cagenda"?>">Relacion Profesionales Ot</a></li>
                          

                        </ul>
                    </li>-->
<!--                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url()."Ccliente"?>">Clientes</a></li>
                           
                            <li><a href="<?php echo base_url('CequipoCliente')?>">Equipos</a></li></li>
                        </ul>
                    </li>-->

                    <li><a href="<?php echo base_url("Cdetalleot")?>">Informe Tecnico</a></li></li>


                    <li class="dropdown">

                        <?php if ($this->session->userdata('perfil') == 'ADMINISTRADOR') { ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuraciones <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('usuario') ?>">Usuarios</a></li>

                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header"></li>
                                
                                

                            </ul>
                            
                        <?php } ?>

                    </li>
                    <!--<li><a href="<?php echo base_url('Profesionales')?>">Profesionales</a></li></li>-->
                <!--<li><a href="<?php echo base_url('Cservicio')?>">Servicios</a></li></li>-->
                        


                </ul>
                <ul class="nav navbar-nav navbar-right">
<!--                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dispositivos y proveedores <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url("Cproveedor")?>">Proveedores</a></li>
                            <li><a href="<?php echo base_url("Cdispositivo") ?>">Dispositivos</a></li>
                            <li><a href="<?php echo base_url('Cmarcas')?>">Marcas</a></li>

                        </ul>
                    </li>-->


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">Informacion del usuario</li>
                            <li><a href="">Nombre:<?php echo $this->session->userdata('nombre'); ?></a></li>
                            <li><a href="">Usuario:<?php echo $this->session->userdata('usuario'); ?></a></li>
                            <li><a href="">Perfil:<?php echo $this->session->userdata('perfil'); ?></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"  data-toggle="modal" data-target="#modusuario"><span title=" Modifica tu contraseña " class="glyphicon glyphicon-cog "></span>Cambiar Contraseña</a></li>
                            <li><a href="<?php echo base_url('login/logout') ?>"><span title=" Cierra la sesion" class=" glyphicon glyphicon-user"></span>Salir</a></li>

                        </ul>
                    </li>

                </ul>

            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <!-- Main component for a primary marketing message or call to action -->

</div> <!-- /container -->


