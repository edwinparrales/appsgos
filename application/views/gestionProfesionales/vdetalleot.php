
<div class="container-fluid">
    <section class="contenido">

        <div class="row">
            <ul class="nav nav-tabs success">
                <li class="active "><a id="tab-consultar" href="#tab1" data-toggle="tab"  >Consultar Agenda</a></li>
                <li><a href="#tab2" data-toggle="tab">Informacion Solucion OT</a></li>
            </ul>

            <div class="tab-content" id="tabs">
                <div class="tab-pane active" id="tab1">

                    <div class="col-lg-12" id="listaAgenda"><br>
                        <table id="tablaAgenda" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead class="text-capitalize">
                            <th>Codigo Agenda</th>
                            <th>Fecha Registro</th>
                            <th>Codigo ot</th>
                            <th>Codigo profesional</th>
                            <th>Observaciones</th>
                            <th>Estado Actividad</th>
                            <th>Prioridad</th>
                            <th>Informacion OT</th>
                            <th>Informacion Equipo</th>
                            <th>Informacion Especialista</th>
                            <th>Operaciones</th>
                            </thead>
                            <tfoot>
                            <th>Codigo Agenda</th>
                            <th>Fecha Registro</th>
                            <th>Codigo ot</th>
                            <th>Codigo proveedor</th>
                            <th>Observaciones</th>
                            <th>Estado Actividad</th>
                            <th>Prioridad</th>
                            <th>Informacion OT</th>
                            <th>Informacion Equipo</th>
                            <th>Informacion Especialista</th>
                            <th>Operaciones</th>
                            </tfoot>


                        </table>


                    </div>


                </div>


                <div class="tab-pane " id="tab2">
<!--                    <input type="text" id="ot" placeholder="ingresa codigo ot" name="ot">
                    <button id="filtrar">Filtrar</button>
                    <button id="reset">Reset</button>-->
                    <div class="row">
                        
