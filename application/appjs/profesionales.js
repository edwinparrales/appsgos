$(document).ready(function(){
    $('#idelemento')---id
    $('.numero')---clase
    console.log('valor:'+field_id);








});

//esto funcione

$(document).ready(function(){
    
     $("body").on("click","#regempleado a",function(event){
                event.preventDefault();
                vcodigo = $(this).attr("href");
                vnombres = $(this).parent().parent().children("td:eq(1)").text();
                vapellidos = $(this).parent().parent().children("td:eq(2)").text();
                vcedula = $(this).parent().parent().children("td:eq(3)").text();
                vdireccion = $(this).parent().parent().children("td:eq(4)").text();
                vtelefono = $(this).parent().parent().children("td:eq(5)").text();
                vcelular=$(this).parent().parent().children("td:eq(6)").text();
                vtprofesional=$(this).parent().parent().children("td:eq(7)").text();
                vcargo=$(this).parent().parent().children("td:eq(8)").text();
                vemail=$(this).parent().parent().children("td:eq(9)").text();
                vestado=$(this).parent().parent().children("td:eq(10)").text();
	

                $("#codigo").val(vcodigo);
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
    
    
    $("#frmregistraremp").submit(guardar);
    
    $("#btnactualizar").click(actualizar);
    
    
     $("body").on("click","#listaEmpleados button",function(event){
                idsele = $(this).attr("value");
                eliminar(idsele);
        });
    
});

        
        
        
function guardar(){
    event.preventDefault();
    
    $.ajax({
            url:$("form").attr("action"),
            type:$("form").attr("method"),
            data:$("form").serialize(),
            success:function(respuesta){
                    swal(respuesta);
                    $("form")[0].reset();
                    
                                       
                  
            }
    });
    
}





function actualizar(){
        $.ajax({
                url:"http://localhost/empresa/empleados/actualizar",
                type:"POST",
                data:$("#form-actualizar").serialize(),
                success:function(respuesta){
                        alert(respuesta);
                        mostrarDatos("");
                }
        });
}

function eliminar(idsele){
        $.ajax({
                url:"http://localhost/empresa/empleados/eliminar",
                type:"POST",
                data:{id:idsele},
                success:function(respuesta){
                        alert(respuesta);
                        mostrarDatos("");
                }
        });
}

function reload_table()
{
    $("#example").ajax.reload(null,false); //reload datatable ajax 
}

function start(){
    $.ajax({
        url:"<?php echo base_url('/Profesionales')?>"
    });
}
   
