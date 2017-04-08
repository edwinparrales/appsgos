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
                                <div class="panel-heading">Registrar Relacion Equipo - Orden de trabajo</div>
                                <div class="panel-body" >
                                    <div class="warning" id="msj" style=" font-weight:bold"></div>      
                                    <form class="" id="frmmodaleqcliente">
                                        <div class="warning" id="msj" style=" font-weight:bold"></div> 
                                          <div class="form-group">
                                            <label> Codigo Orden de trabajo</label>
                                            <select class="form-control" id="ot" name="ot"></select>
                                        </div>

                                        <div class="form-group">
                                            <label> Codigo Equipo Cliente</label>
                                            <div class="form-group">
                                                <select id="eq" class="form-control" name="eq"></select>
                                            </div>


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


                </div>


                <div class="tab-pane " id="tab2">

                    <div class="col-lg-12" id="listar"><br>
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead class="text-capitalize">
                            <th>Codigo</th>
                            <th>Codigo Equipo</th>
                            <th>Codigo Ot</th>
                            <th>Observaciones</th>
                            <th>Equipos</th>
                            <th>Ot</th>
                            <th>Operaciones</th>
                            </thead>
                            <tfoot>
                            <th>Codigo</th>
                            <th>Codigo Equipo</th>
                            <th>Codigo Ot</th>
                            <th>Observaciones</th>
                            <th>Equipos</th>
                            <th>Ot</th>
                            <th>Operaciones</th>
                            </tfoot>


                        </table>


                    </div>


                </div>

            </div>

        </div>
</div>