<!--                        TABLA DEL DETALLA DE LA ORDEN DE SERVICIO-->

                     <div class="col-lg-12" id="listatbDetalleOt"><br>
                        <table id="tbDetalleOt" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead class="text-capitalize">
                            <th>Codigo</th>
                            <th>Codigo Ot</th>
                            <th>Codigo Servicio</th>
                            <th>Observaciones</th>
                            <th>Codigo Dispositivo</th>
                            <th>Modelo Dispositivo</th>
                            <th>Codigo Marca</th>
                            <th>Seriales</th>
                            <th>Capacidad</th>
                            <th>Valor Dispositivo</th>
                            <th>Codigo Proveedor</th>
                            <th>Numero Factura</th>
                            <th>Equipo Cliente</th>
                            <th>Informacion Proveedor</th>
                            <th>Informacion Dispositivo</th>
                            <th>Marca</th>
                            <th>Servicios</th>
                            <th>Informacion Ot</th>
                            <th>Valor</th>
                             <th>Operaciones</th>
                            </thead>
                            <tfoot>
                            <th>Codigo</th>
                            <th>Codigo Ot</th>
                            <th>Codigo Servicio</th>
                            <th>Observaciones</th>
                            <th>Codigo Dispositivo</th>
                            <th>Modelo Dispositivo</th>
                            <th>Codigo Marca</th>
                            <th>Seriales</th>
                            <th>Capacidad</th>
                            <th>Valor Dispositivo</th>
                            <th>Codigo Proveedor</th>
                            <th>Numero Factura</th>
                            <th>Equipo Cliente</th>
                            <th>Informacion Proveedor</th>
                            <th>Informacion Dispositivo</th>
                            <th>Marca</th>
                            <th>Servicios</th>
                            <th>Informacion Ot</th>
                            <th>Valor</th>
                             <th>Operaciones</th>
                            </tfoot>


                        </table>


                    </div>

                        
                       

                    </div>

                </div>


            </div>

        </div>

        <!--        Ventana modal para el registro de detalle ot-->

        <!-- Modal -->
        <div id="modal_detalleot" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Formulario detalle orden de trabajo</h4>
                    </div>
                    <div class="modal-body">
                        <!--          formulario-->
                        <div class="warning" id="msj" style=" font-weight:bold"></div>      
                        <form class="form-horizontal" method="POST" action="" id="frmsolucion">
                            
                            <input type="text"  id="cod_agenda"  name="cod_agenda" hidden="true">
                            
                            
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="marca">Codigo de la OT</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control " id="codot" placeholder="Codigo de la OT" name="codot" readonly="true">

                                    </div>

                                </div>


                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="marca">Informacion Equipo Cliente</label>
                                    <div class="col-lg-8">
                                        <textarea type="text" class="form-control" id="infeqcliente" placeholder="Equipo cliente" name="infeqcliente" readonly="true"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>Informacion Servicios</legend>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="selectSer">Ingrese Servicio</label>
                                    <div class="col-lg-8">
                                        <select class="" id="selectSer" name="idservicio">

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="observaciones">Observaciones</label>
                                    <div class="col-lg-8">
                                        <textarea type="text" class="form-control" id="observaciones" placeholder="Observaciones" name="observaciones"></textarea>
                                    </div>
                                </div>
                                <hr>
                            </fieldset><br>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input  type="checkbox" class="form-check-input" name="chk1"id="chk1" value="1" onchange="javascript:showContent()">
                                    Adicionar repuesto
                                </label>
                            </div>



                            <fieldset id="infrep" style="display: none">
                                <legend class="">Informacion Repuesto</legend>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="dispositivo">Dispositivo</label>
                                    <div class="col-lg-8">
                                        <select id="dispositivo" class="" name="dispositivo"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="modelo">Modelo</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="modelo" placeholder="Modelo dispositivo" name="modelo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="marca">Marca</label>
                                    <div class="col-lg-8">
                                        <select id="marca" name="marca"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="serial">Num serie(S/N)</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="serial" placeholder="Serial" name="serial">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="capacidad">Capacidad</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="capacidad" placeholder="Capacidad" name="capacidad">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="valor">Valor Dispositivo Repuesto</label>
                                    <div class="col-lg-8">
                                        <input type="number" min="0" class="form-control" id="valor" placeholder="Valor $" name="valor">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="proveedor">Proveedor</label>
                                    <div class="col-lg-8">
                                        <select id="proveedor" name="proveedor"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="factura">Num Factura Compra</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="factura" placeholder="Num Factura" name="factura">
                                    </div>
                                </div>
                            </fieldset>
                            <hr>
                            <br>


                            <div class="form-group">
                                <button id="btnguardar" type="submit" class="btn btn-default btn-primary col-lg-4 col-lg-offset-2 ">Registrar</button>
                            </div>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button id="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        
        
        
        
        
        
         <!--        Ventana modal para el Actualizar registro de detalle ot-->

        <!-- Modal -->
        <div id="modal_Actdetalleot" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Formulario Actualizar detalle orden de trabajo</h4>
                    </div>
                    <div class="modal-body">
                        <!--          formulario-->
                        <div class="warning" id="xmsj" style=" font-weight:bold"></div>      
                        <form class="form-horizontal" method="POST" action="" id="frmupdate">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="codigoDetalleot">Codigo Detalle de la OT</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control " id="idDetot" placeholder="Codigo Detalle de la OT" name="idDetot" readonly="true" >

                                    </div>

                                </div>
                                
                                
                                
                                
                                
                                
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="codigo">Codigo de la OT</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control " id="xcodot" placeholder="Codigo de la OT" name="xcodot" readonly="true">

                                    </div>

                                </div>


                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="marca">Informacion Equipo Cliente</label>
                                    <div class="col-lg-8">
                                        <textarea type="text" class="form-control" id="xinfeqcliente" placeholder="Equipo cliente" name="xinfeqcliente" readonly="true"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>Informacion Servicios</legend>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="selectSer">Ingrese Servicio</label>
                                    <div class="col-lg-8">
                                        <select class="" id="xselectSer" name="xidservicio">

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="observaciones">Observaciones</label>
                                    <div class="col-lg-8">
                                        <textarea type="text" class="form-control" id="xobservaciones" placeholder="Observaciones" name="xobservaciones"></textarea>
                                    </div>
                                </div>
                                <hr>
                            </fieldset><br>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input  type="checkbox" class="form-check-input" name="xchk1" id="xchk1" value="1" onchange="javascript:showContent2()">
                                    Adicionar repuesto
                                </label>
                            </div>



                            <fieldset id="infrep2" style="display: none">
                                <legend class="">Informacion Repuesto</legend>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="dispositivo">Dispositivo</label>
                                    <div class="col-lg-8">
                                        <select id="xdispositivo" class="" name="xdispositivo"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="modelo">Modelo</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="xmodelo" placeholder="Modelo dispositivo" name="xmodelo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="marca">Marca</label>
                                    <div class="col-lg-8">
                                        <select id="xmarca" name="xmarca"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="serial">Num serie(S/N)</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="xserial" placeholder="Serial" name="xserial">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="capacidad">Capacidad</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="xcapacidad" placeholder="Capacidad" name="xcapacidad">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="valor">Valor Dispositivo Repuesto</label>
                                    <div class="col-lg-8">
                                        <input type="number" min="0" class="form-control" id="xvalor" placeholder="Valor $" name="xvalor">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="proveedor">Proveedor</label>
                                    <div class="col-lg-8">
                                        <select id="xproveedor" name="xproveedor"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label " for="factura">Num Factura Compra</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="xfactura" placeholder="Num Factura" name="xfactura">
                                    </div>
                                </div>
                            </fieldset>
                            <hr>
                            <br>


                            <div class="form-group">
                                <button id="btnupdate" type="submit" class="btn btn-default btn-primary col-lg-4 col-lg-offset-2 ">Actualizar</button>
                            </div>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button id="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        
        


    </section>




