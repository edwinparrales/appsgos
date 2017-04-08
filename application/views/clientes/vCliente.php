<div class="container-fluid">
    <section class="contenido">

        <div class="row">
            <ul class="nav nav-tabs success">
                <li class="active "><a id="tab-consultar" href="#tab1" data-toggle="tab"  style="color: #1B2631">Registrar</a></li>
                <li><a href="#tab2" data-toggle="tab">Consultar</a></li>

            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <div class="row">
                        <div class="col-lg-6 col-md-offset-1">
                            <div class="panel panel-info">
                                <div class="panel-heading">Registrar Cliente</div>
                                <div class="panel-body" >
                                    <div class="warning" id="msj" style=" font-weight:bold"></div>      
                                    <form method="POST" action="" id="frmregistrocliente">

                                        <div class="form-group">
                                            <label for="tipo documento">Tipo de documento:</label>
                                            <input type="text" class="form-control" id="tdocumento" placeholder="tipo documento" name="tdocumento">
                                        </div>
                                        <div class="form-group">
                                            <label for="dni">Dni:</label>
                                            <input type="text" class="form-control" id="dni" placeholder="Dni" name="dni">
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" class="form-control" id="nombre" placeholder="Nombres" name="nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="celular">Numero celular:</label>
                                            <input type="text" class="form-control" id="celular" placeholder="Numero celular" name="celular">
                                        </div>
                                        <div class="form-group">
                                            <label for="ciudad">Ciudad:</label>
                                            <input type="text" class="form-control" id="ciudad" placeholder="Ciudad" name="ciudad">
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Direccion:</label>
                                            <input type="text" class="form-control" id="direccion" placeholder="Direccion" name="direccion">
                                        </div>
                                        <div class="form-group">
                                            <label for="barrio">Barrio:</label>
                                            <input type="text" class="form-control" id="barrio" placeholder="Barrio" name="barrio">
                                        </div>
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones:</label>
                                            <textarea id="observaciones" name="observaciones" class="form-control" placeholder="Observaciones"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button id="btnguardar" type="submit" class="btn btn-default btn-primary">Guardar</button>
                                        </div>
                                    </form>


                                </div>


                            </div>
                        </div>
                    


                    </div>


                </div>


                <div class="tab-pane " id="tab2">

                    <div class="col-lg-12" id="listar"><br>
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead class="text-capitalize">
                            <th>Codigo</th>
                            <th>Tipo de identificacion</th>
                            <th>Dni</th>
                            <th>Nombres</th>
                            <th>Email</th>
                            <th>Numero celular</th>
                            <th>Ciudad</th>
                            <th>Direccion</th>
                            <th>Barrio</th>
                            <th>Observaciones</th>
                            <th>Operaciones</th>
                            </thead>
                            <tfoot>
                            <th>Codigo</th>
                            <th>Tipo de identificacion</th>
                            <th>Dni</th>
                            <th>Nombres</th>
                            <th>Email</th>
                            <th>Numero celular</th>
                            <th>Ciudad</th>
                            <th>Direccion</th>
                            <th>Barrio</th>
                            <th>Observaciones</th>
                            <th>Operaciones</th>
                            </tfoot>


                        </table>


                    </div>


                </div>

            </div>

        </div>
</div>

</section>

    <!--    Modal editar Cliente-->

    <div id="frmupdate" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-success">
                        <div class="panel-heading">Modificar Cliente</div>



                        <div class="panel-body" >
                            <form method="POST" action="<?PHP echo base_url('') ?>" id="frmupdatex">
                                <div class="form-group">
                                    <label for="codigo">Codigo:</label>
                                    <input type="text" class="form-control" id="xcodigo" placeholder="Codigo" name="xcodigo" readonly="true">
                                </div>
                                <div class="form-group">
                                    <label for="tipo documento">Tipo de documento:</label>
                                    <input type="text" class=" select2-chosen" id="xtdocumento" placeholder="tipo documento" name="xtdocumento">
                                </div>
                                <div class="form-group">
                                    <label for="dni">Dni:</label>
                                    <input type="text" class="form-control" id="xdni" placeholder="Dni" name="xdni">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="xnombre" placeholder="Nombres" name="xnombre">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="xemail" placeholder="Email" name="xemail">
                                </div>
                                <div class="form-group">
                                    <label for="celular">Numero celular:</label>
                                    <input type="text" class="form-control" id="xcelular" placeholder="Numero celular" name="xcelular">
                                </div>
                                <div class="form-group">
                                    <label for="ciudad">Ciudad:</label>
                                    <input type="text" class="form-control" id="xciudad" placeholder="Ciudad" name="xciudad">
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Direccion:</label>
                                    <input type="text" class="form-control" id="xdireccion" placeholder="Direccion" name="xdireccion">
                                </div>
                                <div class="form-group">
                                    <label for="barrio">Barrio:</label>
                                    <input type="text" class="form-control" id="xbarrio" placeholder="Barrio" name="xbarrio">
                                </div>
                                <div class="form-group">
                                    <label for="observaciones">Observaciones:</label>
                                    <textarea id="xobservaciones" name="xobservaciones" class="form-control" placeholder="Observaciones"></textarea>
                                </div>
                                <div class="form-group">
                                    <button id="btnupdate" type="submit" class="btn btn-default btn-primary">Actualizar</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>










