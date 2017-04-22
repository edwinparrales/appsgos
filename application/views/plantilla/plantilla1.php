<!DOCTYPE html>
<!--
Aplicacion web para el control de ordenes de trabajo dentro de la empresa soluciones E&S 
proyecto de grado para la UNIAJC
Edwin Parrales, Jefferson Alvarez, Jhom Payan 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sgos</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      
        <script src="<?php echo base_url('public/js/jquery.min.js') ?> "></script>
        <?php echo link_tag(base_url() . 'public/css/bootstrap.css'); ?> 
        <script src="<?php echo base_url('public/js/bootstrap.min.js') ?> "></script>
        
         <script src="<?php echo base_url('public/dist/sweetalert.min.js'); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/dist/sweetalert.css'); ?>">
        <script src="<?php echo base_url('public/dist/funciones.js'); ?>"></script>
   
        <!--data tables -->
        
        <?php echo link_tag(base_url() . 'public/media/css/dataTables.bootstrap.css'); ?> 
              
        <script src="<?php echo base_url('public/media/js/jquery.dataTables.js') ?> "></script>
        
        <script src="<?php echo base_url('public/media/js/dataTables.bootstrap.min.js') ?> "></script>
       
         <!--Select2-->
         <?php echo link_tag(base_url() . 'public/select2/css/select2-bootstrap.css'); ?> 
         <?php echo link_tag(base_url() . 'public/select2/css/select2.css'); ?> 
       
        <script src="<?php echo base_url('public/select2/js/select2.full.js')?>"></script>

         <script src="<?php echo base_url('public/select2/js/select2.js')?>"></script>

         
         
         
         
         

    </head>
    <body id="body" >
             <?php $this->load->view($nav) ?>

        <br>





        <div>
            <?php $this->load->view($contenido) ?>
        </div>


        <!-- Modal cambio de  contraseña -->
        <div id="modusuario" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Registro de usuarios</h4>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="<?php echo base_url('/Usuario/updatePasswd') ?>" class="form-group-lg"  >
                            <?php
                            $updatePasswd = $this->session->flashdata('updatePasswd');
                             $updatePasswd2 = $this->session->flashdata('updatePasswd2');
                             if(!$updatePasswd==null){
                                  echo "<script>jQuery(function(){swal(\"Ok\", \"$updatePasswd\", \"success\");});</script>";
                             }
                             if(!$updatePasswd2==null){
                                  echo "<script>jQuery(function(){swal(\"Error\", \"$updatePasswd2\", \"error\");});</script>";
                             }
                            ?>
                            <div class="form-group">

                                <label class="control-label">Usuario:</label>
                                <input value="<?php echo $this->session->userdata('usuario'); ?>" class="form-control" type="text" name="usuario" id="usuario" >

                            </div>

                            <div class="form-group">

                                <label class="control-label">Contraseña anterior:</label>
                                <input class="form-control" type="password" name="passwd1" id="passwd1" required="true" >

                            </div>
                            <div class="form-group">

                                <label class="control-label">Contraseña nueva: </label>
                                <input class="form-control" type="password" name="passwd2" id="passwd2"  required="true">

                            </div>

                            <button type="submit"  class="btn-primary" >Modificar</button>

                        </form>

                    </div>

                    <br>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
        
  
        


    </body>
</html>