</div>



</div>

<script type="text/javascript">
    $(document).ready(function () {
        mostrardatos();
        
        mostrardatosDteOt() ;
        
        
        
        
        
    $("#tablaAgenda").on("click", "#btnreporte", (function (event) {
        vcodAgn=$(this).parent().parent().children("td:eq(0)").text();
        vcodot =$(this).parent().parent().children("td:eq(2)").text();
        vinfoeq = $(this).parent().parent().children("td:eq(8)").text();
        $("#codot").val(vcodot);
        $("#infeqcliente").val(vinfoeq);
        $("#cod_agenda").val(vcodAgn);
        


    }));
        
//             METODO PARA ELIMINAR REGISTROS DE DETALLE SERVICIOS EN LA OT   
    $("#tbDetalleOt").on("click", "#btneliminar", (function (event) {
        vid=$(this).parent().parent().children("td:eq(0)").text();
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
                            url: "<?php echo base_url('CdetalleOt/eliminar') ?>",
                            type: "POST",
                            data: {id: vid},
                            success: function (respuesta) {
                                if(respuesta=="Registro Eliminado"){
                                    swal("El registro fue eliminado","Aceptar","success");
                                     mostrardatosDteOt() ;
                                }else{
                                    
                                    alert("Error !No se puede eliminar el registro¡");
                                }

                            }
                        });

                    } else {
                        swal("Operación Cancelada",
                                "El registro no sera eliminado",
                                "error");
                    }
                });
                
       mostrardatosDteOt() ;



    }));
        
        
        
        
        
        
        
        
       $("body").on("click", "#tbDetalleOt #btneditar", function () {
           vcodigo = $(this).parent().parent().children("td:eq(0)").text();
           vidot= $(this).parent().parent().children("td:eq(1)").text();
           vidser= $(this).parent().parent().children("td:eq(2)").text();
           vobser= $(this).parent().parent().children("td:eq(3)").text();
           vdispo= $(this).parent().parent().children("td:eq(4)").text();
           vmodelo= $(this).parent().parent().children("td:eq(5)").text();
           vmarca= $(this).parent().parent().children("td:eq(6)").text();
           vseriales= $(this).parent().parent().children("td:eq(7)").text();
           vcapacidad= $(this).parent().parent().children("td:eq(8)").text();
           vvalDispo= $(this).parent().parent().children("td:eq(9)").text();
           vprove= $(this).parent().parent().children("td:eq(10)").text();
           vfactura= $(this).parent().parent().children("td:eq(11)").text();
           vequipoClient= $(this).parent().parent().children("td:eq(12)").text();
           
            $("#idDetot").val(vcodigo);
            $("#xcodot").val(vidot);
            $("#xinfeqcliente").val(vequipoClient);
            $("#xselectSer").val(vidser);
            $("#xobservaciones").val(vobser);
            $("#xdispositivo").val(vdispo);
            $("#xmodelo").val(vmodelo);
            $("#xmarca").val(vmarca);
            $("#xserial").val(vseriales);
            $("#xcapacidad").val(vcapacidad);
            $("#xvalor").val(vvalDispo);
            $("#xproveedor").val(vprove);
            ("#xfactura").val(vfactura);
              
           
        });
        
      
    });
    
    $("#btnupdate").click(function(){
        
        event.preventDefault();
     
        
        $.ajax({
            url: "<?php echo base_url('/CdetalleOt/actualizar') ?>",
            type: "POST",
            data: $("#frmupdate").serialize(),
            success:function(respuesta){
                alert(respuesta);
                    

            },
                    error:function (data){
                        alert(data);
                    }
                    
        });

       mostrardatosDteOt();

        
    });
    
    
  $("#btnguardar").click(function(){
      event.preventDefault();

        $.ajax({
            url: "<?php echo base_url('CdetalleOt/guardar') ?>",
            type: "post",
            data: $("#frmsolucion").serialize(),
            success: function (respuesta) {


                $("#msj").html(respuesta);
                $("#msj").css("background-color", "#D1A6AC");

                if (respuesta == "Registro Guardado") {
                    jQuery.fn.reset = function () {
                        $(this).each(function () {
                            this.reset();
                        });
                    };


                    $("#frmsolucion").reset();
                    $("#msj").css("background-color", "#82E0AA");


                }

            }
        });

        mostrardatos();
     
     
  });
  


    
//Selectores para seleccionar servicios 

