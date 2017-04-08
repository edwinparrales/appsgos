function borrarRegistro(url){
swal({ 
title: "¿Esta seguro de eliminar el registro?",
text: "Esto lo eliminara definitivamente",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "¡Eliminar!",
cancelButtonText: "No", 
closeOnConfirm: false,
closeOnCancel: false },

function(isConfirm){ 
if (isConfirm) {
  
swal("¡Hecho!",
"Registro Eliminado",
"success"); 
location.href=url;
} else { 
swal("Operación Cancelada", 
"El registro no sera eliminado", 
"error"); 
} 
})
}

