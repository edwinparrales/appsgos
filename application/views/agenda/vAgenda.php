<div class="container-fluid">
    <section class="contenido">
        <button class="btn btn-primary"  data-toggle="modal" data-target="#modalregistro"><span class="glyphicon glyphicon-plus"></span>Agendar</button>
        <div class="col-lg-12 col-lg-offset-0" id="regagenda"><br>

            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                <thead class="text-capitalize">
                <th>Codigo</th>
                <th>Fecha Registro</th>
                <th>Codigo OT</th>
                <th>Codigo Profesional</th>
                <th>Observaciones</th>
                <th>Estado</th>
                <th>Prioridad</th>
                <th>Informacion OT</th>
                <th>Informacion Profesional</th>
                <th>Informacion Cliente</th>
                <th>Operaciones</th>

                </thead>
                <tfoot>
                <th>Codigo</th>
                <th>Fecha Registro</th>
                <th>Codigo OT</th>
                <th>Codigo Profesional</th>
                <th>Observaciones</th>
                <th>Estado Agenda</th>
                <th>Prioridad</th>
                <th>Informacion OT</th>
                <th>Informacin Profesional</th>
                <th>Informacion Cliente</th>
                <th>Operaciones</th>

                </tfoot>

            </table>

        </div>
    </section>

    <!-- Modal Agendar profesional -->
    <div id="modalregistro" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header center-block">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registro Agenda Profesionales</h4>
                </div>
                <div class="modal-body">
                   
                   

                    <form method="POST" action="" class="form-group" id="frmagendapro" >
                     
                            <form id="frmagendapro">
                             <div class="warning" id="msjp" style=" font-weight:bold"></div>
                               <div class="form-group">
                                    <label> Codigo Orden de trabajo</label>
                                    <div>
                                    <select class="select2-chosen" id="pot" name="pot"></select>
                                    </div>
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
                                <button id="btnguardar" class="btn btn-info">Guardar</button>
                                        
                            </div>



                        </form>
                        
                        
                        
                        
                        
                        
                       
                    </form>

                </div>

                <br>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>

    <!-- Modal editar agenda -->
    <div id="frmupdateEmple" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Agenda</h4>
                </div>
                <div class="modal-body">

                    <form method="post" action="" class="form-group"  id="frmupdate">
                        <div class="warning" id="msjx" style=" font-weight:bold"> </div>
                        <div class="form-group">
                            <label> Codigo agenda:</label>
                            <input class="form-control" id="idagenda" name="idagenda" readonly="true"> 
                            
                        </div>

                        <div class="form-group">
                            <label> Codigo Orden de trabajo</label>
                            <div>
                                <select class="select2-chosen" id="potx" name="potx"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Profesional</label>
                            <div>
                                <select id="selectprox" class="" name="selectprox"></select>
                            </div>


                        </div>
                        <div class="form-group">
                            <label>Observaciones</label>
                            <textarea placeholder="Observacionesx" class="form-control" name="observacionesx" id="observacionesx"></textarea>

                        </div>
                        <div class="form-group">
                            <label>Estado Actual de la Agenda</label>
                            <select id="estAgenda" name="estAgenda" class="form-control">
                                <option value="ABIERTO">ABIERTO</option>
                                 <option value="CERRADO">CERRADO</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Priorida</label>
                            <div >
                                <select name="selectprioridadx" id="selectprioridadx" class="select2-chosen"></select>
                            </div>

                        </div>
                        <div>
                            <button id="btnupdate" class="btn btn-info">Actualizar</button>

                        </div>






                       

                    </form>

                </div>

                <br>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>

