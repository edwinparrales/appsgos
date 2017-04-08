<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title> Login Sgos</title>

    <head>
        <meta charset="UTF-8">
        <title>Sgos</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url('public/css/simple-sidebar.css') ?> " rel="stylesheet">
        <link href="<?php echo base_url('public/css/bootstrap.min.css') ?> " rel="stylesheet">
        <script src="<?php echo base_url('public/js/bootstrap.min.js') ?> "></script>
        <script src="<?php echo base_url('public/jquery-ui/jquery-ui.js') ?> "></script>
        <link href="<?php echo base_url('public/jquery-ui/jquery-ui.css') ?> " rel="stylesheet">
        <script src="<?php echo base_url('public/js/jquery.min.js') ?> "></script>
        <script src="<?php echo base_url('public/js/jquery-1.10.2.min.js') ?> "></script>

    </head>


</head>
<body>

    <br>
    <br>

    <div class="col-lg-4 col-lg-offset-4">
        <div class="panel panel-info center-block">
            <?php echo "<div class=\"bg-warning\"><h3>" . $this->session->flashdata('error') . "</h3></div>" ?>
            <div class="panel-heading"><h3>Login Sgos</h3></div>
            <div class="panel-body" >
                <form class="form-signin" method="post" action="login/inicio">  
                    <div class="row center-block">
                        <div class="form-group center-block">
                            <img class="profile-img"
                                 src="<?php echo base_url('public/img/logo.jpg')?>"  width="200">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" class="form-control" name="usuario" placeholder="Nombre usuario " required="" autofocus="" id="usuario"/>

                        </div>



                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-tag"></i>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required="" id="password"/>      

                        </div>
                        
                    </div>   
                    <div class="form-group">
                        <button class="btn btn-block" type="submit">Entrar</button>   

                    </div>

                </form>
            </div>
            <div class="panel-footer">
                Sgos
            </div>
        </div>
    </div>





</body>
</html>
