<div id="container">
    <div class="col-md-6 col-md-offset-2">
        <h1 > Formulario Editar Usuarios </h1>
        <form method="POST" action="<?PHP echo base_url('/usuario/update') ?>" class="form-group-sm">
            <div class="form-group-sm">
                <label for="login">Codigo:</label>
                <input type="text" value="<?php echo $usuarios->consec ?>"class="form-control" id="id" placeholder="Login" name="id" required="true" readonly="true" >
            </div>

            <div class="form-group-sm">
                <label for="login">Login:</label>
                <input type="text" value="<?php echo $usuarios->login ?>" class="form-control" id="login" placeholder="Login" name="login" required="true">
            </div>
            <div class="form-group-sm">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password" required="true" value="">
            </div>

            <div class="form-group-sm">
                <label for="perfil">Perfil:</label>
                <select name="perfil" class="form-control"   >
                    <?php foreach ($perfiles as $value) { ?>
                        <option value="<?php echo $value; ?>"><?php echo $value ?><option/>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label  for="idProfesional">Cedula Empleado:</label>
                <select class="form-control" id="cedula" name="cedula"></select>

            </div>
            <div class="form-group-sm">
                <label for="perfil">Estado:</label>
                <select name="estado" class="form-control"   >
                    <?php foreach ($est as $value) { ?>
                        <option value="<?php echo $value; ?>"><?php echo $value ?><option/>
                    <?php } ?>
                </select>
            </div><br>
            <div class="form-group-sm">
                <button type="submit" class="btn btn-default btn-success col-lg-4" title="Editar"><span class=" glyphicon glyphicon-edit"></span>Editar</button><a type="button" href="<?php echo base_url('Usuario') ?>" class="btn btn-default btn-danger col-lg-4" title="Cancelar"><span class=" glyphicon glyphicon-off"></span>Cancelar</a>
            </div>
        </form>
    </div>
</div>

<script>
    
          $("#cedula").select2({
            id: function (data) {
                return data.id;
            },
            allowClear: true,
            placeholder: "Digite numero de cedula o apellido.",
            ajax: {
                url: "http://localhost/demosots/Profesionales/list3",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;

                    return {
                        results: data

                    };
                },
                cache: true,
                minimumInputLength: 1
            }


        });
    
    
    
</script>