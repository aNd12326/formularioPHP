<?php
// $nombre = $_POST["nombre"];
$error = '';

//VALIDANDO NOMBRE
if(empty($_POST["nombre"])){
    $error = 'Ingresa un nombre </br>';
}else{
    $nombre = $_POST["nombre"];
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
}
//VALIDANDO EMAIL
if(empty($_POST["email"])){
    $error .= 'Ingresa un E-mail</br>';
}else{
    $email = $_POST["email"];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error .= 'Ingresa un E-mail verdadero</br>';
    }else{
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    }
}
//VALIDANDO MENSAJE
if(empty($_POST["mensaje"])){
    $error .= 'Ingresa un mensaje </br>';
}else{
    $mensaje = $_POST["mensaje"];
    $mensaje = filter_var($nombre, FILTER_SANITIZE_STRING);
}

//CUERPO DEL MENSAJE
$cuerpo = 'Nombre: '.$nombre.'\n';
$cuerpo.= 'E-mail: '.$email.'\n';
$cuerpo.= 'Mensaje: '.$mensaje.'\n';

//DIRECCION DE CORREO DIRIGIDO
$enviarA = 'andersonxdxdxdmtg3@gmail.com'; //REEMPLAZAR CON CUALQUIER CORREO
$asunto = 'Nuevo mensaje de mi sitio web';

//ENVIAR CORREO

if($error == ''){
    $success = mail($enviarA,$asunto,$cuerpo,'de: '.$email);
    echo 'exito';
}else{
    echo $error;
}

?>