
<div class="container-fluid">
    <section class="contenido">

        <div class="row">
            <ul class="nav nav-tabs success">
                <li class="active "><a id="tab-consultar" href="#tab1" data-toggle="tab"  style="color: #1B2631">Consultar</a></li>
                <li><a href="#tab2" data-toggle="tab" style="color: #1B2631">Registrar</a></li>

            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab1">

                    <div class="col-lg-6" id="listamarcas"><br>
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead class="text-capitalize">
                            <th>Codigo</th>
                            <th>Nombre Marca</th>
                            <th>Operaciones</th>
                            </thead>
                            <tfoot>
                            <th>Codigo</th>
                            <th>Nombre Marca</th>
                            <th>Operaciones</th>

                            </tfoot>


                        </table>


                    </div>
                    <div class="col-lg-6">

                        <div class="panel panel-success">
                            <div class="panel-heading">Modificar Marca</div>



                            <div class="panel-body" >
                                <form method="POST" action="<?PHP echo base_url('Cmarcas/update') ?>" id="frmupdate">
                                    <div class="form-group">
                                        <label for="login">Codigo:</label>
                                        <input type="text" class="form-control" id="xcodigo" placeholder="Codigo:" name="xcodigo" readonly="true">
                                    </div>

                                    <div class="form-group">
                                        <label for="login">Nombre de la marca:</label>
                                        <input type="text" class="form-control" id="xmarca" placeholder="Marca:" name="xmarca">
                                    </div>




                                    <button id="btnactualizarmarca" type="submit" class="btn btn-default btn-success">Actualizar</button>
                                </form>

                            </div>
                        </div>


                    </div>

                </div>


                <div class="tab-pane " id="tab2">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-2">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Registrar Marca</div>
                                <div class="panel-body" >
                                    <div class="warning" id="msj" style=" font-weight:bold"></div>      
                                    <form method="POST" action="<?PHP echo base_url('/Cmarcas/guardar') ?>" id="frmregistromarcas">
                                                     


                                        <div class="form-group">
                                            <label for="marca">Ingrese el nombre de la marca:</label>
                                            <input type="text" class="form-control" id="marca" placeholder="Marca" name="marca">
                                        </div>
                                        <div class="form-group">
                                            <button id="btnregistrarmarcas" type="submit" class="btn btn-default btn-primary">Registrar</button>
                                        </div>
                                    </form>


                                </div>


                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
</div>

</section>


</div>

<script type="text/javascript">
    $(document).ready(function () {
        mostrardatos();
        $("#btnregistrarmarcas").click(guardar);

        $("#btnactualizarmarca").click(actualizar);



        $("body").on("click", "#listamarcas #btneditar", function () {
            vcodigo = $(this).parent().parent().children("td:eq(0)").text();
            vmarca = $(this).parent().parent().children("td:eq(1)").text();
            $("#xcodigo").val(vcodigo);
            $("#xmarca").val(vmarca);


        });
        $("body").on("click", "#listamarcas #btneliminar", function () {
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
            "ajax": '<?php echo base_url('Cmarcas/listar') ?>',
            "columns": [
                {"data": "cod_marc"},
                {"data": "nombre"},
                {"defaultContent": "<button  type=\"submit\" id=\"btneditar\" class=\"btn btn-success editar\"  data-toggle=\"modal\" data-target=\"#frmupdateEmple\"><span class=\"glyphicon glyphicon-pencil\"></span>E</button> <button class='btn btn-danger' id=\"btneliminar\" type='button'><span class=\"glyphicon glyphicon-trash \"></span>X</button>"
                }


            ]

        });


    }

    function guardar() {
        event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('Cmarcas/guardar') ?>",
            type: "post",
            data: $("#frmregistromarcas").serialize(),
            success: function (respuesta) {


                $("#msj").html(respuesta);
                $("#msj").css("background-color", "#D1A6AC");

                if (respuesta == "Registro Guardado") {
                    jQuery.fn.reset = function () {
                        $(this).each(function () {
                            this.reset();
                        });
                    };


                    $("#frmregistromarcas").reset();
                    $("#msj").css("background-color", "#82E0AA");


                }

            }
        });

        mostrardatos();
    }


    function actualizar() {
        event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('Cmarcas/actualizar') ?>",
            type: "POST",
            data: $("#frmupdate").serialize(),
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
                            url: "<?php echo base_url('Cmarcas/eliminar') ?>",
                            type: "POST",
                            data: {id: vcodigo},
                            success: function (respuesta) {
                                swal(respuesta);

                            }
                        });

                        swal("¡Hecho!",
                                "Registro Eliminado",
                                "success");

                        $("#example").dataTable().fnDestroy();
                        mostrardatos();


                    } else {
                        swal("Operación Cancelada",
                                "El registro no sera eliminado",
                                "error");
                    }
                });
    }



</script>