</div>

<script type="text/javascript">
    $(document).ready(function () {
        mostrardatos();
        $("#btnguardar").click(guardar);

        $("#btnupdate").click(actualizar);



        $("body").on("click", "#listar #btneditar", function () {
            vcodigo=$(this).parent().parent().children("td:eq(0)").text();
            vtdocumento= $(this).parent().parent().children("td:eq(1)").text();
            vdni= $(this).parent().parent().children("td:eq(2)").text();
            vnombre= $(this).parent().parent().children("td:eq(3)").text();
             vemail= $(this).parent().parent().children("td:eq(4)").text();
            vcelular= $(this).parent().parent().children("td:eq(5)").text();
           
            vciudad= $(this).parent().parent().children("td:eq(6)").text();
            vdireccion= $(this).parent().parent().children("td:eq(7)").text();
            vbarrio= $(this).parent().parent().children("td:eq(8)").text();
            vobservaciones= $(this).parent().parent().children("td:eq(9)").text();
          
            $("#xcodigo").val(vcodigo);
            $("#xtdocumento").val(vtdocumento);
            $("#xdni").val(vdni);
            $("#xnombre").val(vnombre);
            $("#xcelular").val(vcelular);
            $("#xemail").val(vemail);
            $("#xciudad").val(vciudad);
            $("#xdireccion").val(vdireccion);
            $("#xbarrio").val(vbarrio);
            $("#xobservaciones").val(vobservaciones);
            


        });
        $("body").on("click", "#listar #btneliminar", function () {
            vcodigo = $(this).parent().parent().children("td:eq(0)").text();
            eliminar(vcodigo);

        });


        $("body").on("click", "#tab-consultar", function () {
            $("#msj").html(" ");
            $("#msj").css("background-color", false);
            $("#xcodigo").val(" ");
            $("#xmarca").val(" ");
        });


    });

    function mostrardatos() {
        $("#example").dataTable().fnDestroy();
        $('#example').DataTable({
          
            "ajax": '<?php echo base_url('Ccliente/listar') ?>',
            "columns": [
                {"data": "cod_client"},
                {"data": "tipo_dni"},
                {"data": "dni"},
                {"data": "nombre"},
                {"data": "email"},
                {"data": "num_celular"},
                {"data": "ciudad"},
                {"data": "direccion"},
                {"data": "barrio"},
                {"data": "observaciones"},
                {"defaultContent": "<button  type=\"submit\" id=\"btneditar\" class=\"btn btn-success \"  data-toggle=\"modal\" data-target=\"#frmupdate\"><span class=\"glyphicon glyphicon-pencil\"></span>E</button> <button class='btn btn-danger' id=\"btneliminar\" type='button'><span class=\"glyphicon glyphicon-trash \"></span>X</button>"
                }


            ]

        });


    }

    function guardar() {
        event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('Ccliente/guardar') ?>",
            type: "post",
            data: $("#frmregistrocliente").serialize(),
            success: function (respuesta) {


                $("#msj").html(respuesta);
                $("#msj").css("background-color", "#D1A6AC");

                if (respuesta == "Registro Guardado") {
                    jQuery.fn.reset = function () {
                        $(this).each(function () {
                            this.reset();
                        });
                    };


                    $("#frmregistrocliente").reset();
                    $("#msj").css("background-color", "#82E0AA");


                }

            }
        });

        mostrardatos();
    }


    function actualizar() {
        event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('Ccliente/actualizar') ?>",
            type: "POST",
            data: $("#frmupdatex").serialize(),
            success: function (respuesta) {
                alert(respuesta);
                mostrardatos();


            },
            error: function (data) {
                alert(data);
            }

        });

        mostrardatos();

    }


    function eliminar(vcodigo) {
  
  
        swal({
            title: "¿Esta seguro de eliminar el registro?",
            text: "Esto lo eliminara definitivamente",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "¡Eliminar!",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "<?php echo base_url('Ccliente/eliminar') ?>",
                            type: "POST",
                            data: {id: vcodigo},
                            success: function (respuesta) {
                                if(respuesta=="Registro Eliminado"){
                                   swal("El registro fue eliminado","Aceptar","success");
                                    
                                }
                                
                               

                            }
                        });

                         mostrardatos();

                     

                    } else {
                        swal("Operación Cancelada",
                                "El registro no sera eliminado",
                                "error");
                    }
                });
                
                
    }



</script>

<script type="text/javascript">
    var data = [{id: 'CEDULA', text: 'Cedula'}, {id: 'TI', text: 'Tarjeta de identidad'}, {id: 'RUT', text: 'Registro unico tributario(Rut)'}];

    $("#tdocumento").select2({
        allowClear: true,
        placeholder: "Seleccione tipo documento",
        data: data
    })
     $("#xtdocumento").select2({
        allowClear: true,
        placeholder: "Seleccione tipo documento",
        data: data
    })
</script>



