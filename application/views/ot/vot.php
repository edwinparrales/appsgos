<div class="container-fluid">
    <section class="contenido">

        <div class="row">
            <ul class="nav nav-tabs success">
                <li class="active "><a id="tab-consultar" href="#tab1" data-toggle="tab"  style="color: #1B2631">Registrar Orden de Trabajo</a></li>
                <li><a href="#tab2" data-toggle="tab" style="color: #1B2631">Consultar Orden de Trabajo</a></li>

            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3 class="panel-title">Registro de orden de trabajo</h3></div>
                                    <div class="panel-body" >
                                        <h3 class="panel-title">Datos de la orden</h3><hr>
                                        <form method="POST"  id="frmregistrar">
                                            <div class="warning" id="msj" style=" font-weight:bold"></div>                   



                                            <div class="form-group">
                                                <label for="cliente">Cliente:</label>
                                                <select class="js-example-basic-single form-control" name="id_cliente" id="id_cliente">
                                                    <option></option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="Solicitud">Solicitud:</label>
                                                <textarea class="form-control" id="solicitud" name="solicitud" placeholder="Solicitud"></textarea>                                   
                                            </div>
                                            <div class="form-group">
                                                <input type="text" value="<?php echo $this->session->userdata('usuario'); ?>" id="usuario" name="usuario" hidden="true">
                                            </div>


                                            <div class="form-group">
                                                <button id="btnguardar" type="submit" class="btn btn-default btn-primary">Registrar</button>
                                            </div>




                                        </form>



                                    </div>
                                </div>

                            </div>
                    </fieldset>



                </div>


                <div class="tab-pane " id="tab2">
                    <br>
                         <div class="form-group form-horizontal col-lg-4">
                             <input required="true" class="form-control" name="txtbuscar" id="txtbuscar" placeholder="Ingrese numero de ot a buscar" type="number"><button id="btnbuscarzz" name="btnbuscarzz" class="btn btn-default">Buscar</button>
                             <button id="btnreset" name="btnreset" class="btn btn-default">Reset</button>
                        </div>
                        <br>
                    <div class="col-lg-12" id="datatable"><br>
                   
                        
                        
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead class="text-capitalize">
                            <th>Codigo</th>
                            <th>Fecha</th>
                            <th>Informacion Cliente</th>
                            <th>Solicitud</th>
                            <th>Estado de la orden</th>
                            <th>Fecha entrega</th>
                            <th>Usuario</th>
                            <th>Codigo Cliente</th>
                            <th>Operaciones</th>

                            </thead>
                            <tfoot>
                            <th>Codigo</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Solicitud</th>
                            <th>Estado de la orden</th>
                            <th>Fecha entrega</th>
                            <th>Usuario</th>
                            <th>Informacion Cliente</th>
                            <th>Operaciones</th>

                            </tfoot>


                        </table>


                    </div>

                </div>

            </div>

        </div>

        <!--            ventana modal editar orden de trabajo-->

        <div id="modalupdate" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Orden de trabajo</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel panel-success">
                            <div class="panel-heading"><h3 class="panel-title">Modificar Orden de Trabajo</h3></div>

                            <div class="panel-body" >

                                <form method="POST" action="" id="frmupdate">

                                    <div class="warning" id="msj" style=" font-weight:bold"></div> 
                                    <div class="form-group">
                                        <label>Codigo:</label>
                                        <input class="form-control" id="xcodigo" name="xcodigo" readonly="true">
                                    </div>


                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="cliente">Cliente:</label>
                                            <input class="form-control" id="xcliente1" name="xcliente1" readonly="true" placeholder="Cliente actual">
                                        </div>
                                        <div class="form-group">
                                            <select class="select2-chosen" name="xid_cliente" id="xid_cliente"></select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Solicitud">Solicitud:</label>
                                        <textarea class="form-control" id="xsolicitud" name="xsolicitud" placeholder="Solicitud"></textarea>    
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Estado Orden:</label>
                                            <input class="form-control" id="xestado1" name="xestado1" readonly="true">
                                        </div>
                                        <div>
                                            <input class="select2-choices" id="xestado" type="text" name="xestado">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Usuario:</label>
                                        <input class="form-control" id="xusuario" type="text" name="xusuario">
                                    </div>

                                    <div class="form-group">
                                        <label for="Solicitud">Fecha Entrega:</label>
                                        <input class="form-control" type="date" id="xfecha_entrega" name="xfecha_entrega">
                                    </div>

                                    <div class="form-group">
                                        <button id="btnupdate" type="submit" class="btn btn-success">Actualizar</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--ventana modal relacionar equipos cliente-->


        <div id="modalequipo" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Relacionar Orden Equipo Cliente</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" id="infocliente" name="infocliente">

                        </div>

                        <form class="" id="frmmodaleqcliente">
                            <div class="warning" id="msjx" style=" font-weight:bold"></div> 

                            <div class="form-group">
                                <label> Codigo Equipo Cliente</label>
                                <div>
                                    <select id="eq" class="select2-chosen" name="eq"></select>
                                </div>


                            </div>
                            <div class="form-group">
                                <label> Codigo Orden de trabajo</label>
                                <input class="form-control" id="ot" name="ot" readonly="true">
                            </div>
                            <div class="form-group">
                                <label> Observaciones </label>
                                <textarea class="form-control" id="obser" name="obser" placeholder=" Observaciones"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-info" id="btnguardar-eq">Guardar</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>


        <!--ventana modal relacionar profesional-->


        <div id="modalprof" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agendar orden a profesional</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmagendapro">
                             <div class="warning" id="msjp" style=" font-weight:bold"></div>
                            <div class="form-group">
                                <label> Codigo Orden de trabajo</label>
                                <input id="pot" name="pot"class="form-control" type="text" placeholder="Orden de trabajo">

                            </div>
                            <div class="form-group">
                                <label> Profesional</label>
                                <div>
                                    <select id="selectpro" class="select2-chosen" name="selectpro"></select>
                                </div>
                                

                            </div>
                            <div class="form-group">
                                <label>Observaciones</label>
                                <textarea placeholder="Observaciones" class="form-control" name="observaciones" id="observaciones"></textarea>

                            </div>
                             <div class="form-group">
                                <label>Priorida</label>
                                <div >
                                    <select name="selectprioridad" id="selectprioridad" class="select2-chosen"></select>
                                </div>

                            </div>
                            <div>
                                <button id="btnrprof" class="btn btn-info">Guardar</button>
                                        
                            </div>



                        </form>


                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