$("#selectSer").select2({
    id: function (data) {
        return data.id;
    },
//                                  theme: "bootstrap",
    height: "400px",
    width: "100%",
    allowClear: true,
    placeholder: "Digite el codigo o nombre del servicio.",
    ajax: {
        url: "http://localhost/demosots/Cservicio/cmbServicios",
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

//        $("#tablaAgenda").on("click","#btnreporte",(function(event){
//            ('#tab2').addClass('tab-pane active');
//
//        }));


$("#xselectSer").select2({
    id: function (data) {
        return data.id;
    },
//                                  theme: "bootstrap",
    height: "400px",
    width: "100%",
    allowClear: true,
    placeholder: "Digite el codigo o nombre del servicio.",
    ajax: {
        url: "http://localhost/demosots/Cservicio/cmbServicios",
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
$("#proveedor").select2({
    id: function (data) {
        return data.num_cedula
    },
    allowClear: true,
    placeholder: "Ingrese el nit o el nombre del proveedor",
    ajax: {
        url: "http://localhost/demosots/Cproveedor/cmbProveedor",
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
$("#xproveedor").select2({
    id: function (data) {
        return data.num_cedula
    },
    allowClear: true,
    placeholder: "Ingrese el nit o el nombre del proveedor",
    ajax: {
        url: "http://localhost/demosots/Cproveedor/cmbProveedor",
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





function showContent() {
    element = document.getElementById("infrep");
    check = document.getElementById("chk1");
    if (check.checked) {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}
function showContent2() {
    element = document.getElementById("infrep2");
    check = document.getElementById("xchk1");
    if (check.checked) {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}




//mostrar datos detalle ot

function mostrardatosDteOt() {
    $("#tbDetalleOt").dataTable().fnDestroy();
    $('#tbDetalleOt').DataTable({
         "scrollX": true,
         "scrollY":"300px",
        "scrollCollapse": true,
        "paging":         false,
        "ajax": "http://localhost/demosots/Cdetalleot/listarDetalleOt",
        "columns": [
            {"data": "cons"},
            {"data": "id_ot"},
            {"data": "id_ser"},
            {"data": "observaciones"},
            {"data": "id_dispo"},
            {"data": "modelo"},
            {"data": "id_marca"},
            {"data": "seriales"},
            {"data": "capacidad"},
            {"data": "valor_dispositivo"},
            {"data": "id_proveedor"},
            {"data": "num_factura"},
            {"data": "equipo_cliente"},
            {"data": "proveedor"},
            {"data": "dispositivo"},
            {"data": "marca"},
            {"data": "servicios"},
            {"data": "OT"},
            {"data": "SUM"},
            {"defaultContent": "<button  type=\"submit\" id=\"btneditar\" class=\"btn btn-success editar\"  data-toggle=\"modal\" data-target=\"#modal_Actdetalleot\"><span class=\"glyphicon glyphicon-pencil\"></span>E</button> <button class='btn btn-danger' id=\"btneliminar\" type='button'><span class=\"glyphicon glyphicon-trash \"></span>X</button>"
            }
        ]

    });


}



//filtrar por ot

//var filterByName = function(column, name) {
//    $.fn.dataTableExt.afnFiltering.push(
//       function( oSettings, aData, iDataIndex ) {
//          var rowName = aData[column]; //Aqui obtienes el valor de la columna.
//        //Y comparas si son iguales.
//          if(rowName == name){
//             return true;
//          }
//       }
//    );
//};


//$('#filtrar').on('click', function(e){
//   e.preventDefault();
//   var name = $("#ot").val(); //Guardas el valor del input
//   if(name!=null){   
//   filterByName(1, name); //0 es la columna, imaginando el la primera columna es nombre la dejas en 0 y envias name que es lo que ingresaste
//
//  $("#tbDetalleOt").dataTable().fnDraw();
//   
//   }
//    
//    });
   
   
//   
//   $('#reset').on('click', function(e){
//
//     mostrardatosDteOt();
//   });
//   
//   
   
   
   
   function mostrardatos() {
    $("#tablaAgenda").dataTable().fnDestroy();
    $('#tablaAgenda').DataTable({
        "ajax": "http://localhost/demosots/Cdetalleot/listar",
        "columns": [
            {"data": "cons"},
            {"data": "fecha_reg"},
            {"data": "id_ot"},
            {"data": "id_pro"},
            {"data": "observaciones"},
            {"data": "estado_act"},
            {"data": "prioridad"},
            {"data": "OT"},
            {"data": "EQUIPO"},
            {"data": "ESPECIALISTA"},
            {"defaultContent": "<a  data-target=\"#modal_detalleot\" data-toggle=\"modal\"class='btn btn-info' id=\"btnreporte\" type='button'><span class=\"glyphicon glyphicon-list-alt \"></span>Solucionar</a>"
            }


        ]

    });


}
   
   
   

</script>








