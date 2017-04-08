<div class="container-fluid">
    <section class="contenido">
        <button class="btn btn-primary"  data-toggle="modal" data-target="#frmempleado"><span class="glyphicon glyphicon-plus"></span> Registrar Empleado</button>
        <div class="col-lg-12 col-lg-offset-0" id="regempleado"><br>

            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                <thead class="text-capitalize">
                <th>Codigo</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cedula</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Tarjeta Profesional</th>
                <th>Cargo</th>
                <th>Correo</th>
                <th>Estado</th>
                <th>Operaciones</th>

                </thead>
                <tfoot hidden="true">
                <th>Codigo</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cedula</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Tarjeta Profesional</th>
                <th>Cargo</th>
                <th>Correo</th>
                <th>Estado</th>
                <th>Operaciones</th>

                </tfoot>

            </table>

        </div>
    </section>

    <!-- Modal Registro de empleado -->
    <div id="frmempleado" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header center-block">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registro de Empleado</h4>
                </div>
                <div class="modal-body">
                   
                   

                    <form method="POST" action="<?PHP echo base_url('/Profesionales/guardar'); ?>" class="form-group" id="frmregistraremp" >
                        <div class="warning" id="msj" style=" font-weight:bold">
                        
                         </div>
                         

                        <div class="form-group">
                            
                           <?php echo form_error('nombres', '<div class="error">', '</div>');?>
                            <input   class="form-control" type="text" name="nombres" id="nombres" placeholder="Nombres:" >

                        </div>
                        <div class="form-group">

                            <input  class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Apellidos:" >

                        </div>
                        <div class="form-group">

                            <input  class="form-control" type="text" name="cedula" id="cedula" placeholder="Número Cédula:" >

                        </div><div class="form-group">

                            <input  class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion:" >

                        </div>
                        <div class="form-group">

                            <input  class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono:" >

                        </div>
                        <div class="form-group">

                            <input  class="form-control" type="text" name="celular" id="celular" placeholder="Celular:" >

                        </div>
                        <div class="form-group">

                            <input  class="form-control" type="text" name="tprofesional" id="tprofesional" placeholder="Tarjeta Profesional:" >

                        </div>
                        <div class="form-group">
                            <label>Cargo:</label>
                            <select id="cargo" name="cargo" class="form-control">
                                <option></option>
                                <?php foreach ($cargos as $value) { ?>
                                    <option ><?php echo $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">

                            <input  class="form-control" type="text" name="email" id="email" placeholder="Correo Electronico:" >

                        </div>

                        <button type="submit"  class="btn btn-primary" id="btnregistrar"  >Registrar</button>

                    </form>

                </div>

                <br>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>

    <!-- Modal editar empleado -->
    <div id="frmupdateEmple" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Empleado</h4>
                </div>
                <div class="modal-body">

                    <form method="post" action="" class="form-group"  id="frmupdate">
                        <div class="form-group">
                            <label>Codigo:</label>
                            <input  class="form-control" type="text" name="id" id="id" placeholder="Codigo:" readonly="true">

                        </div>
                        <div class="form-group">
                            <label>Nombres:</label> 
                            <input  class="form-control" type="text" name="xnombres" id="xnombres" placeholder="Nombres:" >

                        </div>
                        <div class="form-group">
                            <label>Apelldios:</label>
                            <input  class="form-control" type="text" name="xapellidos" id="xapellidos" placeholder="Apellidos:" >

                        </div>
                        <div class="form-group">
                            <label>Cedula:</label>
                            <input  class="form-control" type="text" name="xcedula" id="xcedula" placeholder="Número Cédula:" >

                        </div><div class="form-group">
                            <label>Dirección:</label>
                            <input  class="form-control" type="text" name="xdireccion" id="xdireccion" placeholder="Direccion:" >

                        </div>
                        <div class="form-group">
                            <label>Telefono:</label> 
                            <input  class="form-control" type="text" name="xtelefono" id="xtelefono" placeholder="Telefono:" >

                        </div>
                        <div class="form-group">
                            <label>Número celular:</label>
                            <input  class="form-control" type="text" name="xcelular" id="xcelular" placeholder="Celular:" >

                        </div>
                        <div class="form-group">
                            <label>Número tarjeta profesional:</label>
                            <input  class="form-control" type="text" name="xtprofesional" id="xtprofesional" placeholder="Tarjeta Profesional:" >

                        </div>
                        <div class="form-group">
                            <label>Cargo:</label>
                            <select id="xcargo" name="xcargo" class="form-control">
                                <option></option>
                                <?php foreach ($cargos as $value) { ?>
                                    <option ><?php echo $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input  class="form-control" type="text" name="xemail" id="xemail" placeholder="Correo Electronico:" >

                        </div>
                        <div class="form-group">
                            <label>Estado:</label>
                            <select id="xestado" name="xestado" class="form-control" required="true">
                                <option></option>
                                <option>ACTIVO</option>
                                <option>DESACTIVO</option>
                            </select>

                        </div>

                        <button type="submit" id="btnactualizar" class=" btn btn-success" >Actualizar</button>

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
		
	
                  $("#msj").html(" ");
                  $("#msj").css("background-color", false);
	});
        
      $("#frmregistraremp").submit(guardar);
    
      $("body").on("click", "#regempleado a", function (event) {
           event.preventDefault();
            //vcodigo = $(this).attr("href");
            vcodigo = $(this).parent().parent().children("td:eq(0)").text();
            vnombres = $(this).parent().parent().children("td:eq(1)").text();
            vapellidos = $(this).parent().parent().children("td:eq(2)").text();
            vcedula = $(this).parent().parent().children("td:eq(3)").text();
            vdireccion = $(this).parent().parent().children("td:eq(4)").text();
            vtelefono = $(this).parent().parent().children("td:eq(5)").text();
            vcelular = $(this).parent().parent().children("td:eq(6)").text();
            vtprofesional = $(this).parent().parent().children("td:eq(7)").text();
            vcargo = $(this).parent().parent().children("td:eq(8)").text();
            vemail = $(this).parent().parent().children("td:eq(9)").text();
            vestado = $(this).parent().parent().children("td:eq(10)").text();


            $("#id").val(vcodigo);
            $("#xnombres").val(vnombres);
            $("#xapellidos").val(vapellidos);
            $("#xcedula").val(vcedula);
            $("#xdireccion").val(vdireccion);
            $("#xtelefono").val(vtelefono);
            $("#xcelular").val(vcelular);
            $("#xtprofesional").val(vtprofesional);
            $("#xcargo").val(vcargo);
            $("#xemail").val(vemail);
            $("#xestado").val(vestado);
           

        });
      
      $("#btnactualizar").click(actualizar);


        $("body").on("click", "#regempleado button", function (event) {

            vcodigo = $(this).parent().parent().children("td:eq(0)").text();
            eliminar(vcodigo);

        });
      
    });




    function guardar() {
        event.preventDefault();

        $.ajax({
            url: $("form").attr("action"),
            type: $("form").attr("method"),
            data: $("form").serialize(),
            success:function(respuesta) {

                  $("#msj").html(respuesta);
                  $("#msj").css( "background-color", "#D1A6AC"); 
                  
                     if(respuesta=="Registro Guardado"){
                         jQuery.fn.reset=function(){
                            $(this).each(function(){this.reset();});
                            }
                              
                               $("form").reset();
                               $("#msj").css( "background-color", "#82E0AA"); 
                     
 
                        } 

                } 
        });
        
        mostrardatos();     
    }





    function actualizar() {
        
        event.preventDefault();
        
        $.ajax({
            url: "<?php echo base_url('/Profesionales/actualizar') ?>",
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
                            url: "<?php echo base_url('Profesionales/eliminar') ?>",
                            type: "POST",
                            data: {id: vcodigo},
                            success: function (respuesta) {
                                if(respuesta=="exito"){
                                    swal("El registro fue eliminado","Aceptar","success");
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
                
        mostrardatos();

    }



    function mostrardatos() {
        $("#example").dataTable().fnDestroy();
        $('#example').DataTable({
            
          
        
            "ajax": '<?php echo base_url('Profesionales/listar') ?>',
           
             
            "columns": [
                {"data": "id_pro"},
                {"data": "nombres"},
                {"data": "apellidos"},
                {"data": "num_cedula"},
                {"data": "direccion"},
                {"data": "num_tel"},
                {"data": "num_movil"},
                {"data": "num_tarjeProfe"},
                {"data": "cargo"},
                {"data": "email"},
                {"data": "estado_bd"},
                {"defaultContent": "<a  id=\"xxx\" class=\"btn btn-success\"  data-toggle=\"modal\" data-target=\"#frmupdateEmple\"><span class=\"glyphicon glyphicon-pencil\"></span>E</a> <button class='btn btn-danger' id=\"btneliminar\" type='button'><span class=\"glyphicon glyphicon-trash \"></span>X</button>"
                }


            ],
             "scrollX": true
           
             
         

        });


    }

</script>

    