</div>
<script>
   
    $(document).ready(function () {
        mostrardatos();
        $('.modal').on('hidden.bs.modal', function(){ 
		
	
                  $("#msjp").html(" ");
                  $("#msjp").css("background-color", false);
                   $("#msjx").html(" ");
                  $("#msjx").css("background-color", false);
                  $("#frmagendapro").reset();
                   $("#frmupdate").reset();
                   $("#selectpro").reset()
	});
        
     
    
      $("body").on("click", "#regagenda a", function (event) {
           event.preventDefault();
            //vcodigo = $(this).attr("href");
            vcodigo = $(this).parent().parent().children("td:eq(0)").text();
            vobs = $(this).parent().parent().children("td:eq(4)").text();
           


            $("#idagenda").val(vcodigo);
             $("#observacionesx").val(vobs);
          

        });
      
      $("#btnupdate").click(actualizar);
      $("#btnguardar").click(guardar);


        $("body").on("click", "#regagenda button", function (event) {

            vcodigo = $(this).parent().parent().children("td:eq(0)").text();
            eliminar(vcodigo);

        });
      
    });








    function actualizar() {
        
        event.preventDefault();
        
        $.ajax({
            url: "<?php echo base_url('Cagenda/actualizar') ?>",
            type: "POST",
            data: $("#frmupdate").serialize(),
            success:function(respuesta){
                alert(respuesta);

            },
                    error:function (data){
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
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "<?php echo base_url('Cagenda/eliminar') ?>",
                            type: "POST",
                            data: {id: vcodigo},
                            success: function (respuesta) {
                                if(respuesta=="exito"){
                                    swal("El registro fue eliminado","Aceptar","success");
                                        mostrardatos();

                                }else{
                                    
                                    alert("Error !No se puede eliminar el registro¡");
                                        mostrardatos();
                                }

                            }
                        });

                    } else {
                        swal("Operación Cancelada",
                                "El registro no sera eliminado",
                                "error");
                    }
                });
                
                
                mostrardatos();

                
    

    }



    function mostrardatos() {
        $("#example").dataTable().fnDestroy();
        $('#example').DataTable({
            
          
        
            "ajax": '<?php echo base_url('Cagenda/listar') ?>',
           
             
            "columns": [
                {"data": "cons"},
                {"data": "fecha_reg"},
                {"data": "id_ot"},
                {"data": "id_pro"},
                {"data": "observaciones"},
                {"data": "estado_act"},
                {"data": "prioridad"},
                {"data": "OT"},
                {"data": "PROFESIONAL"},
                {"data": "CLIENTE"},
                {"defaultContent": "<a  id=\"xxx\" class=\"btn btn-success\"  data-toggle=\"modal\" data-target=\"#frmupdateEmple\"><span class=\"glyphicon glyphicon-pencil\"></span>E</a> <button class='btn btn-danger' id=\"btneliminar\" type='button'><span class=\"glyphicon glyphicon-trash \"></span>X</button>"
                }


            ],
             "scrollX": true
           
             
         

        });


    }
    
    //Selectores para seleccionar profesionales en la agenda 
    
      $("#selectpro").select2({
            id: function (data) {
                return data.id;
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
        
        //    metodo select equipo cliente
        $("#pot").select2({
            id: function (data) {
                return data.id
            },
            allowClear: true,
            placeholder: "Digite el codigo de la OT",
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
        
    
     //    metodo select equipo cliente
        $("#potx").select2({
            id: function (data) {
                return data.id
            },
            allowClear: true,
            placeholder: "Digite el codigo de la OT",
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
    
    
     //Selectores para seleccionar profesionales en la agenda 
    
      $("#selectprox").select2({
            id: function (data) {
                return data.id;
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //modal para relacionar orden  de trabajo con profesional
function guardar(){
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


                    $("#frmagendapro").reset();
                    $("#msjp").css("background-color", "#82E0AA");


                }

            }
        });

        mostrardatos();
}
    
    

</script>
<script type="text/javascript">

      var data = [{id: 'NORMAL', text: 'NORMAL'}, {id: 'MEDIA', text: 'MEDIA'}, {id: 'ALTA', text: 'ALTA'}];

    $("#selectprioridadx").select2({
        allowClear: true,
        placeholder: "Seleccione prioridad",
        data: data
    });
     $("#selectprioridad").select2({
        allowClear: true,
        placeholder: "Seleccione prioridad",
        data: data
    });

</script>

