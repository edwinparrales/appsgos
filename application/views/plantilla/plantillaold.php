<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sgos</title><link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
        <script src="<?php echo base_url('public/js/jquery.min.js') ?> "></script>
        <?php echo link_tag(base_url() . 'public/css/bootstrap.css'); ?> 
        <script src="<?php echo base_url('public/js/bootstrap.min.js') ?> "></script>
        
         <script src="<?php echo base_url('public/dist/sweetalert.min.js'); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/dist/sweetalert.css'); ?>">
        <script src="<?php echo base_url('public/dist/funciones.js'); ?>"></script>
        

        
        <!--data tables-->
        
        <?php echo link_tag(base_url() . 'public/media/css/dataTables.bootstrap.css'); ?> 
              
        <script src="<?php echo base_url('public/media/js/jquery.dataTables.js') ?> "></script>
        
        <script src="<?php echo base_url('public/media/js/dataTables.bootstrap.min.js') ?> "></script>
        <?php echo link_tag('https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.dataTables.min.css'); ?> 
        <script src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
         
         <!--Select2-->
         <?php echo link_tag(base_url() . 'public/select2/css/select2-bootstrap.css'); ?> 
         <?php echo link_tag(base_url() . 'public/select2/css/select2.css'); ?> 
       
        <script src="<?php echo base_url('public/select2/js/select2.full.js')?>"></script>

         <script src="<?php echo base_url('public/select2/js/select2.js')?>"></script>
    
    
    
    
    
    
    
    
    
    
    
        
        <link href="<?php echo base_url().'public/plantilla/css/bootstrap.css'?>" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url().'public/plantilla/css/font-awesome.css'?>" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url().'public/plantilla/css/custom.css'?>" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/logo.png" />
                    </a>
                </div>
                

                 <span class="logout-spn" >
                 
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

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

 <li >
                        <a href="index.html" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
                    </li>
                   

                    <li>
                        <a href="ui.html"><i class="fa fa-table "></i>UI Elements  <span class="badge">Included</span></a>
                    </li>
                    <li class="active-link">
                        <a href="blank.html"><i class="fa fa-edit "></i>Blank Page  <span class="badge">Included</span></a>
                    </li>



                 <li>
                        <a href="#"><i class="fa fa-qrcode "></i>My Link One</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i>My Link Two</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-edit "></i>My Link Three </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table "></i>My Link Four</a>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-edit "></i>My Link Five </a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>BLANK PAGE </h2> 


                        <?php $this->load->view($contenido) ?>


                    </div>
                </div>              
                <!-- /. ROW  -->
                <hr />

                <!-- /. ROW  -->           
            </div>
            <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;"  target="_blank">www.binarytheme.com</a>
                </div>
        </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
<!--    <script src="<?php echo base_url().'public/plantilla/js/jquery-1.10.2.js'?>"></script>-->
      <!-- BOOTSTRAP SCRIPTS -->
    
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url().'public/plantilla/js/custom.js'?>"></script>
    
   
</body>
</html>
