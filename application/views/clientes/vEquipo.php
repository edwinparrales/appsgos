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
                                <div class="panel-heading">Registrar Equipo Cliente</div>
                                <div class="panel-body" >
                                    <div class="warning" id="msj" style=" font-weight:bold"></div>      
                                    <form method="POST" action="" id="frmregistro">
                                        <div class="form-group">
                                            <label for="id_label_single"> Seleccione el tipo de dispositivo:</label>
                                            <select class="js-example-basic-single js-states form-control" id="dispositivo" name="dispositivo"></select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_label_single">
                                                Seleccione marca:

                                        </label>
                                            <select class="js-example-basic-single js-states form-control" id="marca" name="marca"></select>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_label_single">
                                                Seleccione cliente:

                                            </label>
                                            <select class="js-example-basic-single js-states form-control" id="cliente" name="cliente"></select>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Modelo:</label>
                                            <input type="text" class="form-control" id="modelo" placeholder="Modelo" name="modelo">
                                        </div>
                                        <div class="form-group">
                                            <label for="celular">Serial:</label>
                                            <input type="text" class="form-control" id="serial" placeholder="Serial" name="serial">
                                        </div>
                                        <div class="form-group">
                                            <label for="ciudad">Placa:</label>
                                            <input type="text" class="form-control" id="placa" placeholder="Placa" name="placa">
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Detalles fisicos:</label>
                                            <input type="text" class="form-control" id="dtefisco" placeholder="Detalles fisicos" name="dtefisico">
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
                            <th>Dispositivo</th>
                            <th>Marca</th>
                            <th>Informacion Cliente</th>
                            <th>Modelo</th>
                            <th>Serial</th>
                            <th>Placa</th>
                            <th>Detalles Fisicos</th>
                            <th>Codigo Cliente</th>
                            <th>Operaciones</th>
                            </thead>
                            <tfoot>
                            <th>Codigo</th>
                            <th>Dispositivo</th>
                            <th>Marca</th>
                            <th>Informacion Cliente</th>
                            <th>Modelo</th>
                            <th>Serial</th>
                            <th>Placa</th>
                            <th>Detalles Fisicos</th>
                            <th>Codigo Cliente</th>
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
                <h4 class="modal-title">Editar Equipo Cliente</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-success">
                    <div class="panel-heading">Modificar Equipo Cliente</div>



                    <div class="panel-body" >
                        <form method="POST" action="" id="frmupdatex">
                            <div class="form-group">
                                <label>codigo</label>
                                <input class="form-control" id="xcodigo" name="xcodigo" readonly="true">

                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="id_label_single"> Seleccione el tipo de dispositivo:  </label>

                                    <input id="xdispositivo1" readonly="true" class="form-control">
                                </div>

                                <div class="form-group">
                                    <select class="js-example-basic-single" id="xdispositivo" name="xdispositivo"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="id_label_single">  Seleccione marca:</label>

                                    <input id="xmarca1" readonly="true" class="form-control">
                                </div>
                                <div>
                                    <select class="js-example-basic-single " id="xmarca" name="xmarca"></select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="id_label_single">Seleccione cliente:</label>
                                    <input id="xcliente1" readonly="true" class="form-control">
                                </div>

                                <select class="js-example-basic-single " id="xcliente" name="xcliente"></select>
                            </div>

                            <div class="form-group">
                                <label for="modelo" >Modelo:</label>
                                <input type="text" class="form-control" id="xmodelo" placeholder="Modelo" name="xmodelo">
                            </div>
                            <div class="form-group">
                                <label for="serial">Serial:</label>
                                <input type="text" class="form-control" id="xserial" placeholder="Serial" name="xserial">
                            </div>
                            <div class="form-group">
                                <label for="placa">Placa:</label>
                                <input type="text" class="form-control" id="xplaca" placeholder="Placa" name="xplaca">
                            </div>
                            <div class="form-group">
                                <label for="detalles">Detalles fisicos:</label>
                                <input type="text" class="form-control" id="xdtefisco" placeholder="Detalles fisicos" name="xdtefisico">
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
            vdispositivo= $(this).parent().parent().children("td:eq(1)").text();
            vmarca= $(this).parent().parent().children("td:eq(2)").text();
            vcliente= $(this).parent().parent().children("td:eq(3)").text();
             vmodelo= $(this).parent().parent().children("td:eq(4)").text();
            vserial= $(this).parent().parent().children("td:eq(5)").text();
           
            vplaca= $(this).parent().parent().children("td:eq(6)").text();
            vdfis= $(this).parent().parent().children("td:eq(7)").text();

          
            $("#xcodigo").val(vcodigo);
            $("#xdispositivo1").val(vdispositivo);
            $("#xmarca1").val(vmarca);
            $("#xcliente1").val(vcliente);
            $("#xmodelo").val(vmodelo);
            $("#xserial").val(vserial);
            $("#xplaca").val(vplaca);
            $("#xdtefisco").val(vdfis);
   
            


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
          
            "ajax": '<?php echo base_url('CequipoCliente/listar') ?>',
            "columns": [
                {"data": "cons"},
                {"data": "DISPOSITIVO"},
                {"data": "MARCA"},
                {"data": "CLINETE"},
                {"data": "modelo"},
                {"data": "serial"},
                {"data": "placa"},
                {"data": "detallesFisicos"},
                {"data": "id_cliente"},
                {"defaultContent": "<button  type=\"submit\" id=\"btneditar\" class=\"btn btn-success \"  data-toggle=\"modal\" data-target=\"#frmupdate\"><span class=\"glyphicon glyphicon-pencil\"></span>E</button> <button class='btn btn-danger' id=\"btneliminar\" type='button'><span class=\"glyphicon glyphicon-trash \"></span>X</button>"
                }


            ]

        });


    }

    function guardar() {
        event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('CequipoCliente/guardar') ?>",
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


                    $("#frmregistro").reset();
                    $("#msj").css("background-color", "#82E0AA");


                }

            }
        });

        mostrardatos();
    }


    function actualizar() {
        event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('Cequipocliente/actualizar') ?>",
            type: "POST",
            data: $("#frmupdatex").serialize(),
            success: function (respuesta) {
                alert(respuesta);
                mostrardatos();
                $("#frmupdate").reset();


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
                            url: "<?php echo base_url('CequipoCliente/eliminar') ?>",
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
    
    
    
    
    
//    Listado de los selects
    
       $(document).ready(function () {


        $("#cliente").select2({
            id: function (data) {
                return data.num_cedula
            },
            allowClear: true,
            placeholder: "Digite numero de cedula.",
            ajax: {
                url: "http://localhost/demosots/cot/listcmbClient",
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
        
        
         $("#marca").select2({
            id: function (data) {
                return data.num_cedula
            },
            allowClear: true,
            placeholder: "Seleccione la marca del equipo.",
            ajax: {
                url: "http://localhost/demosots/CequipoCliente/cmbMarca",
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
        $("#dispositivo").select2({
            id: function (data) {
                return data.num_cedula
            },
            allowClear: true,
            placeholder: "Seleccione el tipo de dispositivo de equipo.",
            ajax: {
                url: "http://localhost/demosots/CequipoCliente/cmbDsp",
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
        
        
        
        
//        selects para actualizar

        $("#xcliente").select2({
            id: function (data) {
                return data.num_cedula
            },
            allowClear: true,
            placeholder: "Digite numero de cedula.",
            ajax: {
                url: "http://localhost/demosots/cot/listcmbClient",
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
        
        
         $("#xmarca").select2({
            id: function (data) {
                return data.num_cedula
            },
            allowClear: true,
            placeholder: "Seleccione la marca del equipo.",
            ajax: {
                url: "http://localhost/demosots/CequipoCliente/cmbMarca",
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
        $("#xdispositivo").select2({
            id: function (data) {
                return data.num_cedula
            },
            allowClear: true,
            placeholder: "Seleccione el tipo de dispositivo de equipo.",
            ajax: {
                url: "http://localhost/demosots/CequipoCliente/cmbDsp",
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
        










   
 

    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</script>