<script type="text/javascript">

    $(document).ready(function () {
        mostrardatos();
        $('.modal').on('hidden.bs.modal', function () {
            $("#frmagendapro").reset();
             
            $("#msjx").html(" ");
            $("#msjx").css("background-color", false);
            $("#msjp").css("background-color", false);
            $("#msjp").html(" ");
            
        });




        $("#btnguardar").click(guardar);

        $("#btnupdate").click(actualizar);
        $("#btnguardar-eq").click(guardarEqot);
        $("#btnrprof").click(guardarRprof);


        $("body").on("click", "#datatable #btneditar", function () {
            vcodigo = $(this).parent().parent().children("td:eq(0)").text();
            vfecha = $(this).parent().parent().children("td:eq(1)").text();
            vcliente = $(this).parent().parent().children("td:eq(2)").text();
            vsolicitud = $(this).parent().parent().children("td:eq(3)").text();
            vestadopro = $(this).parent().parent().children("td:eq(4)").text();
            vfechaEntrega = $(this).parent().parent().children("td:eq(5)").text();
            vusuario = $(this).parent().parent().children("td:eq(6)").text();
            $("#xcodigo").val(vcodigo);
            $("#xfecha").val(vfecha);
            $("#xcliente1").val(" Cliente actual:" + vcliente);
            $("#xsolicitud").val(vsolicitud);
            $("#xestado1").val(" Estado actual:" + vestadopro);
            $("#xfechaEntrega").val(vfechaEntrega);
            $("#xusuario").val(vusuario);




        });


        $("body").on("click", "#datatable #btneliminar", function () {
            vcodigo = $(this).parent().parent().children("td:eq(0)").text();
            eliminar(vcodigo);

        });
        $("body").on("click", "#datatable #btnequipos", function () {
            vcodigo = $(this).parent().parent().children("td:eq(0)").text();
            $("#ot").val(vcodigo);
            $("#infocliente").val($(this).parent().parent().children("td:eq(2)").text());
            selectEq($(this).parent().parent().children("td:eq(7)").text());

        });
               $("body").on("click", "#datatable #btnprofesional", function () {
            vcodigo = $(this).parent().parent().children("td:eq(0)").text();
            $("#pot").val(vcodigo);
            

        });



        $("body").on("click", "#tab-consultar", function () {
            $("#msj").html(" ");

            $("#msj").css("background-color", false);

            $("#xcodigo").val(" ");

        });
        
        //metodo para realizar busquedas por numero de orden***************************
        
          $("body").on("click", "#btnbuscarzz", function () {
           idot=document.getElementById("txtbuscar").value;
             buscarOt(idot);

        });
        
           $("body").on("click", "#btnreset", function () {
             $("#example").dataTable().fnDestroy();
             $("#txtbuscar").val("");
              mostrardatos();

        });
        
        //****************************************************************************


    });



    function guardar() {
        event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('Cot/guardar') ?>",
            type: "post",
            data: $("#frmregistrar").serialize(),
            success: function (respuesta) {


                $("#msj").html(respuesta);
                $("#msj").css("background-color", "#D1A6AC");

                if (respuesta == "Registro Guardado") {
                    jQuery.fn.reset = function () {
                        $(this).each(function () {
                            this.reset();
                        });
                    };


                    $("#frmregistrar").reset();
                    $("#msj").css("background-color", "#82E0AA");


                }

            }
        });

        mostrardatos();

    }