</section>

    <!--    Modal editar Detalle orden de trabajo Equipo Cliente-->

    <div id="frmupdate" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-success">
                        <div class="panel-heading">Modificar Relacion Ot Equipo Cliente</div>
                        <div class="warning" id="msjx" style=" font-weight:bold"></div> 
                        <form id="frmupdatex">
                            <div class="form-group">
                                <label>Codigo Detalle orden de trabajo equipo</label>
                                <input class="form-control" id="codigo_detotEquipo" readonly="true" name="codigo_detotEquipo">

                            </div>

                            <div class="form-group">
                                <label> Codigo Orden de trabajo</label>
                                <div>
                                    <select class="select2-chosen" id="ot2" name="ot2"></select>
                                </div>
                            </div>
                                <div class="form-group">
                                <label> Codigo Equipo Cliente</label>
                                <div class="form-group">
                                    <select id="eq2" class="form-control" name="eq2"></select>
                                </div>


                            </div>
                            <div class="form-group">
                                <label> Observaciones </label>
                                <textarea class="form-control" id="obser2" name="obser2" placeholder=" Observaciones"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-info" id="btnupdate">Guardar</button>
                            </div>




                        </form>

                       



                        <div class="panel-body" >




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
    $("#btnguardar-eq").click(guardar);

        $("#btnupdate").click(actualizar);



        $("body").on("click", "#listar #btneditar", function () {
            vcodigo=$(this).parent().parent().children("td:eq(0)").text();
            vcodEquipo=$(this).parent().parent().children("td:eq(1)").text();
            vcodOt=$(this).parent().parent().children("td:eq(2)").text();
            vobs=$(this).parent().parent().children("td:eq(3)").text();
            $("#codigo_detotEquipo").val(vcodigo);
            $("#ot2").val(vcodOt);
             $("#obser2").val(vobs);
            

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
    
    
    //selector dependiente de la ot
    
    $("#ot").change(function(){
           idot=$('select[id=ot]').val();
             selectEqOt(idot)

	});
        
        
          $("#ot2").change(function(){
           idot=$('select[id=ot2]').val();
              selectEqOt2(idot);

	});

    function mostrardatos() {
        $("#example").dataTable().fnDestroy();
        $('#example').DataTable({
          
            "ajax": '<?php echo base_url('CotEquipo/listar') ?>',
            "columns": [
                {"data": "cons"},
                {"data": "id_equipo"},
                {"data": "id_ot"},
                {"data": "Observaciones"},
                {"data": "EQUIPOS"},
                {"data": "OT"},
                {"defaultContent": "<button  type=\"submit\" id=\"btneditar\" class=\"btn btn-success \"  data-toggle=\"modal\" data-target=\"#frmupdate\"><span class=\"glyphicon glyphicon-pencil\"></span>E</button> <button class='btn btn-danger' id=\"btneliminar\" type='button'><span class=\"glyphicon glyphicon-trash \"></span>X</button>"
                }


            ]

        });


    }

 
 
 
 
// metodo para guardar registros
function guardar() {

        event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('CotEquipo/guardar') ?>",
            type: "post",
            data: $("#frmmodaleqcliente").serialize(),
            success: function (respuesta) {


                $("#msj").html(respuesta);
                $("#msj").css("background-color", "#D1A6AC");

                if (respuesta == "Registro Guardado") {
                    jQuery.fn.reset = function () {
                        $(this).each(function () {
                            this.reset();
                        });
                    };


                    $("#frmmodaleqcliente").reset();
                    $("#msj").css("background-color", "#82E0AA");


                }

            }
        });

        mostrardatos();

    }

 
 
 


    function actualizar() {
        event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('CotEquipo/actualizar') ?>",
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
                            url: "<?php echo base_url('CotEquipo/eliminar') ?>",
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
    
    
    
    //    metodo select equipo cliente
        $("#ot").select2({
            id: function (data) {
                return data.id
            },
            allowClear: true,
            placeholder: "Digite el codigo de la OT.",
            ajax: {
                url: "http://localhost/demosots/CotEquipo/listOtcmb",
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
        
    
    
    
    


//         $("#eq").select2({
//            id: function (data) {
//                return data.id
//            },
//            allowClear: true,
//            placeholder: "Digite el codigo cliente y serial del equipo.",
//            ajax: {
//                url: "http://localhost/demosots/cot/listcmbEquipos2",
//                dataType: 'json',
//                delay: 250,
//                data: function (params) {
//                    return {
//                        q: params.term, // search term
//                        page: params.page
//                    };
//                },
//                processResults: function (data, params) {
//                    // parse the results into the format expected by Select2
//                    // since we are using custom formatting functions we do not need to
//                    // alter the remote JSON data, except to indicate that infinite
//                    // scrolling can be used
//                    params.page = params.page || 1;
//
//                    return {
//                        results: data
//
//                    };
//                },
//                cache: true,
//                minimumInputLength: 1
//            }
//
//
//        });


 //    metodo select para las ordenes de trabajo

   
        $("#ot2").select2({
            id: function (data) {
                return data.id
            },
            allowClear: true,
            placeholder: "Digite el codigo de la OT.",
            ajax: {
                url: "http://localhost/demosots/CotEquipo/listOtcmb",
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
        
//        $("#eq2").select2({
//            id: function (data) {
//                return data.id
//            },
//            allowClear: true,
//            placeholder: "Digite el codigo cliente y serial del equipo.",
//            ajax: {
//                url: "http://localhost/demosots/cot/listcmbEquipos2",
//                dataType: 'json',
//                delay: 250,
//                data: function (params) {
//                    return {
//                        q: params.term, // search term
//                        page: params.page
//                    };
//                },
//                processResults: function (data, params) {
//                    // parse the results into the format expected by Select2
//                    // since we are using custom formatting functions we do not need to
//                    // alter the remote JSON data, except to indicate that infinite
//                    // scrolling can be used
//                    params.page = params.page || 1;
//
//                    return {
//                        results: data
//
//                    };
//                },
//                cache: true,
//                minimumInputLength: 1
//            }
//
//
//        });



    
    
//    //    metodo select equipo cliente
//
    function selectEqOt(idot) {
        $("#eq").select2({
            id: function (data) {
                return data.id
            },
            allowClear: true,
            placeholder: "Digite el codigo cliente y serial del equipo.",
            ajax: {
                url: "http://localhost/demosots/CotEquipo/cmbeqot/"+idot,
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
    
    
    
    //seleccio dependiente segun la ot
    
        function selectEqOt2(idot) {
        $("#eq2").select2({
            id: function (data) {
                return data.id
            },
            allowClear: true,
            placeholder: "Digite el codigo cliente y serial del equipo.",
            ajax: {
                url: "http://localhost/demosots/CotEquipo/cmbeqot/"+idot,
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





