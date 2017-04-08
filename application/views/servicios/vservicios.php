
<div class="container-fluid">
    <section class="contenido">

        <div class="row">
            <ul class="nav nav-tabs success">
                <li class="active "><a id="tab-consultar" href="#tab1" data-toggle="tab"  style="color: #1B2631">Consultar</a></li>
                <li><a href="#tab2" data-toggle="tab" style="color: #1B2631">Registrar</a></li>

            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab1">

                    <div class="col-lg-8" id="listar"> <br>
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead class="text-capitalize">
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Tipo Servicio</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th>Operaciones</th>
                            </thead>
                            <tfoot>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Tipo Servicio</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th>Operaciones</th>

                            </tfoot>


                        </table>


                    </div>
                    <div class="col-lg-4">

                        <div class="panel panel-success">
                            <div class="panel-heading">Modificar Servicio</div>



                            <div class="panel-body" >
                                <form method="POST" action="" id="frmupdate">
                                     <div class="form-group">
                                            <label for="nombre">Codigo:</label>
                                            <input type="text" class="form-control" id="xcodigo" placeholder="Codigo" name="xcodigo" readonly="true">
                                        </div>
                                   <div class="form-group">
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" class="form-control" id="xnombre" placeholder="Nombre" name="xnombre">
                                        </div>

                                        <div class="form-group">
                                            <label for="descripcion">Descripcion:</label>
                                            <textarea class="form-control" id="xdescripcion" name="xdescripcion" placeholder="Descripcion"></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label for="tservicio">Tipo de servicio:</label>
                                            <input type="text" class="select2-chosen" id="xtservicio" placeholder="Tipo servicio" name="xtservicio">
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="subcategoria">Subcategoria:</label>
                                            <input type="text" class="select2-chosen" id="xsubcategoria" placeholder="Subcategoria" name="xsubcategoria">
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="valor">Valor:</label>
                                            <input type="number" class="form-control" id="xvalor" placeholder="$Valor" name="xvalor">
                                        </div>
                  

                                    <button id="btnactualizar" type="submit" class="btn btn-default btn-success">Actualizar</button>
                                </form>

                            </div>
                        </div>


                    </div>

                </div>


                <div class="tab-pane " id="tab2">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="panel panel-success">
                                <div class="panel-heading">Registrar Servicio</div>
                                <div class="panel-body" >
                                    <div class="warning" id="msj" style=" font-weight:bold"></div>      
                                    <form method="POST" action="" id="frmregistro">
                                        <div class="form-group">
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
                                        </div>



                                        <div class="form-group">
                                            <label for="descripcion">Descripcion:</label>
                                            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion"></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label for="tservicio">Tipo de servicio:</label>
                                            <input type="text" class="select2-chosen" id="tservicio" placeholder="Tipo servicio" name="tservicio">
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="subcategoria">Subcategoria:</label>
                                            <input type="text" class="select2-chosen" id="subcategoria" placeholder="Subcategoria" name="subcategoria">
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="valor">Valor:</label>
                                            <input type="number" class="form-control" id="valor" placeholder="$Valor" name="valor">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <button id="btnregistrar" type="submit" class="btn btn-default btn-primary">Registrar</button>
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
        $("#btnregistrar").click(guardar);

        $("#btnactualizar").click(actualizar);



        $("body").on("click", "#listar #btneditar", function () {
            vcodigo = $(this).parent().parent().children("td:eq(0)").text();
            vnombre = $(this).parent().parent().children("td:eq(1)").text();
            vdescripcion = $(this).parent().parent().children("td:eq(2)").text();
            vtservicio = $(this).parent().parent().children("td:eq(3)").text();
            vsubcate = $(this).parent().parent().children("td:eq(4)").text();
            valor = $(this).parent().parent().children("td:eq(5)").text();

            $("#xcodigo").val(vcodigo);
            $("#xnombre").val(vnombre);
            $("#xdescripcion").val(vdescripcion);
            $("#xtservicio").val(vtservicio);
            $("#xsubcategoria").val(vsubcate);
            $("#xvalor").val(valor);
            
            


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
            "ajax": '<?php echo base_url('Cservicio/listar') ?>',
            "columns": [
                {"data": "id_act"},
                {"data": "nombre"},
                {"data": "descripcion"},
                {"data": "tipo_servicio"},
                {"data": "subcategoria"},  
                {"data": "valor"},
                {"defaultContent": "<button  type=\"submit\" id=\"btneditar\" class=\"btn btn-success editar\"  data-toggle=\"modal\" data-target=\"#frmupdateEmple\"><span class=\"glyphicon glyphicon-pencil\"></span>E</button> <button class='btn btn-danger' id=\"btneliminar\" type='button'><span class=\"glyphicon glyphicon-trash \"></span>X</button>"
                }


            ]

        });


    }

    function guardar() {
        event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('Cservicio/guardar') ?>",
            type: "post",
            data: $("#frmregistro").serialize(),
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
            url: "<?php echo base_url('Cservicio/actualizar') ?>",
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
                            url: "<?php echo base_url('Cservicio/eliminar') ?>",
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



<!--datos de cmbox tipo de servicios y subcategoria-->


<script type="text/javascript">
    var data = [{id: 'MANTENIMIENTO PREVENTIVO', text: 'MANTENIMIENTO PREVENTIVO'}, {id: 'MANTENIMIENTO CORRECTIVO', text: 'MANTENIMIENTO CORRECTIVO'}, {id: 'RED', text: 'RED'}];

    $("#tservicio").select2({
        allowClear: true,
        placeholder: "Seleccione tipo de servicio",
        data: data
    });
    
    var subcate = [{id: 'SOFTWARE', text: 'SOFTWARE'}, {id: 'HARDWARE', text: 'HARDWARE'}];
      $("#subcategoria").select2({
        allowClear: true,
        placeholder: "Seleccione tipo de servicio",
        data: subcate
    });
      $("#xtservicio").select2({
        allowClear: true,
        placeholder: "Seleccione tipo de servicio",
        data: data
    });
    
    var subcate = [{id: 'SOFTWARE', text: 'SOFTWARE'}, {id: 'HARDWARE', text: 'HARDWARE'}];
      $("#xsubcategoria").select2({
        allowClear: true,
        placeholder: "Seleccione tipo de servicio",
        data: subcate
    });

</script>






