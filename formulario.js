// console.log('funcionando');
$("#formulario").submit(function(event){
    event.preventDefault(); //almacena los datos sin refrescar el sitio web.
    enviar();
});
function enviar(){
    // console.log("ejecutando");
    var datos = $("#formulario").serialize(); //toma los datos "name" y los lleva a un arreglo
    // console.log(datos);
    $.ajax({
        type: "post",
        url:"formulario.php",
        data: datos,
        success: function(texto){
            console.log(texto)
            if(texto.trim() === "exito"){
                correcto();
            }else{
                phperror(texto);
            }
        }
    })
}
function correcto(){
    $("#mensajeExito").removeClass("d-none");
    $("#mensajeError").addClass("d-none");
}
function phperror(texto){
    $("#mensajeError").removeClass("d-none");
    $("#mensajeError").html(texto);
}
