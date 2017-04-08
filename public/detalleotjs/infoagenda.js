$(document).ready(function () {
    mostrardatos();
//        $('.modal').on('hidden.bs.modal', function(){ 
//		
//	
//                  $("#msjp").html(" ");
//                  $("#msjp").css("background-color", false);
//                   $("#msjx").html(" ");
//                  $("#msjx").css("background-color", false);
//                  $("#frmagendapro").reset();
//                   $("#frmupdate").reset();
//                   $("#selectpro").reset()
//	});



//      $("body").on("click", "#regagenda a", function (event) {
//           event.preventDefault();
//            //vcodigo = $(this).attr("href");
//            vcodigo = $(this).parent().parent().children("td:eq(0)").text();
//            vobs = $(this).parent().parent().children("td:eq(4)").text();
//           
//
//
//            $("#idagenda").val(vcodigo);
//             $("#observacionesx").val(vobs);
//          
//
//        });


















//      $("#btnguar      $("#btnupdate").click(actualizar);dar").click(guardar);


//        $("body").on("click", "#regagenda button", function (event) {
//
//            vcodigo = $(this).parent().parent().children("td:eq(0)").text();
//            eliminar(vcodigo);
//
//        });
// 






});




//Selectores para seleccionar servicios 

//$("#selectSer").select2({
//    id: function (data) {
//        return data.id;
//    },
//    allowClear: true,
//    placeholder: "Digite el codigo o nombre del servicio.",
//    ajax: {
//        url: "http://localhost/demosots/Cservicio/cmbServicios",
//        dataType: 'json',
//        delay: 250,
//        data: function (params) {
//            return {
//                q: params.term, // search term
//                page: params.page
//            };
//        },
//        processResults: function (data, params) {
//            // parse the results into the format expected by Select2
//            // since we are using custom formatting functions we do not need to
//            // alter the remote JSON data, except to indicate that infinite
//            // scrolling can be used
//            params.page = params.page || 1;
//
//            return {
//                results: data
//
//            };
//        },
//        cache: true,
//        minimumInputLength: 1
//    }
//
//
//});



//    function eliminar(vcodigo) {
//        swal({
//            title: "¿Esta seguro de eliminar el registro?",
//            text: "Esto lo eliminara definitivamente",
//            type: "warning",
//            showCancelButton: true,
//            confirmButtonColor: "#DD6B55",
//            confirmButtonText: "¡Eliminar!",
//            cancelButtonText: "Cancelar",
//            closeOnConfirm: false,
//            closeOnCancel: false},
//                function (isConfirm) {
//                    if (isConfirm) {
//                        $.ajax({
//                            url: "<?php echo base_url('Cagenda/eliminar') ?>",
//                            type: "POST",
//                            data: {id: vcodigo},
//                            success: function (respuesta) {
//                                if(respuesta=="exito"){
//                                    swal("El registro fue eliminado","Aceptar","success");
//                                        mostrardatos();
//
//                                }else{
//                                    
//                                    alert("Error !No se puede eliminar el registro¡");
//                                        mostrardatos();
//                                }
//
//                            }
//                        });
//
//                    } else {
//                        swal("Operación Cancelada",
//                                "El registro no sera eliminado",
//                                "error");
//                    }
//                });
//                
//                
//                mostrardatos();
//
//                
//    
//
//    }






//        
//        //    metodo select equipo cliente
//        $("#pot").select2({
//            id: function (data) {
//                return data.id
//            },
//            allowClear: true,
//            placeholder: "Digite el codigo de la OT",
//            ajax: {
//                url: "http://localhost/demosots/CotEquipo/listOtcmb",
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
//        
//    
//     //    metodo select equipo cliente
//        $("#potx").select2({
//            id: function (data) {
//                return data.id
//            },
//            allowClear: true,
//            placeholder: "Digite el codigo de la OT",
//            ajax: {
//                url: "http://localhost/demosots/CotEquipo/listOtcmb",
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
//    
//    
//     //Selectores para seleccionar profesionales en la agenda 
//    
//      $("#selectprox").select2({
//            id: function (data) {
//                return data.id;
//            },
//            allowClear: true,
//            placeholder: "Digite numero de cedula o apellido.",
//            ajax: {
//                url: "http://localhost/demosots/Profesionales/listar2",
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
//    
//    
//    
//
//    
//    //modal para relacionar orden  de trabajo con profesional
//function guardar(){
//event.preventDefault();
//
//        $.ajax({
//            url: "<?php echo base_url('Cagenda/guardar') ?>",
//            type: "post",
//            data: $("#frmagendapro").serialize(),
//            success: function (respuesta) {
//
//
//                $("#msjp").html(respuesta);
//                $("#msjp").css("background-color", "#D1A6AC");
//
//                if (respuesta == "Registro Guardado") {
//                    jQuery.fn.reset = function () {
//                        $(this).each(function () {
//                            this.reset();
//                        });
//                    };
//
//
//                    $("#frmagendapro").reset();
//                    $("#msjp").css("background-color", "#82E0AA");
//
//
//                }
//
//            }
//        });
//
//        mostrardatos();
//}
//    
//    
//
//
//
//      var data = [{id: 'NORMAL', text: 'NORMAL'}, {id: 'MEDIA', text: 'MEDIA'}, {id: 'ALTA', text: 'ALTA'}];
//
//    $("#selectprioridadx").select2({
//        allowClear: true,
//        placeholder: "Seleccione prioridad",
//        data: data
//    });
//     $("#selectprioridad").select2({
//        allowClear: true,
//        placeholder: "Seleccione prioridad",
//        data: data
//    });