//       Metodo para mostrar los datos en la tabla  

    function mostrardatos() {
        $("#example").dataTable().fnDestroy();
        
           // Setup - add a text input to each footer cell
//    $('#example tfoot th').each( function () {
//        var title = $(this).text();
//        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
//    } );
    
   
   

        $('#example').DataTable({
//             fixedColumns: true,
//             fixedHeader: true,
             dom: 'Bfrtip',
             buttons: [
             'csv', 'excel', 'pdf', 'print'
             ],
              "scrollY":        "300px",
              "scrollCollapse": true,
              "paging":         false,
  
            "scrollX": true,
   
            "ajax": '<?php echo base_url('cot/listar') ?>',
            "columns": [
                {"data": "cons_ot"},
                {"data": "fecha"},
                {"data": "cliente"},
                {"data": "solicitud"},
                {"data": "estado_proce"},
                {"data": "fecha_entrega"},
                {"data": "usuario"},
                {"data": "id_cliente"},
                {"defaultContent": "<button  type=\"submit\" id=\"btneditar\" class=\"btn btn-success\"  data-toggle=\"modal\" data-target=\"#modalupdate\"><span class=\"glyphicon glyphicon-edit\"></span>E</button><button class='btn btn-danger' id=\"btneliminar\" type='button'><span class=\"glyphicon glyphicon-trash \"></span>X</button>\n\
                 <button  type=\"submit\" id=\"btnequipos\" class=\"btn btn-default\"  data-toggle=\"modal\" data-target=\"#modalequipo\"><span class=\"glyphicon glyphicon-plus\"></span>C</button>\n\
                 <button  type=\"submit\" id=\"btnprofesional\" class=\"btn btn-info\"  data-toggle=\"modal\" data-target=\"#modalprof\"><span class=\"glyphicon glyphicon-user\"></span>P</button>"




                }


            ]
    
            

        });
//        
//          var table = $('#example').DataTable();
//        
//                         // Apply the search
//        table.columns().every( function () {
//        var that = this;
// 
//        $( 'input', this.footer() ).on( 'keyup change', function () {
//            if ( that.search() !== this.value ) {
//                that
//                    .search( this.value )
//                    .draw();
//            }
//        } );
//    } );
//        
        


    }



    function actualizar() {

        event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('Cot/actualizar') ?>",
            type: "POST",
            data: $("#frmupdate").serialize(),
            success: function (respuesta) {
                if(respuesta=="Registro Actualizado"){
                    alert("El registro fue actualizado");
                    
                }else{
                    alert(respuesta);
                    
                }
                

            },
            error: function (data) {
                alert(data);
            }

        });

        mostrardatos();

    }


    //    metodo para eliminar registro
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
                            url: "<?php echo base_url('Cot/eliminar') ?>",
                            type: "POST",
                            data: {id: vcodigo},
                            success: function (respuesta) {
                                if (respuesta == "Registro Eliminado") {
                                    swal("El registro fue eliminado", "Aceptar", "success");

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



//    Metodo para seleccionar los clientes

    $(document).ready(function () {


        $(".js-example-basic-single").select2({
            id: function (data) {
                return data.num_cedula;
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


        $("#xid_cliente").select2({
            id: function (data) {
                return data.num_cedula;
            },
            allowClear: true,
            placeholder: "Digite el codigo o el nombre del cliente.",
            ajax: {
                url: "http://localhost/demosots/cot/listcmbClient2",
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



//    metodo select equipo cliente

    function selectEq(idcliente) {
        $("#eq").select2({
            id: function (data) {
                return data.id
            },
            allowClear: true,
            placeholder: "Digite el codigo cliente y serial del equipo.",
            ajax: {
                url: "http://localhost/demosots/cot/listcmbEquipos/"+idcliente,
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

    }
    
     $("#selectpro").select2({
            id: function (data) {
                return data.num_cedula;
            },
            allowClear: true,
            placeholder: "Digite numero de cedula o apellido.",
            ajax: {
                url: "http://localhost/demosots/Profesionales/listar2",
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
   


//metodos relacion equeipos clientes con ordenes de trabajo

    function guardarEqot() {

        event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('CotEquipo/guardar') ?>",
            type: "post",
            data: $("#frmmodaleqcliente").serialize(),
            success: function (respuesta) {


                $("#msjx").html(respuesta);
                $("#msjx").css("background-color", "#D1A6AC");

                if (respuesta == "Registro Guardado") {
                    jQuery.fn.reset = function () {
                        $(this).each(function () {
                            this.reset();
                        });
                    };


                    $("#frmmodaleqcliente").reset();
                    $("#msjx").css("background-color", "#82E0AA");


                }

            }
        });

        mostrardatos();

    }



//modal para relacionar orden  de trabajo con profesional
function guardarRprof(){
event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('Cagenda/guardar') ?>",
            type: "post",
            data: $("#frmagendapro").serialize(),
            success: function (respuesta) {


                $("#msjp").html(respuesta);
                $("#msjp").css("background-color", "#D1A6AC");

                if (respuesta == "Registro Guardado") {
                    jQuery.fn.reset = function () {
                        $(this).each(function () {
                            this.reset();
                        });
                    };


                    $("#frmmodaleqcliente").reset();
                    $("#msjp").css("background-color", "#82E0AA");


                }

            }
        });

        mostrardatos();
}

//mostrar datos segun parametros




   function buscarOt(idot) {
     if(!idot==""){
        $("#example").dataTable().fnDestroy();

        $('#example').DataTable({
//             fixedColumns: true,
//             fixedHeader: true,
             dom: 'Bfrtip',
             buttons: [
             'csv', 'excel', 'pdf', 'print'
             ],
              "scrollY":        "300px",
              "scrollCollapse": true,
              "paging":         false,
  
            "scrollX": true,
             
            "ajax": '<?php echo base_url('cot/buscar/')?>'+idot,
          
            
            "columns": [
                {"data": "cons_ot"},
                {"data": "fecha"},
                {"data": "cliente"},
                {"data": "solicitud"},
                {"data": "estado_proce"},
                {"data": "fecha_entrega"},
                {"data": "usuario"},
                {"data": "id_cliente"},
                {"defaultContent": "<button  type=\"submit\" id=\"btneditar\" class=\"btn btn-success\"  data-toggle=\"modal\" data-target=\"#modalupdate\"><span class=\"glyphicon glyphicon-edit\"></span>E</button><button class='btn btn-danger' id=\"btneliminar\" type='button'><span class=\"glyphicon glyphicon-trash \"></span>X</button>\n\
                 <button  type=\"submit\" id=\"btnequipos\" class=\"btn btn-default\"  data-toggle=\"modal\" data-target=\"#modalequipo\"><span class=\"glyphicon glyphicon-plus\"></span>C</button>\n\
                 <button  type=\"submit\" id=\"btnprofesional\" class=\"btn btn-info\"  data-toggle=\"modal\" data-target=\"#modalprof\"><span class=\"glyphicon glyphicon-user\"></span>P</button>"




                }


            ]
    
    

        });
//        
//          var table = $('#example').DataTable();
//        
//                         // Apply the search
//        table.columns().every( function () {
//        var that = this;
// 
//        $( 'input', this.footer() ).on( 'keyup change', function () {
//            if ( that.search() !== this.value ) {
//                that
//                    .search( this.value )
//                    .draw();
//            }
//        } );
//    } );
//        
        
          }else{
                 alert(" El campo numero de orden no puede estar vacio ");
               }

    }



</script>

<script type="text/javascript">
    var data = [{id: 'REGISTRADO', text: 'REGISTRADO'}, {id: 'PROCESO', text: 'PROCESO'}, {id: 'FINALIZADO', text: 'FINALIZADO'}];

    $("#xestado").select2({
        allowClear: true,
        placeholder: "Seleccione estado",
        data: data
    });
      var data = [{id: 'NORMAL', text: 'NORMAL'}, {id: 'MEDIA', text: 'MEDIA'}, {id: 'ALTA', text: 'ALTA'}];

    $("#selectprioridad").select2({
        allowClear: true,
        placeholder: "Seleccione prioridad",
        data: data
    });

</script>


<!--<script src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>-->
<script src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src=" //cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src=" //cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
<!--<script src=" //code.jquery.com/jquery-1.12.4.js"></script>-->

